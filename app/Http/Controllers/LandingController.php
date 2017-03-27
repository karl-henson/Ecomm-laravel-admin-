<?php

namespace Ecomm\Http\Controllers;

use Auth;

use Ecomm\User;
use Ecomm\Em_projects;
use Ecomm\Em_sites;
use Ecomm\Em_project_sites;
use Ecomm\Em_persons;
use Ecomm\Em_inv_new;
use Ecomm\Em_inv;
use Ecomm\Em_city;
use Ecomm\Em_equip;

use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function landing(){
		$get = Em_projects::all();
		return view('projects')->with('projects',$get);
   }


    public function users(){
		$get = User::all();
		return view('users')->with('users',$get);
   }


    public function persons(){
		$get = Em_persons::all();
		return view('persons')->with('persons',$get);
   }


    public function sites(){
		$get = Em_sites::all();
		return view('sites')->with('sites',$get);
   }


    public function equip(){
		$get = Em_equip::all();
		return view('equips')->with('equips',$get);
   }


    public function emails(){
		$get = User::all();
		return view('notifications')->with('users',$get);
   }

}
