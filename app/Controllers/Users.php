<?php

/* 

 * Author: @Zoltan Bogaromi
 */

namespace App\Controllers;

class Users extends \CodeIgniter\RESTful\ResourceController
{
    protected $format = "json";
    protected $modelName = "App\Models\UserModel";
    
    public function index() 
	{
		header("Access-Control-Allow-Origin: *");
		$data = $this->model->where("status", 1)->orderBy("id")->findAll();
		return $this->respond($data);
	}
        public function create()
	{
		$values = $this->request->getPost();
		$result = $this->model->insert($values);
		
		if($result)
		{
			return $this->respondCreated($result);
		}
		else
		{
			$errors = $this->model->errors();
			return $this->failValidationErrors($errors);
		}
	}
        
        public function update($userId = null)
	{
		if($this->request->withMethod("PUT"))
		{
			$data = $this->request->getRawInput();
		}
		else
		{
			$data = $this->request->getPost();
		}
		
		$success = $this->model->update($userId, $data);
		
		if($success)
		{
			return $this->respondUpdated($success);
		}
		else
		{
			$errors = $this->model->errors();
			return $this->failValidationErrors($errors);
		}
	}
        
        public function login()
	{           
               $username = $this->request->getVar('username');
               $password = $this->request->getVar('password');
               $is_username = $this->model->where('username', $username)->first();
               
               if($is_username){
               
                $verify_password = password_verify($password, $is_username['password']);
                if($verify_password){
                
                 return $this->respondCreated([
                     'status' => 1,
                     'message' => 'User login successfully',
                 ]);
                } else {
               
                     return $this->respondCreated([
                     'status' => 0,
                     'message' => 'Invalid Username and Password',
                   ]);
                  } 
               } else {
                  return $this->respondCreated([
                     'status' => 0,
                     'message' => 'Username is not found',
                   ]);
                  }
	}
        public function show($userId = null)
	{
                header("Access-Control-Allow-Origin: *");
		$data = $this->model->find($userId);
		return $this->respond($data);
	}
      
}

