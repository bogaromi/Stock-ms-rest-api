<?php

/* 

 * Author: @Zoltan Bogaromi
 */


namespace App\Models;

class UserModel extends \CodeIgniter\Model
{
    protected $table = "users";
    protected $allowedFields = ["username",
                                "password",           
                                "status"
                               ];
    
    protected $validationRules = [
		
		"username" => "required|min_length[2]",
		"password" => "required|min_length[4]",
                "status" => "required"
	];
}

