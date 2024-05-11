<?php
namespace App\Filament\Resources\PerikananOfferingResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\PerikananOfferingResource;
use Illuminate\Routing\Router;


class PerikananOfferingApiService extends ApiService
{
    protected static string | null $resource = PerikananOfferingResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
