<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Otp;
use App\Usertheme;
use App\E_Commerce_Owner;
use App\E_commerce_theme;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyYourAccount;
use Session;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'business_name' => ['required', 'string'],
            'first_name' => ['required', 'string', 'max:255'],
            'number' => ['required|unique:users,number'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],  
            'password' => ['required', 'string', 'min:8'],
            'country' => ['required',],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $start = new Carbon();
        $date = $start->addDays(14);

        if($data['user_type']=='template') {
 
        $user =  User::create([
            'business_name' => $data['business_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'number' => '+'.$data['phone_number_phoneCode'].''.$data['phone_number'],
            'email' => $data['email'],
            'country' => $data['country'],
            'user_type' => $data['user_type'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
            'expiry_date' => $date,
        ]);

        \App\Usertheme::create([                    
        'user_id' => $user_id,
        'template_id' => $data['template_id'],
        'user_template' => $data['template_name'],
        ]);   

        $b_name = $data['business_name'];
        E_Commerce_Owner::create([
            'owner_id' => $user_id,
            'busniess_name' => $b_name,
            'email' => $data['email'],
        ]);
        E_commerce_theme::create([
            'owner_id' => $user_id,
            'template_name' => $data['template_name'],
            'template_id' => $data['template_id'],
        ]);

        }
        else
        {
            $user =  User::create([
                'business_name' => $data['business_name'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'number' => '+'.$data['phone_number_phoneCode'].''.$data['phone_number'],
                'email' => $data['email'],
                'country' => $data['country'],
                'user_type' => $data['user_type'],
                'role_id' => $data['role_id'],
                'password' => Hash::make($data['password']),
                'expiry_date' => $date,
            ]);

            $user_id =  DB::getPdo()->lastInsertId();    

            $otp = \App\Otp::whereUserId($user_id)->first();
            if(!is_null($otp)):
              $otp->expire_at = Carbon::now()->addMinutes(2);
              $otp->code = mt_rand(100000,999999);
              if($otp->save()):
                Mail::to($user->email)->send(new VerifyYourAccount($otp));
              endif;
            else:
              $otp = new Otp;
              $otp->user_id = $user->id;
              $otp->expire_at = Carbon::now()->addMinutes(2);
              $otp->code = mt_rand(100000,999999);
              if($otp->save()):
                Mail::to($user->email)->send(new VerifyYourAccount($otp));
              endif;
            endif;

            // $request->session()->flush();
            // $request->session()->put('custom_user_id', $user_id);
            // Auth::logout();
            
        }

        return $user;
        
    }


  
}
