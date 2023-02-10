<?php

namespace App\Http\Controllers\Auth;

use App\Events\Alert;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Category;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

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
    protected function validator(array $data)
    {
     

        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:5', 'confirmed'],
            'password' => ['required', 'string', 'min:5', 'confirmed','regex:/^[a-zA-Z0-9 ]+$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
   
      
        $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ012345678";
        $random = Str::random(5);
        $ref_link = trim(substr($data['first_name'], 0, 5) . '-' . $random);
       
            $user =  User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'referred_by' => $data['referred_by'],
                'referral_id' => $ref_link,
                'password' => Hash::make($data['password']),
            ]);
       
        $subscribe = Subscribe::where('email',$data['email'])->first();
        $subscribe->status = 1;
        $subscribe->save();
        if($data['referred_by'] !== null) {
            $new_user = User::where('referral_id',$data['referred_by'])->first();
            $new_user->referral_count += 1;
            $new_user->save();
        }
        return $user;
        return 'successfully verified';
        return $user;
    }
    
}
