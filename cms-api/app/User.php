<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable=[
      'name', 'email', 'password',
  ];

  protected $hidden=[
     'created_at', 'deleted_at'
  ];

  public function pages()
  {
    return $this->hasMany(Page::class);
  }

  public function articles()
  {
    return $this->hasMany(Article::class);
  }


  public function media()
  {
    return $this->hasMany(Media::class);
  }


  public function categories()
  {
    return $this->hasMany(Category::class);
  }

  public function getAll($offset, $limit)
  {
    return static::orderBy('created_at', 'desc')
        ->skip($offset)
        ->take($limit)
        ->get()->toArray();
  }

  public function total()
  {
    return static::count();
  }

  public function findUser($id)
  {
    return static::find($id);
  }

  public function deleteUser($id)
  {
    return static::find($id)->delete();
  }

  public function saveuser()
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
