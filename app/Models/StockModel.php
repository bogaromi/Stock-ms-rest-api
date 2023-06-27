<?php

/* 

 * Author: @Zoltan Bogaromi
 */

namespace App\Models;

class StockModel extends \CodeIgniter\Model
{
    protected $table = "stock";
    protected $allowedFields = ["item_name",
                                "quantity",
                                "unit",      
                                "price",      
                                "store",
                                "status",
                                "created"];
    
    protected $validationRules = [
		
		"item_name" => "required|min_length[2]",
                "quantity" => "required|numeric|greater_than[0]",
                "unit" => "required",
		"store" => "required"
	];

}

