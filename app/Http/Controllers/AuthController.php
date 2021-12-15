<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\VerifyRequest;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Str;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {

        $request->validated();

        // Authenticate user if user validation is true
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            flash('Invalid username/password')->error();
            return redirect()->back()->with(['error' => 'Invalid username/password']);

        }

        $user = $request->user();

        $user->last_login = Carbon::now();

        if ($user->save()) {

            return redirect()->intended();

        } else {

            flash('Some error occured, try again')->error();
            return redirect()->back()->with(['error' => 'Some error occurred, try again']);

        }

    }

    public function register(RegisterRequest $request)
    {

        $request->validated();

        $user = new User;
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->city = $request->address;
        $user->phone = $request->phone_number;
        $user->year_of_graduation = $request->graduation;
        $user->year_of_matriculation = $request->matriculation;
        $user->username = $request->username;
        $user->set_id = 1;
        $user->role_id = 1;
        $user->password = $request->password;
        $user->verified = get_setting('new_user_verification') ? 0 : 1;

        if ($user->save()) {

            flash('Welcome to the platform, please login to continue')->success();
            return redirect()->back()->with(['success' => 'Welcome to the platform, please login to continue']);

        } else {

            flash('Some error occured, try again')->error();
            return redirect()->back()->with(['error' => 'Some error occurred, try again']);

        }

    }

    public function forgot(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {

            flash('Email not found')->error();
            return redirect()->back()->with(['error' => 'Email not found']);

        }

        $token = Str::random(60);

        DB::table('password_resets')->where('email', $request->email)->delete();
        DB::table('password_resets')->insert(['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]);
        try {
            //$this->email->email_type('reset_password')->reset_account($token)->send($request->email);
        } catch (Exception $e) {

        }

        flash('An email has been sent with a link to reset the password')->success();
        return redirect()->back()->with(['success' => 'An email has been sent with a link to reset the password']);

    }

    public function reset(ResetRequest $request)
    {

        $request->validated();
        // Get token
        $tokenData = DB::table('password_resets')->where('token', $request->get('token'))->first();
        if ($tokenData) {

            $user = User::where('email', $tokenData->email)->first();

            if (!$user) {

                flash('Email not found')->error();
                return redirect()->back()->with(['error' => 'Email not found']);
            }

            $user->password = $request->password;

            if (is_null($user->email_verified_at)) {
                $user->email_verified_at = Carbon::now();
            }
            $user->save();

            DB::table('password_resets')->where('email', $user->email)->delete();

            flash('Password recover successfully')->success();
            return redirect()->back()->with(['success' => 'Password recover successfully']);

        } else {

            flash('The recovery token is incorrect or has already been used')->error();
            return redirect()->back()->with(['error' => 'The recovery token is incorrect or has already been used']);

        }

    }

    public function verify(Request $request)
    {

        $token = Str::random(60);

        $email_code = rand(100000, 999999);

        DB::table('email_verifiers')->where('email', $request->user()->email)->delete();
        DB::table('email_verifiers')->insert([
            'email' => $request->user()->email,
            'token' => $token,
            'sms_code' => $email_code,
            'email_code' => $email_code,
            'expires_at' => Carbon::now()->addMinutes(60),
        ]);

        flash('A mail has been sent to you')->success();

        $title = "Verify Account";
        return view('auth.verify', compact('title', 'token'));

    }

    public function verifyPost(VerifyRequest $request)
    {

        $request->validated();

        $tokenData = DB::table('email_verifiers')->where('token', $request->token)->first();
        if ($tokenData) {

            if (Carbon::now() > Carbon::create($tokenData->expires_at)) {

                flash('Verification code has expired')->error();
                return redirect()->back()->with(['error' => 'Verification code has expired']);

            }

            $user = User::where('email', $tokenData->email)->first();

            if (!$user) {

                flash('Email not found')->error();
                return redirect()->back()->with(['error' => 'Email not found']);

            }

            $code = EmailVerifier::where('token', $request->token)->first();

            if ($request->otp != $code->email_code) {

                flash('The entered email verification code is incorrect')->error();
                return redirect()->back()->with(['error' => 'The entered email verification code is incorrect']);

            }

            $user->email_verified_at = Carbon::now();
            $user->verified = 1;
            $user->save();

            DB::table('email_verifiers')->where('email', $user->email)->delete();

            try {

                //$this->email->email_type('welcome_user')->welcome_user($user->fullname)->send($user->email);

            } catch (Exception $e) {

            }

            Auth::loginUsingId($user->id);

            flash('Account verified successfully')->success();
            return redirect()->intended()->with(['success' => 'Account verified successfully']);

        } else {

            flash('The verification token is incorrect or has already been used')->error();
            return redirect()->back()->with(['error' => 'The verification token is incorrect or has already been used']);
        }

    }

    public function logout(Request $request)
    {
        //
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

}
