<?php namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Sales;
use App\Distributors;
use App\Customers;
use Request;
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
        
        public function add_sales() {
            $id = Request::input('sf-product-name');
            $product = Product::find($id);
            $amount = Request::input('sf-amount');            
            Sales::create([
                'name' => $product->name,
                'amount' => $amount
            ]);
            $product->stocks = $product->stocks - $amount;
            $product->save();            
            return redirect('home');
        }
        
        public function del_products() {
            $id = Request::input('id');
            $products = Product::find($id);
            $products->delete();            
        }
        
        public function edit_products() {
            $id = Request::input('id');
            $product = Product::find($id);
            $product->name = Request::input('name');
            $product->description = Request::input('description');
            $product->distributor = Request::input('distributor');
            $product->stocks = Request::input('stocks');
            $product->price = Request::input('price');
            $product->save();
        }
        
        public function add_products(){
           $name = Request::input('product_name');
           $description = Request::input('product_description');
           $price = Request::input('product_price');
           $stocks = Request::input('product_stocks');
           $distributor = Request::input('product_distributor');
           Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stocks' => $stocks,
            'distributor' => $distributor
                
                   
           ]);
           return redirect('home');
        }
            public function add_distributor(){
            $name = Request::input('name');
            $address = Request::input('address');
            $phone = Request::input('phone');
           
            Distributors::create([
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
          
                   
           ]);
           return redirect('home');
        }
          public function add_customer(){
            $name = Request::input('name');
            $address = Request::input('address');
            $phone = Request::input('phone');
            if( $phone === "" )
            {
                $phone = "None";
            }
            Customers::create([
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
          
                   
           ]);
           
           return redirect('home');
        }
        
        public function search_user() {
            $data = [];
            $search_name = Request::input('search_name');                 
            $data['users'] = User::search($search_name)->get();
            $data['products'] = Product::all();                        
            $data['sales'] = Sales::all();       
            $data['distributors'] = Distributors::all();
            $data['customers'] = Customers::all();
            return view('home', compact('data'));
        }
        public function search_product() {
            $data = [];
            $search_name = Request::input('search_name');                 
            $data['users'] = User::all();
            $data['products'] = Product::search($search_name)->get();                       
            $data['sales'] = Sales::all();       
            $data['distributors'] = Distributors::all();
            $data['customers'] = Customers::all();
            return view('home', compact('data'));
        }
            public function search_distributor() {
            $data = [];
            $search_name = Request::input('search_name');                 
            $data['users'] = User::all();
            $data['products'] = Product::all();                     
            $data['sales'] = Sales::all();       
            $data['distributors'] = Distributors::search($search_name)->get();  
            $data['customers'] = Customers::all();
            return view('home', compact('data'));
        }
           public function search_customer() {
            $data = [];
            $search_name = Request::input('search_name');                 
            $data['users'] = User::all();
            $data['products'] = Product::all();                     
            $data['sales'] = Sales::all();       
            $data['distributors'] = Distributors::all();
            $data['customers'] = Customers::search($search_name)->get();  
            return view('home', compact('data'));
        }
         public function del_users() {
            $id = Request::input('id');
            $user = User::find($id);
            $user->delete();            
        }
        public function edit_users() {
            $id = Request::input('id');
            $user = User::find($id);
            $user->name = Request::input('name');
            $user->email = Request::input('email');
            $user->save();
        }
        public function del_distributors() {
            $id = Request::input('id');
            $distributors = User::find($id);
            $distributors->delete();            
        }
        public function edit_distributors() {
            $id = Request::input('id');
            $distributor = Distributors::find($id);
            $distributor->name = Request::input('name');
            $distributor->address = Request::input('address');
            $distributor->phone = Request::input('phone');
            $user->save();
        }

}
