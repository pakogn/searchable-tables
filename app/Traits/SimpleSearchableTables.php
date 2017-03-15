<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SimpleSearchableTables
{
    use SearchableTrait;

    public function scopePaginateForTable(Builder $query)
    {
        $limit = request()->get('limit', 10);

        $paginator = $query->paginate($limit);
        $paginator->appends(array_filter(request()->all()));

        return $paginator;
    }
}
