<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\User\UserRepositoryInterface as UserInterface;

class UserRepository implements UserInterface
{
  public $user;

  public function __construct(User $user)
  {
     $this->user = $user;
  }

  public function getAll($offset, $limit){
    return $this->user->getAll($offset, $limit);
  }

  public function find($id)
  {
    return $this->user->findUser($id);
  }

  public function delete($id)
  {
    return $this->user->deleteUser($id);
  }

  public function total()
  {
    return $this->user->total();
  }

  public function store($data){
      $this->user->fill($data);
      if ($this->user->saveuser()) {
        return $this->user->id;
      }
  }

  public function softdelete($id)
  {
    $this->user = $this->user->find($id);
    $this->user->softdelete();
  }

  public function updateuser($request, $id)
  {
    $this->user = $this->user->find($id);
    $this->user->fill($request);
    $this->user->saveuser();
  }
}
