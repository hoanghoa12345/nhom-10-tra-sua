<?php

namespace App\Controllers;


class Admin extends BaseController
{
  
  public function index()
  {
    return view('admin/index');
  }
  public function sanpham()
  {
    return view('admin/index');
  }
  public function danhmuc()
  {
    return view('admin/index');
  }
  public function donhang()
  {
    return view('admin/index');
  }

  public function profile()
  {
    return 'profile';
  }
  public function logout()
  {
    return 'signout';
  }
}
