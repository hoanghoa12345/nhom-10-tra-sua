<?php

namespace App\Controllers;

use App\Libraries\xmlDb;


class Home extends BaseController
{
    /**
     * Xem quyền truy cập của file xml db
     */
    public function index()
    {
        //return view('welcome_message');
        //echo 'Database file permissions: ' . xmlDb::getDatabasePerms('database');
        echo 'Id User = '.session()->get('id') . 'Role = ' . session('role');
    }
    /**
     * Lấy toàn bộ các bảng
     */
    public function getAllTable()
    {
        $tables = $this->db->getTables();
        print_r($tables);
    }
    /**
     * Tạo mới các bảng chỉ chạy lần đầu tiên
     */
    public function createTables()
    {
        $this->db->addTable('Role');
        $this->db->addTable('NhanVien');
        $this->db->addTable('TaiKhoan');
        $this->db->addTable('HoaDon');
        $this->db->addTable('ChiTietHoaDon');
        $this->db->addTable('SanPham');
        $this->db->addTable('DanhMuc');
    }
    /**
     * Tạo mới role Admin, employee, và customer
     */
    public function seedData()
    {
        $this->db->in('Role')->insert([
            'id' => 1,
            'Ten' => 'Admin',
        ]);
        $this->db->in('Role')->insert([
            'id' => $this->db->lastId() + 1,
            'Ten' => 'Employee',
        ]);
        $this->db->in('Role')->insert([
            'id' => $this->db->lastId() + 1,
            'Ten' => 'Customer',
        ]);

        //---Bảng NhanVien---//

    }


    public function show()
    {

        $this->db->addTable('products_table');

        $this->db->in('products_table')->insert([
            'name'     => 'Tra sua 1',
            'description' => 'Description here!',
            'price' => '50000',
        ]);
        echo 'showMethod';
    }

    public function list()
    {
        $rows = $this->db->getAll();

        // print data
        foreach ($rows as $row) {
            echo $row->name . '<br />';
            echo $row->description . '<br />';
            echo $row->price . '<br />';
        }
    }

    public function getAll()
    {

        $data = $this->db->getAll();

        print_r($data);
    }

    public function example()
    {
        return view('example_msg', ["message" => "hello"]);
    }

    public function createAccount()
    {
        $this->db->in('TaiKhoan')->insert([
            'id'        => $this->db->lastId() ? $this->db->lastId() + 1 : 1,
            'UserName'  => 'admin',
            'PassWord'  => md5('123456'),
            'Ten'       => 'Admin',
            'Email'     => 'admin@team.com',
            'DiaChi'    => 'null',
            'DienThoai' => '012345678',
            'id_role'   => 1
        ]);
    }
}
