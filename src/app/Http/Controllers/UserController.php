<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  protected $user_model;

  public function __construct()
  {
    $this->user_model = new \App\UserModel();
  }

  public function dynamic()
  {
    return view('user.dynamic');
  }
}
