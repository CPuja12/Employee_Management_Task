<?php

namespace App\Controllers;
use App\Models\EmployeeModel;

class Employee extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    // Ensure the user is logged in.
    private function checkLogin()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('auth/login'));
        }
    }

    // Display the add employee form
    public function add()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('auth/login'));
        }
        return view('employee_add');
    }

    // Process the add employee form submission
    public function insert()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('auth/login'));
        }

        $model = new EmployeeModel();

        $data = [
            'name'        => $this->request->getPost('name'),
            'address'     => $this->request->getPost('address'),
            'designation' => $this->request->getPost('designation'),
            'salary'      => $this->request->getPost('salary'),
        ];

        // Handle picture file upload.
        $img = $this->request->getFile('picture');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            // Ensure that the writable/uploads folder exists.
            $img->move(WRITEPATH . 'uploads', $newName);
            $data['picture'] = $newName;
        }

        $model->insert($data);

        return redirect()->to(site_url('employee/list'));
    }

    // Display list of employees
    public function list()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('auth/login'));
        }

        $model = new EmployeeModel();
        $data['employees'] = $model->findAll();
        return view('employee_list', $data);
    }

    // Display the edit employee form
    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('auth/login'));
        }

        $model = new EmployeeModel();
        $data['employee'] = $model->where('id', $id)->first();
        return view('employee_edit', $data);
    }

    // Process the update employee form submission
    public function update()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('auth/login'));
        }

        $model = new EmployeeModel();
        $id = $this->request->getPost('id');

        $data = [
            'name'        => $this->request->getPost('name'),
            'address'     => $this->request->getPost('address'),
            'designation' => $this->request->getPost('designation'),
            'salary'      => $this->request->getPost('salary'),
        ];

        // Handle picture update if a new file is provided.
        $img = $this->request->getFile('picture');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads', $newName);
            $data['picture'] = $newName;
        }

        $model->update($id, $data);

        return redirect()->to(site_url('employee/list'));
    }

    // Delete an employee record
    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('auth/login'));
        }
        $model = new EmployeeModel();
        $model->delete($id);
        return redirect()->to(site_url('employee/list'));
    }
}
