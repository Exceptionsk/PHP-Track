<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable=[
      'name', 'user_id', 'slug', 'description'
  ];

  protected $hidden=[
    'created_at', 'updated_at', 'deleted_at'
  ];

  public function user()
  {
    return $this->belongsTo(User::class. 'user_id', 'id');
  }

  public function article_categories()
  {
    return $this->belongsTo(ArticleCategory::class);
  }

  public function getAll($offset, $limit)
  {
    return static::orderBy('created_at', 'desc')
        // ->skip($offset)
        // ->take($limit)
        ->get()->toArray();
  }

  public function total()
  {
    return static::count();
  }

  public function findCategory($id)
  {
    return static::find($id);
  }

  public function deleteCategory($id)
  {
    return static::find($id)->delete();
  }

  public function saveCategory()
  {
    if (static::save()) {
      return true;
    }

  }

  public function softdelete()
  {
     static::delete();
  }

}
