<?php 

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Customer;

/**
 * Customers Controller
 */
class CustomersController extends ApiController {
	
	public function index()
	{
		$customers = Customer::all();
		return [
			'status' => 200,
			'customers' => $customers
		];
	}
	
	public function store(Request $request)
	{
		$customer = new Customer();
		$customer->first_name = $request->input('first_name');
		$customer->last_name = $request->input('last_name');
		$customer->email = $requrest->input('email');
		$customer->password = bcrypt($request->input('password'));
		$result = $customer->save();
		
		return [
			'status' => 200,
			'result' => $result,
			'customer' => $customer
		];
	}
	
}