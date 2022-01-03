<?php

namespace App\Controllers;


class Admin extends BaseController
{

  public function index()
  {
    session()->remove('active_menu');
    session()->set('active_menu', 1);
    $products = $this->db->from('SanPham')->select('*')->getAll();
    $totalProduct = count($products);

    $categories = $this->db->from('DanhMuc')->select('*')->getAll();
    $totalCategories = count($categories);

    $orders = $this->db->from('HoaDon')->select('*')->getAll();
    $totalOrder = count($orders);

    return view('admin/index', [
      'totalProduct' => $totalProduct,
      'totalCategories' => $totalCategories,
      'totalOrder' => $totalOrder
    ]);
  }

  public function sanpham()
  {
    $dm = $this->db->from('DanhMuc')->select('id,TenDanhMuc,MoTa')->getAll();
    session()->remove('active_menu');
    session()->set('active_menu', 2);
    $rows = $this->db->from('SanPham')->select('id,id_cat,TenSanPham,Gia,MoTa,HinhAnh')->orderBy('id_cat', 'asc')->getAll();
    return view('admin/sanpham', ["rows" => $rows, "ds" => $dm]);
  }
  public function taosanpham()
  {
    $dm = $this->db->from('DanhMuc')->select('id,TenDanhMuc,MoTa')->getAll();
    if ($this->request->getMethod() == 'post') {

      $img = $this->request->getFile('hinhanh');
      $img->move(ROOTPATH . 'public/uploads');

      $this->db->in('SanPham')->insert([
        'id' => $this->db->lastId() ? $this->db->lastId() + 1 : 1,
        'id_cat' => $this->request->getVar('id_cat'),
        'TenSanPham' => $this->request->getVar('tensanpham'),
        'Gia' => $this->request->getVar('gia'),
        'MoTa' => $this->request->getVar('mota'),
        'HinhAnh' => $img->getName()
      ]);
    }
    return view('admin/taosanpham', [
      "ds" =>  $dm,
    ]);
  }
  public function suasanpham($id)
  {
    $dm = $this->db->from('DanhMuc')->select('id,TenDanhMuc,MoTa')->getAll();
    $row = $this->db->from('SanPham')->select('id, id_cat,TenSanPham,Gia, MoTa, HinhAnh')->where('id', $id)->getRow();

    if ($this->request->getMethod() == 'post') {
      $img = $this->request->getFile('hinhanh');
      $input = $this->validate([
        'hinhanh' => [
          'uploaded[hinhanh]',
          'mime_in[hinhanh,image/jpg,image/jpeg,image/png]',
          'max_size[hinhanh,1024]',
        ]
      ]);
      if (!$input) {
        $this->db->in('SanPham')
          ->where('id', $id)
          ->bind('id_cat', $this->request->getVar('id_cat'))
          ->bind('TenSanPham', $this->request->getVar('tensanpham'))
          ->bind('Gia', $this->request->getVar('gia'))
          ->bind('MoTa', $this->request->getVar('mota'))
          ->bind('HinhAnh', $row->HinhAnh)
          ->update();
      } else {
        $img->move(ROOTPATH . 'public/uploads');

        $this->db->in('SanPham')
          ->where('id', $id)
          ->bind('id_cat', $this->request->getVar('id_cat'))
          ->bind('TenSanPham', $this->request->getVar('tensanpham'))
          ->bind('Gia', $this->request->getVar('gia'))
          ->bind('MoTa', $this->request->getVar('mota'))
          ->bind('HinhAnh', $img->getName())
          ->update();
      }

      return redirect()->to(base_url('admin/sanpham'));
    }
    
    return view('admin/suasanpham', ['row' => $row,"ds" => $dm, "cat_id" => $row->id_cat]);
  }
  public function xoasanpham($id)
  {
    $this->db->from('SanPham')->where('id', $id)->delete();
    return redirect()->to(base_url('admin/sanpham'));
  }
  public function danhmuc()
  {
    session()->remove('active_menu');
    session()->set('active_menu', 3);
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
    $this->db->from('DanhMuc')->select('id, TenDanhMuc, MoTa')->where('id', $id);

    $row = $this->db->getRow();
    if ($this->request->getMethod() == 'post') {
      $this->db->in('DanhMuc')
        ->where('id', $id)
        ->bind('TenDanhMuc', $this->request->getVar('tendanhmuc'))
        ->bind('MoTa', $this->request->getVar('mota'))
        ->update();
      return redirect()->to(base_url('admin/danhmuc'));
    }
    return view('admin/suadanhmuc', ['row' => $row]);
  }
  public function xoadanhmuc($id)
  {
    $this->db->from('DanhMuc')->where('id', $id)->delete();
    return redirect()->to(base_url('admin/danhmuc'));
  }

  public function donhang()
  {
    session()->remove('active_menu');
    session()->set('active_menu', 4);
    $rows = $this->db->from('HoaDon')->select('id,idHoadon,NgayNhap,SoLuong,TongSoTien')->getAll();
    return view('admin/donhang', ["rows" => $rows]);
  }

  public function nhaphoadon()
  {
    if ($this->request->getMethod() == 'post') {
      $products = $this->request->getVar('sanpham');
      $qtys = $this->request->getVar('soluong');
      $prices = $this->request->getVar('dongia');
      $sizes = $this->request->getVar('size');

      $totalPrice = 0;
      $currentDate = new \DateTime();
      $idHoadon = uniqid();

      foreach ($products as $product_id) {
        $key = $product_id - 1;
        $this->db->in('ChiTietHoaDon')->insert([
        'id' => $this->db->lastId() ? $this->db->lastId() + 1 : 1,
        'id_hoaDon' => $idHoadon,
        'id_sanPham' => $product_id,
        'SoLuong' => $qtys[$key],
        'DonGia' => $prices[$key],
        'Size' => $sizes[$key]
      ]);
      $totalPrice += (int) $prices[$key] * (int) $qtys[$key];
        //echo 'ID: ' . $product_id . "Số lượng: " . $qtys[$key] . "Giá: " . $prices[$key] . "//";
      }

      $this->db->in('HoaDon')->insert([
        'id' => $this->db->lastId() ? $this->db->lastId() + 1 : 1,
        'idHoadon' => $idHoadon,
        'NgayNhap' => $currentDate->format('Y-m-d H:i:s'),
        'SoLuong' => count($products),
        'TongSoTien' => $totalPrice,
        'NguoiNhap' => session('name')
      ]);

      return redirect()->to(base_url('admin/donhang'));
    } else {
      $rows = $this->db->from('SanPham')->select('id,TenSanPham,Gia')->getAll();
      return view('admin/nhaphoadon', ["rows" => $rows]);
    }
  }

  public function profile()
  {
    echo 'profile';
  }
  public function logout()
  {
    return 'signout';
  }
}
