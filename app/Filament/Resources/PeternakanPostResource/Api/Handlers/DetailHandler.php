<?php

namespace App\Filament\Resources\PeternakanPostResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\PeternakanPostResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{slug}';
    public static string | null $resource = PeternakanPostResource::class;


    public function handler(Request $request)
    {
        $slug = $request->route('slug');

        $model = static::getModel()::query();

        $query = QueryBuilder::for(
            $model
                ->where('slug', $slug)
                ->where('status', 'published')
                ->where('published_at', '<=', now())
                ->with('media')
        )
            ->join('users', 'peternakan_posts.created_by', '=', 'users.id')
            ->select('peternakan_posts.*', 'users.name as author')
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        $transformer = static::getApiTransformer();

        return new $transformer($query);
    }
}
