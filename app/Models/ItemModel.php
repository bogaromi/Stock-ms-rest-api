<?php

/* 

 * Author: @Zoltan Bogaromi
 */


namespace App\Models;

class ItemModel extends \CodeIgniter\Model
{
    protected $table = "items";
    protected $allowedFields = ["name",
                                "description",      
                                "partner_id",      
                                "price",      
                                "status"
                               ];
    
    protected $validationRules = [
		
		"name" => "required|min_length[2]",
		"partner_id" => "required",
                "price" => "required|numeric|greater_than[0]",
                "status" => "required"
	];
}

