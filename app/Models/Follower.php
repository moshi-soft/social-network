<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['followable_id', 'followable_type', 'follower_id', 'status'];

    public function followable()
    {
        return $this->morphTo();
    }

    public function personPost()
    {
        return $this->hasManyThrough(Post::class, User::class,'id','postable_id','followable_id','id');
    }

    public function pagePost()
    {
        return $this->hasManyThrough(Post::class, Page::class);
    }
}
