<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
  public function categories()
  {
    return $this->hasMany(Category::class);
  }
  public function article()
  {
    return $this->belongsTo(Article::class);
  }
}
