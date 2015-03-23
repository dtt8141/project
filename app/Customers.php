<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Customers extends Model {
    use SearchableTrait;
	protected $fillable = ['name', 'address', 'phone'];
             protected $searchable = [
                'columns' => [
                'name' => 10,
                'address' => 10,
                'phone' => 10,
              
            ]
        ];

}
