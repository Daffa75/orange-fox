<?php
namespace App\Filament\Resources\InboxResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\InboxResource;
use Illuminate\Routing\Router;


class InboxApiService extends ApiService
{
    protected static string | null $resource = InboxResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
