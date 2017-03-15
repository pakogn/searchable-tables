<?php

namespace App;

use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use SimpleSearchableTables;

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    protected $searchable = [
        'label',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
