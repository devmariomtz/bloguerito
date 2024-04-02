<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginatorHelper
{
    static function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        // Obtenemos la página actual
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        // Creamos una instancia de la clase LengthAwarePaginator
        $items = $items instanceof Collection ? $items : Collection::make($items);
        // Cambiamos la vista de paginación a la vista de Bootstrap
        Paginator::useBootstrap();
        // Retornamos la instancia de la clase LengthAwarePaginator
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
