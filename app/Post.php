<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $table='posts';


	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function categories()
	{
		return $this->belongsToMany('App\Category','post_category');
	}

}
