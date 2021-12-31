<?php

namespace App\Controllers;


class Admin extends BaseController
{

  public function index()
  {
    session()->remove('active_menu');
    session()->set('active_menu',1);
    return view('admin/index');
  }
  public function sanpham()
  {
    session()->remove('active_menu');
    session()->set('active_menu',2);
    return view('admin/index');
  }
  public function danhmuc()
  {
    session()->remove('active_menu');
    session()->set('active_menu',3);
    $rows = $this->db->from('DanhMuc')->select('id,TenDanhMuc,MoTa')->getAll();
    return view('admin/danhmuc', ["rows" => $rows]);
  }

  public function taodanhmuc()
  {
    if ($this->request->getMethod() == 'post') {

      $this->db->in('DanhMuc')->insert([
        'id' => $this->db->lastId() ? $this->db->lastId() + 1 : 1,
        'TenDanhMuc' => $this->request->getVar('tendanhmuc'),
        'MoTa' => $this->request->getVar('mota')
      ]);
    }
    return view('admin/danhmuc');
  }

  public function suadanhmuc($id)
  {
    $this->db->from('DanhMuc')->select('id, TenDanhMuc, MoTa')->where('id',$id);

    // get row
    $row = $this->db->getRow();
    if ($this->request->getMethod() == 'post') {
      $this->db->in('DanhMuc')
        ->where('id', $id)
        ->bind('TenDanhMuc', $this->request->getVar('tendanhmuc'))
        ->bind('MoTa', $this->request->getVar('mota'))
        ->update();
        return redirect()->to(base_url('admin/danhmuc'));
    }
    return view('admin/suadanhmuc',['row' => $row]);
  }
  public function xoadanhmuc($id)
  {
    $this->db->from('DanhMuc')->where('id', $id)->delete();
    return redirect()->to(base_url('admin/danhmuc'));
  }

  public function donhang()
  {
    session()->remove('active_menu');
    session()->set('active_menu',4);
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
