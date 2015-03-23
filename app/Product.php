<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model {

	protected $fillable = ['name', 'description', 'price', 'stocks', 'distributor'];
        
           protected $searchable = [
            'columns' => [
                'name' => 10,
                'description' => 10,
                'price' => 10,
                'stocks' => 10,
                'distributor' => 10
            ]
        ];
}
