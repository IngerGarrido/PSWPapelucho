<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LasColoniasController extends Controller {

	public function index()
	{
		return view('papelucho-las-colonias');
	}
}