<?php

namespace Ecomm\Http\Controllers;

use Auth;

use Ecomm\User;
use Ecomm\Em_projects;
use Ecomm\Em_project_sites;
use Ecomm\Em_sites;
use Ecomm\Em_persons;
use Ecomm\Em_inv;
use Ecomm\Em_inv_new;
use Ecomm\Em_equip;
use Ecomm\Em_city;
use Illuminate\Http\Request;
use Crypt;

use \Response;


class FunctionsController extends Controller
{
    //
    public function HandleFunction(Request $request){

    	switch ($request->method) {
    		


            /*-------------------------------------------------------
            /*
            /*
            /*                      Project
            /*
            /*
            /*-----------------------------------------------------*/


            case 'addProject':
                Em_projects::addProject($request);
                return Response::json( array('success' => true));

            case 'removeProject':
                Em_projects::removeProject($request);
                return redirect()->route('landing');


            case 'editNote':
                Em_projects::editNote($request);
                return redirect()->route('landing');


            case 'getProjectbyID':
                $project = Em_projects::where('project_id',$request->project_id)->first();
                return Response::json($project);


            case 'updateProject':
                Em_projects::updateProject($request);
                return Response::json( array('success' => true));


            case 'getSitesAvaliable':
                $current_project_sites = Em_project_sites::where('project_id',$request->project_id)->get();
                $exclude_sites = array();
                foreach ($current_project_sites as $site) {
                    array_push($exclude_sites, (int)$site->sites_id);
                }
                $ret_sites = Em_sites::whereNotIn('sites_id', $exclude_sites)->get();
                return Response::json( array('data' => $ret_sites));


            case 'addSiteToProject':
                $new_project_site = new Em_project_sites;
                $new_project_site->sites_id     = $request->sites_id;
                $new_project_site->project_id   = $request->project_id;
                $new_project_site->save();
                return Response::json( array('success' => true));



            /*-------------------------------------------------------
            /*
            /*
            /*                      User
            /*
            /*
            /*-----------------------------------------------------*/


            case 'getUsers':
                return Response::json( array('data' => User::all()));


            case 'getUserbyID':
                $user = User::where('userid',$request->user_id)->first();
            //    $user->password = Crypt::decrypt($user->password);
                return Response::json( array('data' => $user));
    		

            case 'removeUser':
                User::removeUser($request);
                return Response::json( array('success' => true));


            case 'addUser':
                User::addUser($request);
                return Response::json( array('success' => true));


            case 'updateUser':
                User::updateUser($request);
                return Response::json( array('success' => true));



            /*-------------------------------------------------------
            /*
            /*
            /*                      Person
            /*
            /*
            /*-----------------------------------------------------*/


            case 'addPerson':
                Em_persons::addPerson($request);
                return Response::json( array('success' => true));


            case 'updatePerson':
                Em_persons::updatePerson($request);
                return Response::json( array('success' => true));


            case 'getPersonbyID':
                return Response::json( array('success' => true, 'data' => Em_persons::where('id',$request->id)->first() ));

            

            /*-------------------------------------------------------
            /*
            /*
            /*                      Site
            /*
            /*
            /*-----------------------------------------------------*/


            case 'addSite':
                Em_sites::addSite($request);
                return Response::json( array('success' => true));


            case 'updateSite':
                Em_sites::updateSite($request);
                return Response::json( array('success' => true));


            case 'getSitebyID':
                return Response::json( array('success' => true, 'data' => Em_sites::where('sites_id',$request->sites_id)->first() ));


            

            /*-------------------------------------------------------
            /*
            /*
            /*                      Equip
            /*
            /*
            /*-----------------------------------------------------*/


            case 'addEquip':
                Em_equip::addEquip($request);
                return Response::json( array('success' => true));


            case 'updateEquip':
                Em_equip::updateEquip($request);
                return Response::json( array('success' => true));


            case 'getEquipbyID':
                return Response::json( array('success' => true, 'data' => Em_equip::where('id_equip',$request->id_equip)->first() ));




            /*-------------------------------------------------------
            /*
            /*
            /*                   Notifications
            /*
            /*
            /*-----------------------------------------------------*/



                

    		default:
    			# code...
    			break;
    	}
    }



}
