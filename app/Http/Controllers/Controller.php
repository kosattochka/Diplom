<?php

namespace App\Http\Controllers;

use Hamcrest\Arrays\IsArray;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected function convertObject($data): mixed
    {
        if (is_array($data)) {
            return array_map(fn($item) => self::convertObject($item), $data);
        }

        // Если данные - объект, преобразуем его в массив и рекурсивно обрабатываем
        if (is_object($data)) {
            return self::convertObject(
                json_decode(
                    json_encode($data),
                    true
                )
            );
        }

        // Если данные не являются массивом или объектом, возвращаем их как есть
        return $data;
    }

    protected function component(string $path, JsonResource|array $data): array|string
    {
        if ($data instanceof ResourceCollection or is_array($data)) {
            $data = json_decode(json_encode($data), true);
            $response = [];
            foreach ($data as $item) {
                $response[] = view($path, $item)->render();
            }
            return $response;
        } else {
            $data = json_decode(json_encode($data), true);
            return view($path, $data)->render();
        }
    }
}
