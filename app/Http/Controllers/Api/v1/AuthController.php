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

    // public function index(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:255',
    //         'email' => 'required|unique:user|max:255',
    //         'password' => 'required|max:6',

    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json('error','Somethig went error')
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password =Hash::make($request->password);
    //     if($user->save()){
    //         return response()->json('Registration success');
    //     }else{
    //         return response()->json('Registration is not completed');
    //     }

    // }

    // public index1(Request $request){
    // return response()->json('ss');

    // $validator = Validator::make($request->all(), [
    //     'name' => 'required|max:255',
    //     'email' => 'required|unique:users|max:255',
    //     'password' => 'required|max:6',

    // ]);

    // if ($validator->fails()) {
    //     return response()->json(['error'=>'Somethig went error']);
    //         // ->withErrors($validator)
    //         // ->withInput();
    // }
    // $user = new User();
    // $user->name = $request->name;
    // $user->email = $request->email;
    // $user->password = Hash::make($request->password);
    // $user->save();
    // return response()->json('Registration success');
    // }


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
                        $token = auth()->user()->createToken('Laravel-9-Passport-Auth')->accessToken;
                        return response()->json(['token' => $token,'user'=>$data], 200);
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

        // public function login(Request $request)
        // {
        //     if (!Auth::attempt($request->only('email', 'password')))
        //     {
        //         return response()
        //             ->json(['message' => 'Unauthorized'], 401);
        //     }

        //     $user = User::where('email', $request['email'])->firstOrFail();

        //     $token = $user->createToken('auth_token')->plainTextToken;

        //     return response()
        //         ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
        // }

    }


    
}
