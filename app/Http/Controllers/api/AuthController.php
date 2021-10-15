<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:sanctum', ['except' => ['login', 'register_employer','register_candidate','dummy_register','register']]);
    }
    // public function register_employer(Request $request){
    //     $validator=Validator::make($request->all(),[
    //         'name'=>'required|string|between:2,100',
    //         'email'=>'required|email|string|max:100|unique:users',
    //         'phone'=> 'required|string|min:10|max:11|unique:users',
    //         'password' => 'required|string|confirmed|min:6'
    //     ]);
    //     if($validator->fails()){
    //         return response()->json(['status'=>false,'errors'=>$validator->errors()]);
    //     }
    //     $user=User::create([
    //         "name"=>$request->name,
    //         "email"=>$request->email,
    //         "phone"=>$request->phone,
    //         "password"=>Hash::make($request->password),
    //         'is_active'=>0,
    //         'verified'=>0
    //     ]);
    //     event(new Registered($user));
    //     event(new UserRegistered($user));
    //     //$this->guard()->login($user);
    //     UserVerification::generate($user);
    //     //UserVerification::send($user, 'User Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
    //     return response()->json(["status"=>true,"message"=>"Employer registration successfull"],201);
    // }
    // public function register_candidate(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'first_name' => 'required|string|between:2,100',
    //         'middle_name' => 'required|string|between:2,100',
    //         'last_name' => 'required|string|between:2,100',
    //         'email' => 'sometimes|nullable|string|email|max:100|unique:users',
    //         'phone'=> 'required|string|min:10|max:11|unique:users',
    //         'password' => 'required|string|confirmed|min:6',
    //     ]);
    //     if($validator->fails()){
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }
    //     $user=User::create([
    //         "first_name"=>$request->first_name,
    //         "middle_name"=>$request->middle_name,
    //         "last_name"=>$request->last_name,
    //         'name'=>$request->first_name.' '.$request->middle_name.' '.$request->last_name,
    //         "email"=>$request->email,
    //         "password"=>Hash::make($request->password),
    //         'is_active'=>0,
    //         'verified'=>0
    //     ]);
    //     event(new Registered($user));
    //     event(new UserRegistered($user));
    //     //$this->guard()->login($user);
    //     UserVerification::generate($user);
    //     //UserVerification::send($user, 'User Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
    //     return response()->json(["status"=>true,"message"=>"Candidate registration successfull"],201);
    // }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete(); //deleting all the tokens
        return response()->json(['success'=>true,'message' => 'User successfully signed out'],201);
    }

    public function userProfile() {
        return response()->json(['success'=>true,'data'=>auth()->user()]);
    }

    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['success'=>false,'errors'=>$validator->errors()], 422);
        }
        $user = User::where('email',$request->email)->first();
        $user->last_login_ip = request()->ip();
        $user->save();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $token=$user->createToken('api_token')->plainTextToken;
            return response()->json(['success'=>true,'token'=>$token,'roles'=>Auth::user()->getRoleNames(),'message'=>'User Signed in!',"user"=>Auth::user()],200);
        }
        return response()->json(['success'=>false,'message' => 'Wrong credentials'], 401);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            "phone" => 'sometimes|nullable|string|max:11|min:11|unique:users,phone',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        try{
            $user = User::create(array_merge($validator->validated(),['password' => bcrypt($request->password)]));
            return response()->json([
                'success' => true,
                'message' => 'User successfully registered',
            ], 201);
        }
        catch (Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'User registration failed!',
            ], 500);
        }
    }
}
