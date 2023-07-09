<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth extends BaseController
{
    public function cAdmin()
    {
        $model = new AuthModel();
        $data = array(
            'admin_username' => 'admin',
            'admin_password' => 'admin',
            'admin_type' => 'super_admin',
            'admin_status' => 'active'
        );

        $model->insert($data);
    }

    public function login()
    {
        if(session()->get('loggedin') == false){
            if ($this->request->getMethod() == 'post') {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                $validationRules = [
                    'username' => 'required',
                    'password' => 'required'
                ];
    
                if (!$this->validate($validationRules)) {
                    return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
                }
                $userModel = new AuthModel();
                $user = $userModel->where('admin_username', $username)->first();
                if ($user && password_verify($password, $user['admin_password'])) {
                    $session = session();
                    $session->set([
                        'admin_id' => $user['admin_id'],
                        'admin_username' => $user['admin_username'],
                        'admin_type' => $user['admin_type'],
                        'admin_profile_pic' => $user['admin_profile_pic'],
                        'loggedin' => true
                    ]);
                    return redirect()->to('/Admin');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
                }
            }
            return view('auth/login_page');
        }else{
            return redirect()->to('Admin');
        }
        
    }

    public function register()
    {
    }

    public function logout()
    {
        // Start a new session
        $session = session();

        // Remove user data from session
        $session->remove('admin_id');
        $session->remove('admin_username');
        $session->remove('admin_type');
        $session->remove('loggedin');

        // Redirect to the login page
        return redirect()->to('auth/login');
    }
}
