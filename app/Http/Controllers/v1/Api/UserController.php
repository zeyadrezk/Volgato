<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfile;
use App\Http\Traits\ApiTrait;
use App\Models\User;
use DateTime;
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
			
			return $this->ApiResponse(200,'login successfully.', '',$success);
			
		} else {
			return $this->ApiResponse(401,'Unauthorized.',['error'=>'Unauthorized'],'');
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
	
	public function editProfile(){
		$user = User::where('id',Auth::user()->id)->first();
		return $this->ApiResponse(200,'success',null,array('user'=>$user));
	}
	public function updateProfile(UpdateProfile $request){
		$user = User::where('id',Auth::user()->id)->first();
		$user->update([
			'name' => $request->name,
			'email' => $request->email,
			'phone'=>$request->phone,
			'DateOfBirth'=>DateTime::createFromFormat('d/m/Y', $request->dateOfBirth),
		]);
		return $this->ApiResponse(200,'success',null,array('user'=>$user));
		
	}
	

	
}
