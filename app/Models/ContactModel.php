<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
	protected $table      = 'contacts';
	protected $primaryKey = 'contact_id';
	protected $returnType = 'object';
	protected $allowedFields = ['contact_name'];
}