<?php

namespace App\Controllers;

use App\Libraries\xmlDb;


class Home extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
        echo 'Database file permissions: ' . xmlDb::getDatabasePerms('database');
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

    public function getAllTable()
    {
        // get tables names
        $tables = $this->db->getTables();

        // print table names
        print_r($tables);
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
}
