<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Code;
use Auth;

class CodeController extends Controller {



	/**
	* Saves User's Code in codes table
	* The executes the code and returns the output
	*/
	public function saveAndExec(Request $req) {

		// save
		
		$row = null;
		$row = Code::where('user_id', '=', Auth::user()->id)->first();
		
		if ( ! $row) {
			// user's doesn't code already exist
			// so create entity
			$row = new Code;
			$row->user_id = Auth::user()->id;
		}

		$row->code = $req->code;
		$code = $req->code;

		$row->save();
		$code = str_replace("<?php", "", $code);
		$code = str_replace("?>", "", $code);

		eval($code);

		// execute
		// TODO write logic to execute the code
		// exec($row->code);

		$user = Auth::user();
		// dd($user);
		//return view('/home', ['user' => $user]);
	}

	public function exec($code)
	{
		// write to file and execute
		return view('/home');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
