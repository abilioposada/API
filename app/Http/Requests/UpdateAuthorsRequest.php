<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateAuthorsRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize () : Bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules () : Array
	{
		return [
			#
		];
	}

	/**
	 * Handle a failed validation attempt.
	 *
	 * @param \Illuminate\Contracts\Validation\Validator $validator
	 * @return void
	 *
	 * @throws \Illuminate\Http\Exceptions\HttpResponseException
	 */
	protected function failedValidation ( Validator $validator ) : void
	{
		# Returns a JSON format response code 422 Unprocessable Entity exception
		throw new HttpResponseException( response()->json( $validator->errors(), 422 ) );
	}
}
