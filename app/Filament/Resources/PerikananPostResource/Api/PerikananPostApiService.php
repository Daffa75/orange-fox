<?php
namespace App\Filament\Resources\PerikananPostResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\PerikananPostResource;
use Illuminate\Routing\Router;


class PerikananPostApiService extends ApiService
{
    protected static string | null $resource = PerikananPostResource::class;

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
