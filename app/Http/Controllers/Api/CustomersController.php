<?php 

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Customer;

/**
 * Customers Controller
 */
class CustomersController extends ApiController {
	
	/**
	 * Retrieves a list of customers registered.
	 * @return Illuminate\Http\Response
	 */
	public function index()
	{
		$customers = Customer::all();
		$payload = [
			'status' => 'ok',
			'customers' => $customers
		];
		return response()->json($payload, 200);
	}
	
	public function store(Request $request)
	{
		$customer = new Customer();
		$customer->first_name = $request->input('first_name');
		$customer->last_name = $request->input('last_name');
		$customer->email = $request->input('email');
		$customer->password = bcrypt($request->input('password'));
		$result = $customer->save();
		
		$payload = [
			'status' => 'ok',
			'result' => $result,
			'customer' => $customer
		];
		
		return response()->json($payload, 200);
	}
	
	public function show($id)
	{
		$customer = Customer::find($id);
		
		if( !$customer ) {
			return response()->json([
				'status' => 'error',
				'message' => 'Record Not Found'
			], 404);
		}
		
		return response()->json([
			'status' => 'ok',
			'customer' => $customer
		], 200);
	}
	
}