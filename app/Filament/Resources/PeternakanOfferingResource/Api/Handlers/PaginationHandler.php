<?php
namespace App\Filament\Resources\PeternakanOfferingResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\PeternakanOfferingResource;

class PaginationHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = PeternakanOfferingResource::class;


    public function handler()
    {
        $model = static::getEloquentQuery();

        $query = QueryBuilder::for($model)
            ->join('users', 'peternakan_offerings.created_by', '=', 'users.id')
            ->select('peternakan_offerings.*', 'users.name as author')
            ->where('is_visible', true)
            ->defaultSort('-created_at')
            ->paginate(10)
            ->appends(request()->query());

        return static::getApiTransformer()::collection($query);
    }
}
