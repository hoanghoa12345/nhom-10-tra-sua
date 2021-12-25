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
    $rows = $this->db->from('DanhMuc')->select('id,TenDanhMuc,MoTa')->getAll();
    return view('admin/danhmuc',["rows" => $rows]);
  }

  public function taodanhmuc()
  {
    if($this->request->getMethod() == 'post') {
      
      $this->db->in('DanhMuc')->insert([
        'id' => $this->db->lastId() ? $this->db->lastId() + 1 : 1,
        'TenDanhMuc' => $this->request->getVar('tendanhmuc'),
        'MoTa' => $this->request->getVar('mota')
      ]);
    }
    return view('admin/taodanhmuc');
    
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
