<?php namespace App\Models;

use CodeIgniter\Model;

class FavouriteModel extends Model
{
	protected $table      = 'favourites';
	protected $primaryKey = 'favourite_id';
	protected $returnType = 'object';
	protected $allowedFields = ['contact_id','user_id'];
	
	public function favouritesList($user_id)
	{
		$builder = $this->builder();
		return $builder->join('contacts','contacts.contact_id=favourites.contact_id')->getWhere(['user_id'=>$user_id])->getResult();
	}
}