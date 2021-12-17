<?php

namespace App\Controllers;


class Auth extends BaseController
{
  public function register()
    {
        $msg = '';
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'name' => 'required',
                'password' => 'required',
                'password2' => 'matches[password]'
            ];
            if (!$this->validate($rules)) {
                return view('auth/register', [
                    'validation' => $this->validator,
                    'msg' => $msg
                ]);
            } else {
                $this->db->from('TaiKhoan')->select('id, Email, UserName')->where('Email', $this->request->getVar('email'))->orWhere('UserName', $this->request->getVar('username'));

                $row = $this->db->getRow();

                if (!$row) {
                    $this->db->in('TaiKhoan')->insert([
                        'id'        => $this->db->lastId() ? $this->db->lastId() + 1 : 1,
                        'UserName'  => $this->request->getVar('username'),
                        'PassWord'  => md5($this->request->getVar('password')),
                        'Ten'       => $this->request->getVar('name'),
                        'Email'     => $this->request->getVar('email'),
                        'DiaChi'    => 'null',
                        'DienThoai' => 'null',
                        'id_role'   => 3
                    ]);
                    $msg = "Tạo tài khoản thành công!";
                } else {
                    $msg = 'Email và tên đăng nhập đã được sử dụng';
                }
            }
        }
        return view("auth/register", [
            "msg" => $msg
        ]);
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[4]|max_length[50]|valid_email',
                'password' => 'required|min_length[4]|max_length[255]',
            ];

            if (!$this->validate($rules)) {

                return view('auth/login', [
                    "validation" => $this->validator,
                ]);
            } else {
                //Check email exist
                $this->db->from('TaiKhoan')->select('id, UserName, PassWord, Ten, Email, id_role')->where('Email', $this->request->getVar('email'));

                $user = $this->db->getRow();
                //var_dump($user); exit();
                if ($user) {
                    //Check password correct
                    if ($user->PassWord === md5($this->request->getVar('password'))) {
                        //Save user to session
                        $this->saveUserToSession($user);

                        //Check roles
                        if ($user->id_role === '1' || $user->id_role === '2') {
                            return redirect()->to(base_url('admin/index'));
                        }
                        if ($user->id_role === '3')
                            return redirect()->to(base_url('home/index'));
                    }
                }
            }
        }
        return view('auth/login');
    }

    private function saveUserToSession($user)
    {
        $data = [
            'id' => $user->id,
            'name' => $user->Ten,
            'username' => $user->UserName,
            'email' => $user->Email,
            'role' => $user->id_role,
            'isLoggedIn' => true,
        ];

        session()->set($data);
    }

    public function logout()
    {
      session()->destroy();
      return redirect()->to('auth/login');
    }
}