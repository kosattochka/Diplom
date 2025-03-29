<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaginatedResource extends JsonResource
{
    private $paginator;

    public function __construct($resource, $paginator)
    {
        parent::__construct($resource);
        $this->paginator = $paginator;
    }

    public function toArray($request): array
    {
        return [
            'data' => json_decode(json_encode($this->resource), true),
            'links' => $this->getLinks(),
            'meta' => $this->getMeta()
        ];
    }

    protected function getLinks(): array
    {
        $currentPage = $this->paginator->currentPage();
        $lastPage = $this->paginator->lastPage();

        $links = [];
        $start = max(1, $currentPage - 2);
        $end = min($lastPage, $currentPage + 2);

        // Корректировка границ для всегда 5 ссылок
        if ($currentPage <= 3)
            $end = min(5, $lastPage);
        if ($currentPage >= $lastPage - 2)
            $start = max(1, $lastPage - 4);

        // Заполняем недостающие ссылки с другой стороны
        while (($end - $start) < 4 && $start > 1)
            $start--;
        while (($end - $start) < 4 && $end < $lastPage)
            $end++;

        // Генерируем массив ссылок
        for ($page = $start; $page <= $end; $page++)
            $links[$page] = $page;

        return $links;
    }

    protected function getMeta(): array
    {
        return [
            'current_page' => $this->paginator->currentPage(),
            'last_page' => $this->paginator->lastPage(),
            'per_page' => $this->paginator->perPage(),
            'total' => $this->paginator->total(),
        ];
    }

    public static function toFullArray($resourceCollection): array
    {
        return (new static(
            $resourceCollection->collection,
            $resourceCollection->resource
        ))->toArray(request());
    }
}
