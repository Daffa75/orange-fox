<?php
namespace App\Filament\Resources\PerikananPostResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\PerikananPostResource;

class PaginationHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = PerikananPostResource::class;


    public function handler()
    {
        $model = static::getEloquentQuery();

        $query = QueryBuilder::for($model)
            ->join('users', 'perikanan_posts.created_by', '=', 'users.id')
            ->select('perikanan_posts.*', 'users.name as author')
            ->where('status', 'published')
            ->where('published_at', '<=', now())
            ->defaultSort('-published_at')
            ->paginate(10)
            ->appends(request()->query());

        return static::getApiTransformer()::collection($query);
    }
}
