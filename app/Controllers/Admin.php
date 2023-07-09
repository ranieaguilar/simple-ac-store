<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\ProductModel;
use App\Models\ClientModel;
use App\Models\ProductImageModel;
use App\Models\SystemSettingsModel;
use App\Models\ChatModel;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ];
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            $model1 = new ProductModel();
            $model2 = new ClientModel();
            $model3 = new AuthModel();
          
            $data['product'] = $model1->countAllResults();
            $data['client'] =  $model2->countAllResults();
            $data['admin'] = $model3->countAllResults();
            return view('admin/dashboard_page', $data);
        }
    }

    public function showProducts()
    {

        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            $data = [
                'title' => 'Product List',
                'active' => 'product'
            ];
            $data1 = [];
            $model = new ProductModel();
            $model2 = new ProductImageModel();
            $products = $model->findAll();
            foreach ($products as $product) {
                $productimages = $model2->where('product_id', $product['product_id'])->findAll();
                $productImagedata[] = [
                    'product' => $product,
                    'product_images' => $productimages
                ];
            }
            if(!empty($products)){
                $data['products'] = $productImagedata;
            }else{
                $data['products'] = [];
            }
            
            return view('admin/show_product_page', $data);
        }
    }

    public function createProduct()
    {
        $data = [
            'title' => 'Add new Product',
            'active' => 'product'
        ];
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if ($this->request->getMethod() == 'post') {
                $model = new ProductModel();
                $model2 = new ProductImageModel();
                $data1 = array(
                    'product_name' => $this->request->getVar('product_name'),
                    'product_brand' => $this->request->getVar('product_brand'),
                    'product_model' => $this->request->getVar('product_model'),
                    'product_type' => $this->request->getVar('product_type'),
                    'product_cooling_capacity' => $this->request->getVar('product_cooling_capacity'),
                    'product_power_consumption' => $this->request->getVar('product_power_consumption'),
                    'product_price' => $this->request->getVar('product_price'),
                    'product_stock_quantity' => $this->request->getVar('product_stock_quantity'),
                    'product_description' => $this->request->getVar('product_description')
                );
                $model->insert($data1);
                $product_id =  $model->insertID();
                $productImages = $this->request->getFiles();

                foreach ($productImages['product_image'] as $productImage) {
                    if ($productImage->isValid() && $productImage->getClientMimeType() === 'image/jpeg') {
                        $newName = $productImage->getRandomName();
                        $productImage->move(ROOTPATH . 'public/admin', $newName);
                        $productData = [
                            'product_image_name' => $newName,
                            'product_id' => $product_id
                        ];
                        $model2->insert($productData);
                    } else {
                        return redirect()->back()->with('error', 'Invalid product image file');
                    }
                }
            }
            return view('admin/create_product_page', $data);
        }
    }

    public function updateProduct()
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if ($this->request->getMethod() == 'post') {
                $model = new ProductModel();
                $model2 = new ProductImageModel();
                $product_id = $this->request->getVar('product_id');
                $data1 = array(
                    'product_name' => $this->request->getVar('product_name'),
                    'product_brand' => $this->request->getVar('product_brand'),
                    'product_model' => $this->request->getVar('product_model'),
                    'product_type' => $this->request->getVar('product_type'),
                    'product_cooling_capacity' => $this->request->getVar('product_cooling_capacity'),
                    'product_power_consumption' => $this->request->getVar('product_power_consumption'),
                    'product_price' => $this->request->getVar('product_price'),
                    'product_stock_quantity' => $this->request->getVar('product_stock_quantity'),
                    'product_description' => $this->request->getVar('product_description')
                );
                $model->update($product_id, $data1);
            }
            return redirect()->to('Admin/showProducts');
        }
    }

    public function deleteProduct($product_id)
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            $model = new ProductModel();
            $model->delete($product_id);
            session()->setFlashdata('success', 'Successfully deleted profile');
            return redirect()->to('Admin/showProducts');
        }
    }

    public function updateProfile()
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            $data = [
                'title' => 'Profile',
                'active' => 'profile'
            ];
            if ($this->request->getMethod() == 'post') {

                $userModel = new AuthModel();

                $userId = $this->request->getVar('admin_id');
                $newUsername = $this->request->getVar('username');
                $newPassword = $this->request->getVar('password');

                $userData = [
                    'admin_username' => $newUsername
                ];

                if (!empty($newPassword)) {
                    $userData['admin_password'] = $newPassword;
                }
                $userModel->update($userId, $userData);
                session()->set(['admin_username' => $newUsername]);
                session()->setFlashdata(['success' => 'Successfully updated profile']);
                // return redirect()->to('/user/profile');
            }
            return view('admin/profile_page', $data);
        }
    }

    public function showClient()
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            $data = [
                'title' => 'Show Client',
                'active' => 'client'
            ];
            $model = new ClientModel();
            $data['client'] = $model->findAll();
            return view('Admin/show_client_page', $data);
        }
    }

    public function testing()
    {
        $data = [
            'title' => 'Profile',
            'active' => 'profile'
        ];
        $productModel = new ProductModel();
        $productImage = new ProductImageModel();

        // Get all users
        $products = $productModel->findAll();

        // Array to store user cart data
        $productImages = [];

        foreach ($products as $product) {
            $productimages = $productImage->where('product_id', $product['product_id'])->findAll();
            $productImagedata[] = [
                'product' => $product,
                'product_images' => $productimages
            ];
        }

        // Pass user and cart item data to the view
        $data['products'] = $productImagedata;
        

        // Display users and cart items view
        return view('admin/product_view', $data);
    }

    public function settings()
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if(session()->get('admin_type') == 'super_admin'){
                $model1 = new AuthModel();
                $data = [
                    'title' => 'Settings',
                    'active' => 'settings'
                ];
                $data['admins'] = $model1->findAll();
                return view('Admin/settings_page', $data);
            }else{
                return redirect()->to('Admin/');
            }
            
        }
    }

    public function add_admin(){
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if(session()->get('admin_type') == 'super_admin'){
                if($this->request->getMethod() == 'post'){
                    $profilePicture = $this->request->getFile('profile_pic');
                    $profileNew = $profilePicture->getRandomName();
                    $profilePicture->move(ROOTPATH . 'public/admin', $profileNew);
                    $model = new AuthModel();
    
                    $data = array(
                        'admin_username' => $this->request->getVar('username'),
                        'admin_password' => $this->request->getVar('password'),
                        'admin_type' => 'admin',
                        'admin_status' => 'active',
                        'admin_profile_pic' => $profilePicture->getName()
                    );
                   
                    $model->save($data);
                    session()->setFlashdata(['success' => 'Successfully added admin']);
                    return redirect()->to('Admin/settings');
                }
            }else{
                return redirect()->to('Admin/');
            }
            
        }
        
    }

    public function deleteAdmin($admin_id)
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if(session()->get('admin_type') == 'super_admin'){
                $model = new AuthModel();
                $model->delete($admin_id);
                session()->setFlashdata('success', 'Successfully deleted Admin');
                return redirect()->to('Admin/settings');
            }else{
                return redirect()->to('Admin/');
            }
            
        }
       
    }

    public function updateAdmin()
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if(session()->get('admin_type') == 'super_admin'){
                if ($this->request->getMethod() == 'post') {
                    $Model = new AuthModel();
                    $userId = $this->request->getVar('admin_id');
                    $newUsername = $this->request->getVar('username');
                    $newPassword = $this->request->getVar('password');
                    $newType = $this->request->getVar('admin_type');
                    $profilePicture = $this->request->getFile('profile_pic');
                    $userData = [
                        'admin_username' => $newUsername,
                        'admin_type' => $newType
                    ];
    
                    if (!empty($newPassword)) {
                        $userData['admin_password'] = $newPassword;
                    }
                    if (!$profilePicture->getError() == UPLOAD_ERR_NO_FILE) {
                        $profileNew = $profilePicture->getRandomName();
                        $profilePicture->move(ROOTPATH . 'public/admin', $profileNew);
                        $userData['admin_profile_pic'] = $profilePicture->getName();
                    }
                    $Model->update($userId, $userData);
                    session()->set(['admin_username' => $newUsername]);
                    session()->setFlashdata(['success' => 'Successfully updated admin']);
                    return redirect()->to('Admin/settings');
                }
            }else{
                return redirect()->to('Admin/');
            }
            
            
        }
    }

    public function updateSystemName()
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if(session()->get('admin_type') == 'super_admin'){
                $model = new SystemSettingsModel();
                $sysname = $this->request->getVar('sysname');
                $model->update(1, ['ss_name' => $sysname]);
                session()->setFlashdata('success', 'Successfully updated System Name');
                return redirect()->to('Admin/settings');
            }else{
                return redirect()->to('Admin/');
            }
            
        }
       
    }

    public function updateSystemImage()
    {
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if(session()->get('admin_type') == 'super_admin'){
                $model = new SystemSettingsModel();
                $sysimage = $this->request->getFile('sysimage');
                if (!$sysimage->getError() == UPLOAD_ERR_NO_FILE) {
                    $ssnew = $sysimage->getRandomName();
                    $sysimage->move(ROOTPATH . 'public/admin', $ssnew);
                    $sysdata = $sysimage->getName();
                    $model->update(1, ['ss_image' => $sysdata]);
                    session()->setFlashdata('success', 'Successfully updated System Name');
                    return redirect()->to('Admin/settings');
                }
                return redirect()->to('Admin/settings');
            }else{
                return redirect()->to('Admin/');
            }
            
        }
       
    }

    public function chat($client_id = null){
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if(session()->get('admin_type') == 'super_admin'){
                $model1 = new ClientModel();
                $model = new ChatModel();
                $data = [
                    'title' => 'Messages',
                    'active' => 'messages'
                ];

                if($this->request->getMethod() == 'post'){
                    $message = $this->request->getVar('message');
                    $client_id = $this->request->getVar('client_id');
                    $data1 = [
                        'chat_sender' => 'admin',
                        'chat_receiver' => $client_id,
                        'chat_message' => $message
                    ];
                    $model->insert($data1);
                    return redirect()->to('Admin/chat/'. $client_id);
                }

                $data['clients'] = $model1->findAll();

                if($client_id == null){
                    $data['chats'] = '';
                    $data['client_name'] = '';
                }else{
                    $data['chats'] = $model->where("chat_sender='admin' AND chat_receiver={$client_id} OR chat_sender={$client_id} AND chat_receiver='admin'")->join('client','client.client_id = chats.chat_sender', 'left' )->orderBy('chat_created_at', 'ASC')->findAll();
                    $data['client_name'] = $model1->find($client_id);
                }
                return view('Admin/message_page', $data);
            }else{
                return redirect()->to('Admin/');
            }
            
        }
    }

    public function deleteImage($imagesID){
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            $model = new ProductImageModel();
            $model->delete($imagesID);
            session()->setFlashdata('success', 'Successfully deleted Image');
            return redirect()->to('Admin/showProducts');
        }
    }

    public function update_client(){
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            if($this->request->getMethod() == 'post'){
                $data1['client_id'] = $this->request->getVar('client_id');
                $data1['client_firstname'] = $this->request->getVar('client_firstname');
                $data1['client_lastname'] = $this->request->getVar('client_lastname');
                $data1['client_email'] = $this->request->getVar('client_email');
                if(!empty($this->request->getVar('client_password'))){
                    $data1['client_password'] = $this->request->getVar('client_password');
                }
                $data1['client_phonenumber'] = $this->request->getVar('phonenumber');
                $data1['client_address'] = $this->request->getVar('client_address');
                $model = new ClientModel();
    
                $model->update($data1['client_id'], $data1);
                session()->setFlashdata('success', 'Successfully updated Client');
                return redirect()->to('Admin/showCLient');
                
                //var_dump($user);
            }
        }
    }

    public function deleteClient($client_id){
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            $model = new ClientModel();
            $model->delete($client_id);
            session()->setFlashdata('success', 'Successfully deleted client');
            return redirect()->to('Admin/showClient');
        }
    }

    public function updateAdminImage($admin_id){
        if (session()->get('loggedin') == false) {
            return redirect()->to('Auth/login');
        } else {
            $model = new AuthModel();
            $adminimage = $this->request->getFile('profileimage');
            if (!$adminimage->getError() == UPLOAD_ERR_NO_FILE) {
                $apnew = $adminimage->getRandomName();
                $adminimage->move(ROOTPATH . 'public/admin', $apnew);
                $sysdata = $adminimage->getName();
                $model->update($admin_id, ['admin_profile_pic' => $sysdata]);
                session()->setFlashdata('success', 'Successfully updated profile picture');
                session()->set([
                    'admin_profile_pic' => $sysdata,
                    
                ]);
                return redirect()->to('Admin/updateProfile');
            }
            return redirect()->to('Admin/updateProfile');
            
        }
    }

    public function layoutview(){
        $data = [
            'title' => 'Settings',
            'active' => 'settings'
        ];
        return view('Admin/mat', $data);
    }
}