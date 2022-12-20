<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Subscribe;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/getuser', function (Request $request) {
    if($request->bearerToken() == "77B2e5c39ac8640f13cd888f161385b12f7e5e92") {
        $user = User::where('email',$request->email)->get(['id','first_name','last_name','referral_id','referred_by','email','phone','referral_count','created_at','updated_at']);
         return response($user,202);
    }
    else {
        return response("Invalid token:unauthenticated", 401);
    }
   
});

Route::get('/alluser', function (Request $request) {
    if($request->bearerToken() == "77B2e5c39ac8640f13cd888f161385b12f7e5e92") {
        $user = User::get(['id','first_name','last_name','referral_id','referred_by','email','phone','referral_count','created_at','updated_at']);
         return response($user,202);
    }
    else {
        return response("Invalid token:unauthenticated", 401);
    }
   
});
Route::post('/subscribe', [App\Http\Controllers\UserController::class, 'subscribe_api']);
Route::post('/setpassword', [App\Http\Controllers\UserController::class, 'set_user_password']);

Route::get('get_referred_users',function(Request $request) {
     if($request->bearerToken() == "77B2e5c39ac8640f13cd888f161385b12f7e5e92") {
         $ref = User::where('email',$request->email)->first();
         if($ref == null) {
             return response("Email does not exist",400);
         }
          else {
              $ref_id = $ref->referral_id;
              $user = User::where('referred_by',$ref_id)->get(['id','first_name','last_name','referral_id','referred_by','email','phone','referral_count','created_at','updated_at']);
         return response($user,202);
          }
       
    }
    else {
        return response("Invalid token:unauthenticated", 401);
    }
});

Route::get('get_total_referred_user',function(Request $request) {
     if($request->bearerToken() == "77B2e5c39ac8640f13cd888f161385b12f7e5e92") {
         $ref = User::where('email',$request->email)->first();
         if($ref == null) {
             return response("Email does not exist",400);
         }
          else {
              $ref_id = $ref->referral_id;
              $user = User::where('referred_by',$ref_id)->get(['id','first_name','last_name','referral_id','referred_by','email','phone','referral_count','created_at','updated_at']);
         return response(count($user),202);
          }
       
    }
    else {
        return response("Invalid token:unauthenticated", 401);
    }
});


Route::post('createalert/{title}', [App\Http\Controllers\AdminController::class, 'createalert_api'])->name('createalert_api');
Route::put('updatealert/{id}', [App\Http\Controllers\AdminController::class, 'updatealert'])->name('updatealert');

Route::any('paystack/webhook',[App\Http\Controllers\WebhooksController::class, 'handleWebhook'])->name('handlewebhook');
