<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['owner_id', 'page_name', 'status'];

    public function posts()
    {
        return $this->morphMany(Post::class, 'postable');
    }
}
