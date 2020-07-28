<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
   use SoftDeletes;

   public function post()
   {
       return $this->belongsTo(Post::class, 'post_id', 'id')->whereNotNull('image_id');
   }
}
