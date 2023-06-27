<?php

/* 

 * Author: @Zoltan Bogaromi
 */

namespace App\Controllers;


class Stocks extends \CodeIgniter\RESTful\ResourceController
{
    protected $format = "json";
    protected $modelName = "App\Models\StockModel";

    

    public function index() 
	{
		header("Access-Control-Allow-Origin: *");
		$data = $this->model->where("status", 0)->orderBy("created")->findAll();
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
        
        public function update($stockId = null)
	{
		if($this->request->withMethod("PUT"))
		{
			$data = $this->request->getRawInput();
		}
		else
		{
			$data = $this->request->getPost();
		}
		
		$success = $this->model->update($stockId, $data);
		
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
        
        public function show($stockId= null)
	{
		$data = $this->model->find($stockId);
		return $this->respond($data);
	}
        
        public function byStore($store = null)
	{
		$data = $this->model->where("store", $store)->findAll();
		return $this->respond($data);
	}
        
        
}

