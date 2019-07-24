<?php
namespace App\Repositories\User;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepositoryInterface as UserInterface;
use App\Repositories\User\UserRepository as UserRepo;


class UserRepoServiceProvider extends ServiceProvider
{

  public function boot()
  {
    // code...
  }

  public function register()
  {
    // $this->app->bind(UserInterface, UserRepo);
    $this->app->bind('App\Repositories\User\UserRepositoryInterface', 'App\Repositories\User\UserRepository');
  }
}
