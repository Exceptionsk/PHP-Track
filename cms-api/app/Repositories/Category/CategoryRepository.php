<?php

namespace App\Repositories\Category;

use App\Category;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryInterface;

class CategoryRepository implements CategoryInterface
{
  public $category;

  public function __construct(Category $category)
  {
     $this->category = $category;
  }

  public function getAll($offset, $limit){
    return $this->category->getAll($offset, $limit);
  }

  public function find($id)
  {
    return $this->category->findCategory($id);
  }

  public function delete($id)
  {
    return $this->category->deleteCategory($id);
  }

  public function total()
  {
    return $this->category->total();
  }

  public function store($data){
      $this->category->fill($data);
      if ($this->category->saveCategory())
      {
        return $this->category->id;
      }
  }

  public function softdelete($id)
  {
    $this->category = $this->category->find($id);
    $this->category->softdelete();
  }

  public function updateCategory($request, $id)
  {
    $this->category = $this->category->find($id);
    $this->category->fill($request);
    $this->category->saveCategory();
  }
}
