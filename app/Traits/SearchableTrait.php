<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SearchableTrait
{
    /**
     * Search in Model from Request.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchFromRequest(Builder $query)
    {
        extract(request()->all());

        if (isset($q)) {
            return $this->search($q);
        }

        return $query;
    }

    /**
     * Adds a search scope.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string  $search
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, $search = "")
    {
        if (!empty($search) && is_string($search)) {
            return $this->filterByColumn($query, $search);
        }

        return $query;
    }

    /**
     * Filter the data by column data.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function filterByColumn(Builder $query, $search = "")
    {
        foreach ($this->searchable as $field) {
            if ($field == $this->primaryKey && $this->incrementing) {
                $query->orWhere($field, (int) $search);
            } else {
                switch (config('database.default')) {
                    case 'pgsql':$query->orWhere($field, 'ILIKE', "%{$search}%");
                        break;
                    default:
                        $query->orWhere($field, 'LIKE', "%{$search}%");
                }
            }
        }

        return $query;
    }
}
