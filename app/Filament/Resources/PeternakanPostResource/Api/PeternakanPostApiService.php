<?php
namespace App\Filament\Resources\PeternakanPostResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\PeternakanPostResource;
use Illuminate\Routing\Router;


class PeternakanPostApiService extends ApiService
{
    protected static string | null $resource = PeternakanPostResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
