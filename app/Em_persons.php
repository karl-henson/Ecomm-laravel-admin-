<?php

namespace Ecomm;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Em_persons extends Model
{
    //
    protected $table = 'em_persons';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function addPerson(Request $request){
    	$person = new Em_persons;
    	$person->firstname	= $request->firstname;
    	$person->lastname	= $request->lastname;
    	$person->company 	= $request->company;
    	$person->emgroup 	= $request->emgroup;
    	$person->offcphone	= $request->offcphone;
    	$person->cellphone 	= $request->cellphone;
    	$person->email 		= $request->email;
    	$person->location 	= $request->location;
    	$person->save();
    }


    public static function updatePerson(Request $request){
    	$person = Em_persons::where('id',$request->id)->first();
    	$person->firstname	= $request->firstname;
    	$person->lastname	= $request->lastname;
    	$person->company 	= $request->company;
    	$person->emgroup 	= $request->emgroup;
    	$person->offcphone	= $request->offcphone;
    	$person->cellphone 	= $request->cellphone;
    	$person->email 		= $request->email;
    	$person->location 	= $request->location;
    	$person->save();
    }

}
