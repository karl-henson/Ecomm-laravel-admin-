<?php

namespace Ecomm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Em_projects extends Model
{
    //
    protected $table = 'em_projects';
    protected $primaryKey = 'project_id';
    public $timestamps = false;

    public static function addProject(Request $request){
    	$newproject = new Em_projects;

		$newproject->BPS_PM=$request->BPS_PM;
		$newproject->BPS_Complete=$request->BPS_Complete;
		$newproject->BB_Jobtrac=$request->BB_Jobtrac;
		$newproject->WIN_Eng=$request->WIN_Eng;
		$newproject->WS_PM=$request->WS_PM;
		$newproject->Return_To=$request->Return_To;
		$newproject->Returned_Materials=$request->Returned_Materials;
		$newproject->Link_To_Transeferred=$request->Link_To_Transeferred;
		$newproject->Site_Status=$request->Site_Status;
		$newproject->Priority_Code=$request->Priority_Code;
		$newproject->State=$request->State;
		$newproject->city_code=$request->city_code;
		$newproject->EFI_Partner=$request->EFI_Partner;
		$newproject->Site_Due_Date=$request->Site_Due_Date;
		$newproject->MSS_EWO_OPEN=$request->MSS_EWO_OPEN;
		$newproject->BB_INSTALL_NOTES=$request->BB_INSTALL_NOTES;
		$newproject->EM_to_Complete=$request->EM_to_Complete;
		$newproject->Site_Survey_Req=$request->Site_Survey_Req;
		$newproject->Notes=$request->Notes;
		$newproject->Site_Names=$request->Site_Names;

		$newproject->save();
		return;
    }

    public static function updateProject(Request $request){
    	$project = Em_projects::where('project_id', $request->project_id)->first();

		$project->BPS_PM=$request->BPS_PM;
		$project->BPS_Complete=$request->BPS_Complete;
		$project->BB_Jobtrac=$request->BB_Jobtrac;
		$project->WIN_Eng=$request->WIN_Eng;
		$project->WS_PM=$request->WS_PM;
		$project->Return_To=$request->Return_To;
		$project->Returned_Materials=$request->Returned_Materials;
		$project->Link_To_Transeferred=$request->Link_To_Transeferred;
		$project->Site_Status=$request->Site_Status;
		$project->Priority_Code=$request->Priority_Code;
		$project->State=$request->State;
		$project->city_code=$request->city_code;
		$project->EFI_Partner=$request->EFI_Partner;
		$project->Site_Due_Date=$request->Site_Due_Date;
		$project->MSS_EWO_OPEN=$request->MSS_EWO_OPEN;
		$project->BB_INSTALL_NOTES=$request->BB_INSTALL_NOTES;
		$project->EM_to_Complete=$request->EM_to_Complete;
		$project->Site_Survey_Req=$request->Site_Survey_Req;
		$project->Notes=$request->Notes;
		$project->Site_Names=$request->Site_Names;

		$project->save();
		return;
    }

    public static function removeProject(Request $request){

    	Em_projects::where('project_id', $request->project_id)->delete();
    	return;

    }

    public static function editNote(Request $request){

    	$temp = Em_projects::where('project_id', $request->project_id)->first();
    	$temp->Notes = $request->Note;
    	$temp->save();

    	return;

    }

}
