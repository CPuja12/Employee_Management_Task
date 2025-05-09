<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function insert()
    {
        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)  // Hashing password
        ];
    
        $model = new UserModel();
        $model->insert($data);
    
        return redirect()->to(site_url('user/show'));
    }
    

    public function show()
    {
        $model = new UserModel();
        $data['table'] = $model->findAll();
        return view('list', $data);
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['row'] = $model->where('id', $id)->first();
        return view('edit', $data);
    }

    public function update()
    {
        $model = new UserModel();

        $id = $this->request->getPost('id');
        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $model->update($id, $data);
        return redirect()->to(site_url('user/show'));
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->where('id', $id)->delete();
        return redirect()->to(site_url('user/show'));
    }
}
