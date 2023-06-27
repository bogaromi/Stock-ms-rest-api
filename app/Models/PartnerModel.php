<?php

/* 

 * Author: @Zoltan Bogaromi
 */


namespace App\Models;

class PartnerModel extends \CodeIgniter\Model
{
    protected $table = "partners";
    protected $allowedFields = ["name",
                                "contact",           
                                "status"
                               ];
    
    protected $validationRules = [
		
		"name" => "required|min_length[2]",
		"contact" => "required|min_length[5]",
                "status" => "required"
	];
}

