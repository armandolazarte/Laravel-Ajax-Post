<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignupBookingRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true; // If you are not checking the authorization please set it in to TRUE.
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'txt_spaFullName'  => 'required|alpha_num', 
                        'txt_spaEmail'     => 'required|email', 
                        'txt_spaPassword'  => 'required|min:5|alpha_num', 
                        'txt_spaContactno' => 'required|alpha_num'
		];
	}

}
