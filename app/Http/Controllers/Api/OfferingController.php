<?php

namespace App\Http\Controllers\Api;

use App\Filament\Resources\PerikananOfferingResource\Api\Transformers\PerikananOfferingTransformer;
use App\Http\Controllers\Controller;
use App\Models\PerikananOffering;
use App\Models\PeternakanOffering;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

class OfferingController extends Controller
{
    public function index(Request $request)
    {
        // Define the base query for Perikanan
        $perikananQuery = QueryBuilder::for(PerikananOffering::class)
            ->join('users', 'perikanan_offerings.created_by', '=', 'users.id')
            ->select('perikanan_offerings.*', 'users.name as author')
            ->where('is_visible', true);

        // Define the base query for Peternakan
        $peternakanQuery = QueryBuilder::for(PeternakanOffering::class)
            ->join('users', 'peternakan_offerings.created_by', '=', 'users.id')
            ->select('peternakan_offerings.*', 'users.name as author')
            ->where('is_visible', true);

        // Fetch data from both queries
        $perikanan = $perikananQuery->get();
        $peternakan = $peternakanQuery->get();

        // Combine the collections
        $combined = $perikanan->concat($peternakan);

        // Sort the combined collection by `created_at` descending
        $sorted = $combined->sortByDesc('created_at');

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
        $transformed = PerikananOfferingTransformer::collection($paginatedItems);

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
}
