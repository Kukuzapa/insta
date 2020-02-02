<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table      = 'users';
	protected $primaryKey = 'user_id';
	protected $returnType = 'object';
	protected $allowedFields = ['user_login','user_password'];
}