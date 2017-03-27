<?php

namespace Ecomm;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'em_users';
    protected $primaryKey = 'userid';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function addUser(Request $request){
    	$user = new User;
    	$user->user 			= $request->user;
    	$user->password 		= Hash::make($request->password);
    	$user->security_level 	= $request->security_level;
    	$user->save();
    }


    public static function removeUser(Request $request){
    	User::where('userid',$request->user_id)->delete();
    }

    public static function updateUser(Request $request){
    	$user = User::where('userid', $request->user_id)->first();
    	$user->user 			= $request->user;
    	$user->password 		= Hash::make($request->password);
    	$user->security_level 	= $request->security_level;
    	$user->save();
    }

}
