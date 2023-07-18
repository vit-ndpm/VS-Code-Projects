<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $validataor = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:6|max:30',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6|max:16|confirmed',
                'mobile' => 'required|string|digits:10',
            ]
        );
        if ($validataor->fails()) {
            return response()->json(["message" => $validataor->errors(), "status" => "failed"]);
        } else {

            try {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'mobile' => $request->mobile,
                ]);
                if ($user) {
                    $token = $user->createToken($request->email)->plainTextToken;
                    return response()->json([
                        "message" => "user Created Succsessfully",
                        "status" => "success",
                        "token" => $token,
                        "user-data" => $user
                    ]);
                } else {
                    return response()->json(["message" => "User Creation Failed", "status" => "failed"]);
                }
            } catch (Exception $e) {
                return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
            }
        }
    }
    public function userLogin(Request $request)
    {
        $validataor = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        if ($validataor->fails()) {
            return response()->json(["message" => $validataor->errors(), "status" => "failed"]);
        } else {
            try {
                $credentials = $request->only("email", "password");

                $user = User::where('email', $request->email)->first();
                if (auth()->attempt($credentials)) {
                    $token = $user->createToken($request->email)->plainTextToken;
                    return response()->json([
                        "message" => "Login Success",
                        "status" => "success",
                        "token" => $token
                    ]);
                } else {
                    return response()->json(["message" => "email ID Or Password incorrect", "status" => "failed"]);
                }
            } catch (\Exception $e) {
                return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
            }
        }
    }
    public function logout(Request $request)
    {
        $user = auth()->user();
        try {

            $request->user()->tokens()->delete();
            return response()->json(["message" => "Logged Out Successfully", "status" => "success"]);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
        }
    }

    public function changePassword(Request $request)
    {
        $validataor = Validator::make(
            $request->all(),
            [
                'password' => 'required|string|min:6|max:16|confirmed',
            ]
        );
        if ($validataor->fails()) {
            return response()->json(["message" => $validataor->errors(), "status" => "failed"]);
        } else {
            try {
                $user = Auth::user();
                $user->password = Hash::make($request->password);
                $user->save();
                $request->user()->tokens()->delete();
                return response()->json([
                    "message" => "password Changes successfully",
                    "status" => "success"
                ]);
            } catch (\Exception $e) {
                return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
            }
        }
    }

    public function forgetPassword(Request $request)
    {
        $validataor = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ]
        );
        if ($validataor->fails()) {
            return response()->json(["message" => $validataor->errors(), "status" => "failed"]);
        } else
         {
            try {

                $user = User::where('email', $request->email)->first();
                if ($user) {
                    $token = Str::random(30);
                    $domain = URL::to("/");
                    $url = $domain . '/resetPassword?token=' . $token;

                    $data['url'] = $url;
                    $data['email'] = $request->email;
                    $data['token'] = $token;
                    $data['title'] = "Password Reset Request Online Exam System Narmadapuram MP";
                    $data['body'] = "Please click on link below to reset your Password";

                    Mail::send('API/forgetPassword', ['data' => $data], function ($message) use ($data) {
                        $message->to($data['email'])->subject($data['title']);
                    });

                    $dateTime = Carbon::now()->format('Y-m-d H:i:s');
                    PasswordReset::updateOrCreate(
                        ['email' => $request['email']],
                        [
                            'email' => $request['email'],
                            'token' => $data['token'],
                            'created_at' => $dateTime

                        ]
                    );
                    return response()->json(["message" => "Password Reset Link Sent to Registred email ID", "status" => "success"]);
                } else {
                    return response()->json(["message" => "entered e-mail not found in Database", "status" => "failed"]);
                }
            } catch (\Exception $e) {
                return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
            }
        }
    }
    public function resetPasswordLoad(Request $request)
    {
        try {
            $resetData = PasswordReset::where('token', $request->token)->first();
            if (isset($request->token)) {
                $user = User::where('email', $resetData->email)->get();
                return view('API.resetPassword', compact('user'));
            } else {
                return response()->json(["message" => "entered token not found ", "status" => "failed"]);
            }
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
        }
    }
    public function resetPassword(Request $request)
    {
        $validataor = $request->validate(['password'=>'required|string|min:6|max:16|confirmed']);
        try {
            
            
            $user=User::where('id',$request->id)->first();
             $user->password=Hash::make($request->password);
             $user->save();
             $passwordResetToken=PasswordReset::where('email',$user->email)->first();
             $passwordResetToken->delete();
             return response()->json(["message" => "Password Changed Successfully,Kindly Login with new Password", "status" => "success"]);

            
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
        }
    }
}
