<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface{
  public function getAll($offset, $limit);
  public function find($id);
  public function total();
  public function store($data);
  public function updateCategory($request, $id);
  public function delete($id);
}
