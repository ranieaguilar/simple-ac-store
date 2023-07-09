<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChatModel;
use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\ClientModel;
use App\Models\LikeItemModel;
class Client extends BaseController
{
    public function index()
    {
       if(session()->get('client_loggedin') == false){
            session()->set(['popup' => false]);
       }
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
        return view('client/show_products', $data);
    }


    public function view_likes($client_id){
        $data = [
            'title' => 'Liked Items',
            'active' => 'product'
            ];
        $model = new LikeItemModel();
        $model2 = new ProductImageModel();
        // $data['likes'] 
        $products = $model->where('client_id', $client_id)->join('products','products.product_id = like_item.product_id', 'inner' )->findAll();
        foreach ($products as $product) {
            $productimages = $model2->where('product_id', $product['product_id'])->findAll();
            $productImagedata[] = [
                'product' => $product,
                'product_images' => $productimages
            ];
        }
        if(!empty($products)){
            $data['likes'] = $productImagedata;
        }else{
            $data['likes'] = [];
        }
        // var_dump($data);
        return view('client/view_like_page', $data);
    }

    public function view_profile(){
        session()->set(['popup' => true]);
        $data = [
            'title' => 'Profile',
            'active' => 'product'
            ];
        if($this->request->getMethod() == 'post'){
            $data1['client_firstname'] = $this->request->getVar('firstname');
            $data1['client_lastname'] = $this->request->getVar('lastname');
            $data1['client_email'] = $this->request->getVar('email');
            $data1['client_phonenumber'] = $this->request->getVar('phonenumber');
            $data1['client_address'] = $this->request->getVar('address');
            if(!empty($this->request->getVar('password'))){
                $data1['client_password'] = $this->request->getVar('password');
            }
            $model = new ClientModel();
            $model->update($this->request->getVar('client_id') ,$data1);
            $client = $model->where('client_id', $this->request->getVar('client_id') )->first();
            // session()->set(['popup' => true]);
            session()->set($client);
            // session()->set(['client_loggedin' => true]);
            session()->setFlashdata(['alert' => 'Profile updated']);
            return redirect()->to('Client/view_profile');
           
            //var_dump($user);
        }
        return view('client/profile_page', $data);
    }

    public function view_item($product_id){
        $data = [
            'title' => 'View Item',
            'active' => 'product'
            ];
        $model = new ProductModel();
        $model1 = new ProductImageModel();
        $data['item'] = $model->find($product_id);
        $data['product_images'] = $model1->where('product_id', $product_id)->findAll();
        return view('client/show_item_page', $data);
    }

    public function like_item($prod_id, $client_id){
        $model = new LikeItemModel();
        $data = array(
            'client_id' => $client_id,
            'product_id' => $prod_id
        );

        if($model->where($data)->countAllResults() > 0){
            session()->setFlashdata(['alert' => 'Item already in your likes']);
            return redirect()->to('Client/view_item/'. $prod_id);
        }else{
            $model->insert($data);
            session()->setFlashdata(['alert' => 'Item addedd to your likes']);
            return redirect()->to('Client/view_item/'. $prod_id);
        }

    }

    public function login(){
        $data = [
            'title' => 'Login',
            'active' => 'product'
            ];
        session()->set(['popup' => true]);
        if($this->request->getMethod() == 'post'){
            $model = new ClientModel();
            $username = $this->request->getVar('username');
            $password = $this->request->getvar('password');
            if(filter_var($username, FILTER_VALIDATE_EMAIL)){
                $client = $model->where('client_email', $username)->first();
            }else{
                $client = $model->where('client_phonenumber', $username)->first();
            }
            if($client && password_verify($password, $client['client_password'])){
                session()->set(['popup' => true]);
                session()->set($client);
                session()->set(['client_loggedin' => true]);
                return redirect()->to('Client/index');
            }else{
                session()->setFlashdata(['alert' => 'Incorrect Email/Phone Number or Password']);
            }

        }
        return view('client/login_page', $data);
    }

    public function logout(){
        $session = session();

        // Remove user data from session
        $session->remove('client_id ');
        $session->remove('client_firstname');
        $session->remove('client_lastname');
        $session->remove('client_address');
        $session->remove('client_phonenumber');
        $session->remove('client_email');
        $session->remove('client_description');
        $session->remove('client_appointment_date');
        $session->remove('client_password');
        $session->remove('client_created_at');
        $session->remove('client_updated_at');
        $session->remove('client_deleted_at');
        $session->remove('client_loggedin');
        $session->set(['popup' => false]);

        // Redirect to the login page
        return redirect()->to('Client/index');
    }

    public function remove_like($like_id){
        $model = new LikeItemModel();
        $model->delete(['like_item_id' => $like_id]);
        session()->setFlashdata(['alert' => 'Item removed from youy likes']);
        return redirect()->to('Client/view_likes/' . session()->get('client_id'));

    }

    public function register(){
        session()->set(['popup' => true]);
        $data = [
            'title' => 'Register',
            'active' => 'product'
            ];
        if($this->request->getMethod() == 'post'){
            $data1['client_firstname'] = $this->request->getVar('firstname');
            $data1['client_lastname'] = $this->request->getVar('lastname');
            $data1['client_email'] = $this->request->getVar('email');
            $data1['client_phonenumber'] = $this->request->getVar('phonenumber');
            $data1['client_address'] = $this->request->getVar('address');
            $data1['client_password'] = $this->request->getVar('password');
            $data1['client_description'] = 'registered';
            $model = new ClientModel();

            $user = $model->where('client_email', $data1['client_email'])->first();
            $user2 = $model->where('client_phonenumber', $data1['client_phonenumber'])->first();
            if(empty($user) && empty($user2)){
                $model->insert($data1);
                $cid = $model->insertId();
                $client = $model->where('client_id', $cid)->first();
                session()->set(['popup' => true]);
                session()->set($client);
                session()->set(['client_loggedin' => true]);
                return redirect()->to('Client/index');
            }else{
                session()->setFlashdata(['alert' => 'Email or Phone number is already registered']);
            }
            //var_dump($user);
        }
        return view('client/register_page', $data);
    }

    public function searchItem(){
        $data = [
            'title' => 'Searched Item',
            'active' => 'product'
            ];
        if($this->request->getMethod() == 'post'){
            $model = new ProductModel();
            $model2 = new ProductImageModel();
            $products = $model->like($this->request->getVar('search_category'), $this->request->getVar('search'))->findAll();
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
            //var_dump($products);
        }
        return view('client/view_search_page', $data);
    }

    public function contact_us(){
        $data = [
            'title' => 'Contact Us',
            'active' => 'product'
            ];
        return view('client/contact_us_page', $data);
    }

    public function guest(){
        $data1['client_firstname'] = $this->request->getVar('firstname');
        $data1['client_lastname'] = $this->request->getVar('lastname');
        $data1['client_email'] = $this->request->getVar('email');
        $data1['client_phonenumber'] = $this->request->getVar('phonenumber');
        $data1['client_address'] = $this->request->getVar('address');
        $data1['client_description'] = 'guest';
        if(!empty($data1)){
            $model = new ClientModel();
            $model->insert($data1);
            $cid = $model->insertId();
            $client = $model->where('client_id', $cid)->first();
            session()->set(['popup' => true]);
            session()->set(['client_loggedin' => true]);
            session()->set($client);
            return redirect()->to('Client/index');
        }else{
            session()->set(['popup' => false]);
        }
        

    }
    public function chat($client_id){
        $model = new ChatModel();
        $data = [
            'title' => 'Chat',
            'active' => 'product'
        ];
        if($this->request->getMethod() == 'post'){
            $message = $this->request->getVar('message');
            $client_id = $this->request->getVar('client_id');
            $data1 = [
                'chat_sender' => $client_id,
                'chat_receiver' => 'admin',
                'chat_message' => $message
            ];

            $model->insert($data1);
            return redirect()->to('Client/chat/'. $client_id);
        }

      
        $chat1 = $client_id;
        $data['chats'] = $model->where("chat_sender='admin' AND chat_receiver={$chat1} OR chat_sender={$chat1} AND chat_receiver='admin'")->limit(3)->orderBy('chat_created_at', 'ASC')->findAll();

        
        return view('client/client_chat_page', $data);
    }
}