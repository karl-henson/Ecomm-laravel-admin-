function SetProjectObject()
{
	var objProject= {
		_token : $('meta[name="csrf-token"]').attr('content'),
		method : '',
		project_id :$("#hdnSaveProjectId").val(),
		BPS_PM :$("#txtBPS_PM").val(),
		BPS_Complete :$("#ddlBPS_Complete").val(),
		BB_Jobtrac :$("#txtBB_Jobtrac").val(),
		WIN_Eng :$("#txtWIN_Eng").val(),
		WS_PM :$("#txtWS_PM").val(),
		Return_To :$("#txtReturn_To").val(),
		Returned_Materials :$("#txtReturned_Materials").val(),
		Link_To_Transeferred :$("#txtLink_To_Transeferred").val(),
		Site_Status :$("#txtSite_Status").val(),
		Priority_Code :$("#txtPriority_Code").val(),
		State :$("#txtState").val(),
		city_code :$("#txtcity_code").val(),
		EFI_Partner :$("#txtEFI_Partner").val(),
		Site_Due_Date :$("#txtSite_Due_Date").val(),
		MSS_EWO_OPEN :$("#txtMSS_EWO_OPEN").val(),
		BB_INSTALL_NOTES :$("#txtBB_INSTALL_NOTES").val(),
		EM_to_Complete :$("#txtEM_to_Complete").val(),
		Site_Survey_Req :$("#txtSite_Survey_Req").val(),
		Notes :$("#txtNotes").val(),
		Site_Names :$("#txtSite_Names").val()
	}
	
	return objProject;
}

function Validate()
{
	var msg="";
    var validFlag=true;
	if($("#txtBPS_PM").val()=="")
	{
		msg = msg + "<br>*Don't leave Project Manager blank";
		validFlag=false;
	}
	if($("#txtBPS_PM").val()=="")
	{
		msg = msg + "<br>*Don't leave Project Reference blank";
		validFlag=false;
	}
	if (!validFlag) {
    	$("#dialogmsg").html(msg);
		$("#dialogmsg").dialog({
			modal: true,
			buttons: {
				Ok: function () {
					$(this).dialog("close");
				}
			}
		});
	}
	return validFlag;
}

$("#btnAddProject").click(function(){
	$("#dialogProject").dialog({
				modal: true,
				width:700,
				buttons: {
					Save:function(){
						
						var flag = Validate();
						if (!flag) return false;
					
						flag=false;
						var objProject=SetProjectObject()
						objProject['method'] = 'addProject';
						
						var callFun="updateProject";
						
						$.ajax({
							type: "POST",
							url: "functions",
							data: objProject,
							async: false,
							success: function (msg) {
								if(msg['success'] == true)
								{
									flag=true;
									alert("Project Saved successfully!");
									location.reload();
								}
							}
						});
						if(flag)
							$(this).dialog("close");
					},
					Cancel:function(){
						$(this).dialog("close");
					}
				}
			});
});

function EditNote(projectid)
{
	$("#txtNote").val($("#hdnnote" + projectid).val());
	$("#edit-note-form input:nth-child(3)").val(projectid);
	$("#noteData").dialog({
		modal: true,
		height:400,
		width:400,
		buttons: {
			Save: function () {
				document.getElementById('edit-note-form').submit();
			},
			Cancel: function () {
				$("#txtNote").val("");
				$(this).dialog("close");
			}
		}
	});
}

function AddSite(projectid)
{
	$.ajax({
		type: "POST",
		url: "functions",
		data: {
			_token 		: $('meta[name="csrf-token"]').attr('content'),
			method 		: 'getSitesAvaliable',
			project_id 	: projectid
		},
		async: false,
		success: function (result) {
			$("#ddlSite").remove();
			$('#add-site').append('<select id="ddlSite"></select>');
			for(var i=0; i<result['data'].length ; i++)
			{
				$("#ddlSite").append('<option value="' + result['data'][i]['sites_id'] + '">' + result['data'][i]['sitename'] + '(' + result['data'][i]['siteclli'] + '-' + result['data'][i]['city'] + '-' + result['data'][i]['address'] + ')' + '</option>');
			}
			
			$("#sitesDialog").dialog({
				modal: true,
				height:200,
				width:400,
				buttons: {
					Save: function () {
						$.ajax({
								type: "POST",
								url: "functions",
								data: {
									_token 		: $('meta[name="csrf-token"]').attr('content'),
									method : 'addSiteToProject',
									project_id : projectid,
									sites_id : $("#ddlSite").val()
								},
								async: false,
								success: function (resultsite) {
									if(resultsite["success"] == true)
									{
										flag=true;
										alert("Site added successfully!");
									}
									else
										flag=false;
								}
							});
							if(flag)
								$(this).dialog("close");
					},
					Cancel: function () {
						$(this).dialog("close");
					}
				}
			});
		},
		Error: function (x, e) {
			alert('Some issue please contact to admin');
		}
	});
}

function EditProject(projectid)
{
	$.ajax({
		type: "POST",
		url: "functions",
		data: {
			_token 		: $('meta[name="csrf-token"]').attr('content'),
			method 		: 'getProjectbyID',
			project_id	: projectid,
		},
		async: false,
		success: function (result) {

			$("#btnAddProject").val("Update");
			$("#hdnSaveProjectId").val(result['project_id']);
			$("#txtBPS_PM").val(result['BPS_PM']);
			$("#ddlBPS_Complete").val(result['BPS_Complete']);
			$("#txtBB_Jobtrac").val(result['BB_Jobtrac']);
			$("#txtWIN_Eng").val(result['WIN_Eng']);
			$("#txtWS_PM").val(result['WS_PM']);
			$("#txtReturn_To").val(result['Return_To']);
			$("#txtReturned_Materials").val(result['Returned_Materials']);
			$("#txtLink_To_Transeferred").val(result['Link_To_Transeferred']);
			$("#txtSite_Status").val(result['Site_Status']);
			$("#txtPriority_Code").val(result['Priority_Code']);
			$("#txtState").val(result['State']);
			$("#txtcity_code").val(result['city_code']);
			$("#txtEFI_Partner").val(result['EFI_Partner']);
			$("#txtSite_Due_Date").val(result['Site_Due_Date']);
			$("#txtMSS_EWO_OPEN").val(result['MSS_EWO_OPEN']);
			$("#txtBB_INSTALL_NOTES").val(result['BB_INSTALL_NOTES']);
			$("#txtEM_to_Complete").val(result['EM_to_Complete']);
			$("#txtSite_Survey_Req").val(result['Site_Survey_Req']);
			$("#txtNotes").val(result['txtNotes']);
			$("#txtSite_Names").val(result['Site_Names']);

			
			$("#dialogProject").dialog({
				modal: true,
				width:700,
				buttons: {
					Save:function(){
						
						var flag = Validate();
						if (!flag) return false;
					
						flag=false;
						var objProject=SetProjectObject()
						objProject['method'] = 'updateProject';
												
						$.ajax({
							type: "POST",
							url: "functions",
							data: objProject,
							async: false,
							success: function (msg) {
								if(msg['success'] == true)
								{
									flag=true;
									alert("Project Saved successfully!");
									location.reload();
								}
							}
						});
						if(flag)
							$(this).dialog("close");
					},
					Cancel:function(){
						$(this).dialog("close");
					}
				}
			});
		},
		Error: function (x, e) {
			alert('Some issue please contact to admin');
		}
	});
}