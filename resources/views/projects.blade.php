@extends('layouts.main')
@section('title', 'Ecomm')


	@section('content')

		<div class="span9" id="content">
			<div class="row-fluid">
				<!-- block -->
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<button class="btn btn-primary btn-mini" id="btnAddProject"><i class="icon-pencil icon-white" ></i> Add Project</button>
					</div>
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Projects</div>
					</div>
					<div class="block-content collapse in">
						<div class="span12">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableData">
								<thead>
									<tr>
										@if ( Auth::user()->security_level == 2)
											<th>Action</th>
										@endif
										<th></th>
										<th>PROJECT #</th>
										<th>PROJECT MANAGER</th>
										<th>ENGINEER</th>
										<th>CITY CODE</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								
									@foreach ($projects as $project)
									   <tr>
									   		@if (Auth::user()->security_level == 2)
									   			<td>
													<form action="/functions" method="post">
														<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
														<input type = "hidden" id='method' name = "method" value="removeProject">
														<input type="hidden" name="project_id" value="{{$project->project_id}}">
														<button type="submit" class="btn btn-danger btn-mini" 
														onclick="javascript:return confirm('Are you sure you want to delete this Project?')">
														<i class="icon-remove icon-white"></i> Delete</button>
													</form>
												</td>
											@endif
											<td><a href="reportproject?project_id={{$project->project_id}}&BB_Jobtrac={{$project->BB_Jobtrac}}">Report</a></td>
											<td>
												<a href="selectsite?project={{$project->project_id}}">{{$project->BB_Jobtrac}}</a>
											</td>
											<td>{{$project->BPS_PM}}</td>
											<td>{{$project->WIN_Eng}}</td>
											<td>{{$project->city_code}}</td>
											<td><button class="btn btn-primary btn-mini" onclick="javascript:EditNote({{$project->project_id}})"><i class="icon-pencil icon-white" ></i> Edit Note</button>&nbsp;
											<button class="btn btn-primary btn-mini" onclick="javascript:EditProject({{$project->project_id}})"><i class="icon-pencil icon-white" ></i> Edit Project</button>&nbsp;
											<button class="btn btn-primary btn-mini" onclick="javascript:AddSite({{$project->project_id}})"><i class="icon-pencil icon-white" ></i> Add Site</button>
											<input type="hidden" id="{{$project->project_id}}" value="{{$project->Notes}}"></td>
										</tr>	
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /block -->
			</div>
			
			<div class="block" id="dialogProject" style="display:none;">
				<div class="block-content collapse in">
					<div class="span12" style="overflow:scroll;height:600px;width:90%;">
						<form id="project-form" action="/functions" method="post">
							<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
							<input type = "hidden" id='method' name = "method" >
							<fieldset>
								<legend>Project Details</legend>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Project Manager</label>
								  <div class="controls">
								  	<input type="hidden" id="hdnSaveProjectId">
									<input class="input-xlarge focused" name="txtBPS_PM" id="txtBPS_PM" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Completed</label>
								  <div class="controls">
									<select name="ddlBPS_Complete" id="ddlBPS_Complete">
										<option value="N">No</option>
										<option value="Y">Yes</option>
									</select>
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Project Reference</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtBB_Jobtrac" id="txtBB_Jobtrac" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">WIN_Eng</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtWIN_Eng" id="txtWIN_Eng" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">WS_PM</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtWS_PM" id="txtWS_PM" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Return_To</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtReturn_To" id="txtReturn_To" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Returned_Materials</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtReturned_Materials" id="txtReturned_Materials" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Link_To_Transeferred</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtLink_To_Transeferred" id="txtLink_To_Transeferred" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Site_Status</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtSite_Status" id="txtSite_Status" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Priority_Code</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtPriority_Code" id="txtPriority_Code" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">State</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtState" id="txtState" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">city_code</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtcity_code" id="txtcity_code" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">EFI_Partner</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtEFI_Partner" id="txtEFI_Partner" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Site_Due_Date</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtSite_Due_Date" id="txtSite_Due_Date" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">MSS_EWO_OPEN</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtMSS_EWO_OPEN" id="txtMSS_EWO_OPEN" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">BB_INSTALL_NOTES</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtBB_INSTALL_NOTES" id="txtBB_INSTALL_NOTES" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">EM_to_Complete</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtEM_to_Complete" id="txtEM_to_Complete" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Site_Survey_Req</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtSite_Survey_Req" id="txtSite_Survey_Req" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Notes</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtNotes" id="txtNotes" type="text" value="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="focusedInput">Site_Names</label>
								  <div class="controls">
									<input class="input-xlarge focused" name="txtSite_Names" id="txtSite_Names" type="text" value="">
								  </div>
								</div>
							</fieldset>						
						</form>				  
					</div>
				</div>
			</div>
		</div>
		<div id="dialogmsg"></div>
		<div id="noteData" style="display:none;">
			<div class="row-fluid">
				<div class="block-content collapse in">
					<form id="edit-note-form" action="/functions" method="post">
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
						<input type = "hidden" name = "method" value="editNote">
						<input type = "hidden" name = "project_id" >
						<textarea id="txtNote" name = "Note" style="height:220px;width:90%;"></textarea>
					</form>
				</div>
			</div>
		</div>
		<div id="sitesDialog" style="display:none;">
			<div class="row-fluid">
				<div class="block-content collapse in" id="add-site">
					<select id="ddlSite"></select>
				</div>
			</div>
		</div>
		
	@endsection

	@section('script')
		<script src="js/projects.js"></script>
	@endsection

