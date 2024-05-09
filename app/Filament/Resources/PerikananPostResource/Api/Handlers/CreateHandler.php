<?php
namespace App\Filament\Resources\PerikananPostResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\PerikananPostResource;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = PerikananPostResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {

    }
}