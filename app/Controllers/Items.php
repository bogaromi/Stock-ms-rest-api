<?php

/* 

 * Author: @Zoltan Bogaromi
 */


namespace App\Controllers;

class Items extends \CodeIgniter\RESTful\ResourceController
{
   protected $format = "json";
    protected $modelName = "App\Models\ItemModel";
    
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
        
        public function update($itemId = null)
	{
		if($this->request->withMethod("PUT"))
		{
			$data = $this->request->getRawInput();
		}
		else
		{
			$data = $this->request->getPost();
		}
		
		$success = $this->model->update($itemId, $data);
		
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
        
        public function show($itemId = null)
	{
		$data = $this->model->find($itemId );
		return $this->respond($data);
	}
        
        public function byPartnerId($pid = null)
	{
		$data = $this->model->where("partner_id", $pid)->findAll();
		return $this->respond($data);
	}
        
        
       
}