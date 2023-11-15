<?php
	
	namespace App\Http\Traits;
	
	
	trait  ApiTrait
	{
		public function ApiResponse($code = 200, $message = null, $errors = null, $data = null)
		{
			$array =[
				'message' =>$message,
				'status' => $code,
			];
			if(is_null($data)&& !is_null($errors)) {
				$array ['errors'] = $errors;
			}elseif (!is_null($data)&& is_null($errors)){
				$array ['data'] = $data;
			}else{
				$array ['data'] = $data;
				$array ['errors'] = $errors;
			}
			return response()->json($array,$code);
		}
		
	}