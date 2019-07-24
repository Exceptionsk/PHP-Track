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
    try {


      $this->user->fill($data);
      // dd($data);
      if ($this->user->store()) {
        return $this->user->id;
      }

    } catch (\Exception $e) {
    }

  }

}
