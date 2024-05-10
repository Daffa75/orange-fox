<?php
namespace App\Filament\Resources\PeternakanOfferingResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\PeternakanOfferingResource;
use Illuminate\Routing\Router;


class PeternakanOfferingApiService extends ApiService
{
    protected static string | null $resource = PeternakanOfferingResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
