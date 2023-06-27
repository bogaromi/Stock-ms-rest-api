<?php

/* 

 * Author: @Zoltan Bogaromi
 */

namespace App\Controllers;

class Partners extends \CodeIgniter\RESTful\ResourceController
{
    protected $format = "json";
    protected $modelName = "App\Models\PartnerModel";
    
    public function index() 
	{
		header("Access-Control-Allow-Origin: *");
		$data = $this->model->where("status", 1)->orderBy("created")->findAll();
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
        
        public function update($partnerId = null)
	{
		if($this->request->withMethod("PUT"))
		{
			$data = $this->request->getRawInput();
		}
		else
		{
			$data = $this->request->getPost();
		}
		
		$success = $this->model->update($partnerId, $data);
		
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
        
        public function show($partnerId = null)
	{
		$data = $this->model->find($partnerId);
		return $this->respond($data);
	}
       
        
        
}

