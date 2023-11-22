<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\User;
use GeoIp2\Record\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
class UserController extends Controller
{
	use ApiTrait;
	public function login(Request $request)
	{
		
		
			if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password]))
		{
			$user = Auth::user();
			$success['token'] =  $user->createToken($user->name)->plainTextToken;
			$success['name'] =  $user->name;
			return $this->ApiResponse(200,'User login successfully.', '',$success);
			
		} else {
			return $this->ApiResponse(401,'Unauthorised.',['error'=>'Unauthorised'],'');
		}
	}
	
	
	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed',
			'phone'=>'required|unique:users',
		]);
		
		if ($validator->fails()) {
			return $this->ApiResponse(403,'Validation Error.', $validator->errors());
			
		}
		
		$input = $request->all();
		$input['password'] = Hash::make($input['password']);
		$user = User::create($input);
		$success['token'] =  $user->createToken($user->name)->plainTextToken;
		$success['name'] =  $user->name;
		return $this->ApiResponse(200,'registered successfully', null ,$success);
	}
	
	

	
}
