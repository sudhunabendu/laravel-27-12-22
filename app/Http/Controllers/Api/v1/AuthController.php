<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Libraries\emailTemplate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function index(Request $request)
    {

        $requestData = $request->all();
        if (empty($requestData)) {
            return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 202);
        }

        $rules = [
            'name' => 'required',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|min:6',
        ];

        $messages = [
            'name.required' => 'Your name is required.',
            'email.required' => 'Your email address is required.',
            'email.email' => 'Your email address is not a valid email.',
            'password.required' => 'Password is required.',
            'password.min' => 'The password must be at least 6 character',
        ];

        $validator = Validator::make($requestData, $rules, $messages);

        if ($validator->fails()) {
            $validator = $validator->errors();
            $name = $validator->first('name');
            $email = $validator->first('email');
            $password = $validator->first('password');

            if (!empty($name)) {
                $error = $name;
            } else if (!empty($email)) {
                $error = $email;
            } else if (!empty($password)) {
                $error = $password;
            }

            return response()->json(['res_code' => 201, 'response' => $error], 200);
        } else {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = 1;
            $user->save();
            emailTemplate::template($user);
            return response()->json(['res_code' => 200, 'response' => 'Registration is complete.'], 200);
        }
    }


    public function login(Request $request)
    {
        $requestData = $request->all();
        if (empty($requestData)) {
            return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
        }

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];

        $messages = [
            'email.required' => 'Your email address is required.',
            'email.email' => 'Your email address is not a valid email.',
            'password.required' => 'Password is required.',
            'password.min' => 'The password must be at least 6 character',
        ];
        $validator = Validator::make($requestData, $rules, $messages);

        if ($validator->fails()) {

            $validator = $validator->errors();
            $email = $validator->first('email');
            $password = $validator->first('password');
            if (!empty($email)) {
                $error = $email;
            } else if (!empty($password)) {
                $error = $password;
            }

            return response()->json(['res_code' => 201, 'response' => $error], 200);
        } else {
            try {
                $data = array(
                    'email' => trim($requestData['email']),
                    'password' => trim($requestData['password']),
                );

                    // $data = Auth::user();

                    if (auth()->attempt($data)) {
                        $token = auth()->user()->createToken('MyApp')->accessToken;
                        return response()->json(['token' => $token,'user'=>$data,'success'=>'User login successfully.'], 200);
                    } else {
                        return response()->json(['error' => 'Unauthorised'], 401);
                    }

                    // $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                    // $success['name'] =  $user->name;
                    // return $this->sendResponse($success, 'User login successfully.');


                    // return response()->json('ss');
                    // return response()->json($userdata);
                    // $user = User::where('email', $userdata['email'])->firstOrFail();

                    // $token = $user->createToken('auth_token')->plainTextToken;

                    // return response()->json(['user'=>$user,'token'=>$token]);


            } catch (\Exception $ex) {
                /*CREATE ERROR LOGS*/
                $errorLogData = array(
                    'user_id' => 0,
                    'section' => 'Login',
                    'error_message' => $ex->getMessage(),
                    'category_id' => 0,
                    'request' => json_encode($requestData),
                    'response' => '',
                );
                // dbHelpers::createErrorLogs($errorLogData);
                return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
            }
        }

    }

}
