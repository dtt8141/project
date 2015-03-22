<?php namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Sales;
use App\Distributors;
use App\Customers;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            $data = [];
            $data['users'] = User::all();
            $data['products'] = Product::all();                        
            $data['sales'] = Sales::all();       
            $data['distributors'] = Distributors::all();
            $data['customers'] = Customers::all();
            return view('home', compact('data'));           
            
	}       

}
