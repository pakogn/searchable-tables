<?php

namespace App;

use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SimpleSearchableTables;

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function scopeSearch(Builder $query, $search)
    {
        $input = str_clean($search['q']);
        $splittedInput = splitWhiteSpaces($input);

        $search['date_range'] = $search['date_range'] ? getDateRange($search['date_range']) : '';

        $query->where(function ($query) use ($input, $splittedInput, $search) {
            if (empty(array_filter($search))) {
                return;
            }

            if (!empty($splittedInput)) {
                $query->where(function ($query) use ($splittedInput) {
                    foreach ($splittedInput as $word) {
                        $query->where('title', 'like', "%{$word}%");
                        $query->orWhere('body', 'like', "%{$word}%");
                    }
                });
            }

            if (!empty($search['post_categories'])) {
                $query->whereIn('post_category_id', $search['post_categories']);
            }
        })
            ->where(function ($query) use ($search) {
                if (!empty($search['date_range'])) {
                    $query->whereBetween('created_at', [$search['date_range']['start'], $search['date_range']['end']]);
                }
            })
            ->orderBy('created_at', 'desc');

        return $query;
    }
}
