<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\APIBaseController as BaseController;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface as UserInterface;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $user;

    public function __construct(Request $request, UserInterface $user)
    {
      $this->user = $user;
      $this->method     = $request->getMethod();
      $this->endpoint   = $request->path();
      $this->startTime  = microtime(true);
    }
    public function index(Request $request)
    {
      $this->offset = isset($request->offset)? $request->offset : 0;
      $this->limit = isset($request->limit)? $request->limit : 0;

      $users  = $this->user->getAll($this->offset, $this->limit);

      $total = $this->user->total();

      $this->data($users);
      $this->total($total);
      return $this->response('200');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user=$request->validate([
        'name'      =>  'required',
        'email'     =>  'required',
        'password'  => 'required'
      ]);
     $result = $this->user->store($user);
     if (isset($result)) {
       $this->data(array('id' =>  $result));
     }
     return $this->response('201');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = $this->user->find($id);
      if (empty($user)) {
          $this->setError('404', $id);
      }else{
        $this->data(array($user));
        return $this->response('201');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->delete($id);
        return redirect()->route('users');
    }
}
