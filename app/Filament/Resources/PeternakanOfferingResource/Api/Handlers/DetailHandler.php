<?php

namespace App\Filament\Resources\PeternakanOfferingResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\PeternakanOfferingResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{slug}';
    public static string | null $resource = PeternakanOfferingResource::class;


    public function handler(Request $request)
    {
        $slug = $request->route('slug');

        $model = static::getModel()::query();

        $query = QueryBuilder::for(
            $model
                ->where('slug', $slug)
                ->where('is_visible', true)
                ->with('media')
        )
            ->join('users', 'peternakan_offerings.created_by', '=', 'users.id')
            ->select('peternakan_offerings.*', 'users.name as author')
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        $transformer = static::getApiTransformer();

        return new $transformer($query);
    }
}
