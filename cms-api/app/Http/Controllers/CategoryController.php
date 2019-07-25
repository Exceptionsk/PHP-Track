<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Http\Controllers\APIBaseController as BaseController;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface as UserInterface;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryInterface;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $user;
    public $category;

    public function __construct(Request $request, UserInterface $user, CategoryInterface $category)
    {
       $this->user = $user;
       $this->category = $category;

       $this->method     = $request->getMethod();
       $this->endpoint   = $request->path();
       $this->startTime  = microtime(true);
    }

    public function index(Request $request)
    {
      $this->offset = isset($request->offset)? $request->offset : 0;
      $this->limit = isset($request->limit)? $request->limit : 0;

      $category  = $this->category->getAll($this->offset, $this->limit);

      $total = $this->category->total();

      $this->data($category);
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
        $category=$request->validate([
         'name'        =>  'required',
         'user_id'     =>  'required',
         'slug'        => 'required',
         'description' => 'required'
       ]);

       $user = $this->user->find($request->user_id);
       if (empty($user)) {
           $this->setError('404', $request->user_id);
           return $this->response('404');
       }else{
         $result = $this->category->store($category);
         if (isset($result)) {
           $this->data(array('id' =>  $result));
         }
         return $this->response('201');
       }
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $category = $this->category->find($id);
      if (empty($category)) {
          $this->setError('404', $id);
          return $this->response('404');
      }else{
        $this->data(array($category));
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
      $category = $this->category->find($id);
      if (empty($category)) {
          $this->setError('404', $id);
          return $this->response('404');
      }else{
        $this->category->updateCategory($request->all(),$id);
        $this->data(array('updated' =>  1));
        return $this->response('200');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = Category::find($id);
      if (empty($category)) {
          $this->setError('404', $id);
          return $this->response('404');
      }else{
        $this->category->softdelete($id);
        $this->data(array('deleted' =>  1));
        return $this->response('200');
      }
    }
}
