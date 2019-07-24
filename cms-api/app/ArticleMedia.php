<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleMedia extends Model
{
  public function media()
  {
    return $this->belongsTo(Media::class);
  }
  public function article()
  {
    return $this->belongsTo(Article::class);
  }

}
