<?php

namespace Ecomm;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Em_sites extends Model
{
    //
    protected $table = 'em_sites';
    protected $primaryKey = 'sites_id';
    public $timestamps = false;


    public static function addSite(Request $request){
    	$person = new Em_Sites;
    	$person->siteclli	= $request->siteclli;
    	$person->sitename	= $request->sitename;
    	$person->address 	= $request->address;
    	$person->city 		= $request->city;
    	$person->state		= $request->state;
    	$person->zip 		= $request->zip;
    	$person->sitetype 	= $request->sitetype;
    	$person->opsmgr 	= $request->opsmgr;
    	$person->sitetech 	= $request->sitetech;
    	$person->save();
    }


    public static function updateSite(Request $request){
    	$person = Em_Sites::where('sites_id',$request->sites_id)->first();
    	$person->siteclli	= $request->siteclli;
    	$person->sitename	= $request->sitename;
    	$person->address 	= $request->address;
    	$person->city 		= $request->city;
    	$person->state		= $request->state;
    	$person->zip 		= $request->zip;
    	$person->sitetype 	= $request->sitetype;
    	$person->opsmgr 	= $request->opsmgr;
    	$person->sitetech 	= $request->sitetech;
    	$person->save();
    }


}
