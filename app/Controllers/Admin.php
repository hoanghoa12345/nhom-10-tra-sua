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
     $rows = $this->db->from('SanPham')->select('id,id_cat,TenSanPham,Gia,MoTa')->getAll();
     return view('admin/sanpham',["rows" =>$rows]);
  }
  public function taosanpham(){
    if ($this->request->getMethod() == 'post') {

      $this->db->in('SanPham')->insert([
        'id' => $this->db->lastId() ? $this->db->lastId() + 1 : 1,
        'id_cat' => $this->request->getVar('id_cat'),
        'TenSanPham' => $this->request->getVar('tensanpham'),
        'Gia' => $this->request->getVar('gia'),
        'MoTa' => $this->request->getVar('mota')
      ]);
    }
    return view('admin/taosanpham');
  }
  public function suasanpham($id){
    $this->db->from('SanPham')->select('id, id_cat,TenSanPham,Gia, MoTa')->where('id',$id);

    $row = $this->db->getRow();
    if ($this->request->getMethod() == 'post') {
      $this->db->in('SanPham')
        ->where('id', $id)
        ->bind('id_cat', $this->request->getVar('id_cat'))
        ->bind('TenSanPham', $this->request->getVar('tensanpham'))
        ->bind('Gia', $this->request->getVar('gia'))
        ->bind('MoTa', $this->request->getVar('mota'))
        ->update();
        return redirect()->to(base_url('admin/sanpham'));
    }
    return view('admin/suasanpham',['row' => $row]);
  }
  public function xoasanpham($id){
    $this->db->from('SanPham')->where('id', $id)->delete();
    return redirect()->to(base_url('admin/sanpham'));
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
    return view('admin/taodanhmuc');
  }

  public function suadanhmuc($id)
  {
    $this->db->from('DanhMuc')->select('id, TenDanhMuc, MoTa')->where('id',$id);

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
