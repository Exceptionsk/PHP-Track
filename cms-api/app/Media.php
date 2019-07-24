<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function article_media()
  {
    return $this->hasMany(ArticleModel::class);
  }
}
