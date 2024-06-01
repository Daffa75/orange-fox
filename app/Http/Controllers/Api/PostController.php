<?php

namespace App\Http\Controllers\Api;

use App\Filament\Resources\PerikananPostResource\Api\Transformers\PerikananPostTransformer;
use App\Http\Controllers\Controller;
use App\Models\PerikananPost;
use App\Models\PeternakanPost;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Define the base query for Perikanan
        $perikananQuery = QueryBuilder::for(PerikananPost::class)
            ->join('users', 'perikanan_posts.created_by', '=', 'users.id')
            ->select('perikanan_posts.*', 'users.name as author')
            ->where('status', 'published')
            ->where('published_at', '<=', now());

        // Define the base query for Peternakan
        $peternakanQuery = QueryBuilder::for(PeternakanPost::class)
            ->join('users', 'peternakan_posts.created_by', '=', 'users.id')
            ->select('peternakan_posts.*', 'users.name as author')
            ->where('status', 'published')
            ->where('published_at', '<=', now());

        // Fetch data from both queries
        $perikanan = $perikananQuery->get();
        $peternakan = $peternakanQuery->get();

        // Combine the collections
        $combined = $perikanan->concat($peternakan);

        // Sort the combined collection by `published_at` descending
        $sorted = $combined->sortByDesc('published_at');

        // Paginate the sorted collection
        $perPage = $request->get('per_page', 10);
        $page = $request->get('page', 1);
        $paginatedItems = $sorted->slice(($page - 1) * $perPage, $perPage)->values();

        // Create a LengthAwarePaginator instance
        $paginated = new LengthAwarePaginator(
            $paginatedItems,
            $sorted->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // return response()->json($paginated);

        // Transform the paginated collection
        $transformed = PerikananPostTransformer::collection($paginatedItems);

        return response()->json([
            'data' => $transformed,
            'pagination' => [
                'total' => $paginated->total(),
                'count' => $paginated->count(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'total_pages' => $paginated->lastPage()
            ]
        ]);
    }

    public function show(Request $request, $slug)
    {
        // Check the Perikanan Post model
        $postQuery = QueryBuilder::for(PerikananPost::class)
            ->join('users', 'perikanan_posts.created_by', '=', 'users.id')
            ->select('perikanan_posts.*', 'users.name as author')
            ->where('perikanan_posts.slug', $slug)
            ->where('perikanan_posts.status', 'published')
            ->where('perikanan_posts.published_at', '<=', now())
            ->with('media')
            ->first();

        if ($postQuery) {
            $transformer = new PerikananPostTransformer($postQuery);
            return response()->json($transformer);
        }

        // Check the Peternakan Post model
        $articleQuery = QueryBuilder::for(PeternakanPost::class)
            ->join('users', 'peternakan_posts.created_by', '=', 'users.id')
            ->select('peternakan_posts.*', 'users.name as author')
            ->where('peternakan_posts.slug', $slug)
            ->where('peternakan_posts.status', 'published')
            ->where('peternakan_posts.published_at', '<=', now())
            ->with('media')
            ->first();

        if ($articleQuery) {
            $transformer = new PerikananPostTransformer($articleQuery);
            return response()->json($transformer);
        }

        // If no matching record is found, return a not found response
        return response()->json(['error' => 'Not Found'], 404);
    }
}
