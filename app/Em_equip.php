<?php

namespace Ecomm;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Em_equip extends Model
{
    //
    protected $table = 'em_equip';
    protected $primaryKey = 'id_equip';
    public $timestamps = false;

    public static function addEquip(Request $request){
    	$equip = new Em_equip;
    	$equip->partnum		= $request->partnum;
    	$equip->partdesc	= $request->partdesc;
    	$equip->partmfr 	= $request->partmfr;
    	$equip->save();
    }


    public static function updateEquip(Request $request){
    	$equip = Em_equip::where('id_equip',$request->id_equip)->first();
    	$equip->partnum		= $request->partnum;
    	$equip->partdesc	= $request->partdesc;
    	$equip->partmfr 	= $request->partmfr;
    	$equip->save();
    }
}
