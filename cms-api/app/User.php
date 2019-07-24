<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable=[
      'name', 'email', 'password',
  ];

  protected $hidden=[
    'password', 'remember_token'
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

  public function store()
  {
    if (static::save()) {
      return true;
    }
  }
}
