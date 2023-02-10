<?php

namespace App\Http\Controllers;

use App\Http\Traits\TransactionTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;
use App\Models\Subscribe;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    use TransactionTrait;
  	public function overview() {
    	$user = Auth::user();
    	 $data['allusers'] = $f= User::orderBy('referral_count','desc')->paginate(10);
    // 	 dd($f);
      	$data['users'] = User::where('referred_by',$user->referral_id)->latest()->get();
      	return view('frontend.overview', $data);
    }
  	public function refer_friend() {
    	$user = Auth::user();
      	$data['users'] = User::where('referred_by',$user->referral_id)->latest()->get();
      	return view('frontend.refer_friend', $data);
    }
    public function sendmail() {
        $name = 'Fasanya Oluwapelumi';
        $ref = "84948f";
        $data = array('name'=>"pelumi",'ref'=>'jfjfke');
   
      Mail::send('mail.verify', $data, function($message) {
         $message->to('fasanyafemi@gmail.com', '')->subject
            ('ConnectinSkillz Verification Email');
         $message->from('support@connectinskillz.com','ConnectinSkillz');
      });
      dd('mail sent');
        // dd($location);
           Mail::to('fasanyafemi@gmail.com')->send(new ContactUsMail(
                $name,$ref
            ));
            // $data = array('name'=>"Virat Gandhi");
            // Mail::send(['text'=>'mail.contact'], $data, function($message) {
            //     $message->to('fasanyafemi@gmail.com', 'Tutorials Point')->subject
            //        ('Laravel Basic Testing Mail');
            //     $message->from('fasanyafemi@gmail.com','Virat Gandhi');
            //  });
           return 'sent';
    }
    public function logout() {
        // dd('here');
        Auth::logout();
        return redirect('/login');
    }
    public function dashboard() {
        $data['user'] = Auth::user();
        $data['allusers'] = User::orderBy('referral_count','desc')->get();
        $data['user_referred'] = User::where('referred_by',Auth::user()->referral_id)->get();
        return view('frontend.dashboard',$data);
    }
    public function landing()
    {
    //    dd('here');
    return redirect('https://connectinskillz.org');
    }
    public function waitlist() {
        return view('frontend.index');
    }
    public function refer_home($slug) {
        $data['user'] = $dd = User::where('referral_id',$slug)->first();
        if($dd == null) {
            return view('frontend.landing');
        } else {
            return view('frontend.landing2',$data);
        }

    }
    public function setpassword() {
        return view('frontend.setpassword');
    }
    public function verify($slug) {
        $data['user'] = $k =  Subscribe::where('confirm_id',$slug)->get();
        
        
        if($data['user']->isEmpty()) {
            return redirect()->back();
        } 
        else if(Auth::user()) {
            return redirect()->back()->with('messsage','Not permitted');
        }
        else {
            
            $data['user'] = $dd = Subscribe::where('confirm_id',$slug)->first();
            if($dd->status == 1) {
                
                return redirect()->route('login');
            } else {

                return view('frontend.setpassword',$data);
            }

        }
    }
  public function subscribe_api(Request $request) {
     if($request->bearerToken() == "77B2e5c39ac8640f13cd888f161385b12f7e5e92") {
     
         $validator =   Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:subscribes','regex:/(.+)@(.+)\.(.+)/i'],
          
        ]);
        if($validator->fails())
        {
          return response('Invalid/Bad input fields',400);
        } else {
          
        $data = $request->all();
    	$data['confirm_id'] = $ref = Str::random(7);
        $name = $request->first_name;
        $email = $request->email;
        //here is where the mail comes in
        $data = array('name'=>$name,'ref'=>$ref,'email'=>$email);
        if($request->has('referred_by')) {
         
            Subscribe::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $email,
                'confirm_id' => $ref,
                'referred_by' => $request->referred_by
            ]);
        } else {
            Subscribe::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $email,
                'confirm_id' => $ref
            ]);
        }
       
        Mail::send('mail.verify', $data, function($message) use($email) {
           $message->to($email, '')->subject
              ('ConnectinSkillz Verification Email');
           $message->from('support@connectinskillz.com','Connectinskillz');
        });
        return response('User Subscribed Successfully',200);
       
        }
       
          
      
    }
    else {
        return response("Invalid token:unauthenticated", 401);
    }
  }
    public function subscribe(Request $request) 
    {
         $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:subscribes','regex:/(.+)@(.+)\.(.+)/i'],
          
        ]);
        
        $data = $request->all();
    	$data['confirm_id'] = $ref = Str::random(7);
        $name = $request->first_name;
        $email = $request->email;
        //here is where the mail comes in
        $data = array('name'=>$name,'ref'=>$ref,'email'=>$email);
        if($request->has('referred_by')) {
         
            Subscribe::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $email,
                'confirm_id' => $ref,
                'referred_by' => $request->referred_by
            ]);
        } else {
            Subscribe::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $email,
                'confirm_id' => $ref
            ]);
        }
       
        Mail::send('mail.verify', $data, function($message) use($email) {
           $message->to($email, '')->subject
              ('ConnectinSkillz Verification Email');
           $message->from('support@connectinskillz.com','Connectinskillz');
        });
        return 'created successfully';
    }
    public function set_user_password(Request $request) {
         $validator =  Validator::make($request->all(), [
           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:5', 'confirmed'],
            'password' => ['required', 'string', 'min:5', 'confirmed','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/'],
        ]);
        if($validator->fails()) {
            return response("Invalid Set Password",400);
        }
        else {
            $user_data =  Subscribe::where('email',$request->email)->first();
            if($user_data == null ) {
                return response("Incorrect email address: Email address not found",400);
            }
            else {
                $data['first_name'] =$user_data->first_name;
                $data['last_name'] = $user_data->last_name;
                $data['referred_by'] = $user_data->referred_by;
                
            }
             $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ012345678";
        $random = Str::random(5);
        $ref_link = trim(substr($data['first_name'], 0, 5) . '-' . $random);
       
            $user =  User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $request->email,
                'referred_by' => $data['referred_by'],
                'referral_id' => $ref_link,
              	'api_token' => Str::random(42),
                'password' => Hash::make($request->password),
            ]);
       
        $subscribe = Subscribe::where('email',$request->email)->first();
        $subscribe->status = 1;
        $subscribe->save();
        if($data['referred_by'] !== null) {
            $user = User::where('referral_id',$data['referred_by'])->first();
            $user->referral_count += 1;
            $user->save();
        }
        return response(["Password set successfully",$user],200);
        }
    }
    function faq() {
        return view('frontend.faq');
    }
    
}
