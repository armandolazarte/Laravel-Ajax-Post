<?php namespace App\Http\Controllers;

use DB;
use App\Http\Requests\SignupBookingRequest; // In Laravel 5 validations are adding on this page so dont forget to add this.
class HomeController extends Controller {

public function signupBookAppointment(SignupBookingRequest $request)
	{ 
          $v = Validator::make($request->all());

          if ($v->fails())
          {
             return redirect()->back()->withErrors($v->errors());
          }
  }        

}

