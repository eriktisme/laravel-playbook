<?php

namespace Scaling\Playbook\Tests\Utils\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
