function ValidateUser() {
	var msg="";
	if($("#userName").val()=="")
	{
		msg +="<br>*Please enter User Name";
	}
	if($("#password").val()=="")
	{
		msg +="<br>*Please enter password";
	}
	if($("#securityLevel").val()=="" || !$.isNumeric($("#securityLevel").val()))
	{
		msg +="<br>*Please enter Security Level as numeric";
	}
	return msg;
}
	
function EditUser(userid)
{
	$.ajax({
		type: "POST",
		url: "functions",
		data: {
			_token 	: $('meta[name="csrf-token"]').attr('content'),
			method 	: 'getUserbyID',
			user_id	: userid
		},
		async: false,
		success: function (result) {
			$("#userName").val(result['data']['user']);
			$("#password").val(result['data']['password']);
			$("#securityLevel").val(result['data']['security_level']);
		},
		Error: function (x, e) {
			alert('Some issue please contact to admin');
		}
	});
	
	$("#dialogAddUser").dialog({
		modal: true,
		buttons: {
			Save: function () {
				var message=ValidateUser();
				if(message!="")
				{
					$("#dialogmsg").html(message);
					$("#dialogmsg").dialog({
						modal: true,
						buttons: {
							Ok: function () {
								$(this).dialog("close");
							}
						}
					});
				}
				else
				{
					var flag=false;
					$.ajax({
						type: "POST",
						url: "functions",
						data: {
							_token 			: $('meta[name="csrf-token"]').attr('content'),
							method 			: 'updateUser',
							user_id			: userid,
							user 			: $("#userName").val(),
							password 		: $("#password").val(),
							security_level 	: $("#securityLevel").val()
						},
						async: false,
						success: function (msg) {
							getUsers();
							$("#userName").val("");
							$("#password").val("");
							$("#securityLevel").val("0");
							flag=true;
						}
					});
					if(flag)
						$(this).dialog("close");
				}
			},
			Cancel: function () {
				$("#userName").val("");
				$("#password").val("");
				$("#securityLevel").val("0");
				$(this).dialog("close");
			}
		}
	});
}

function DeleteUser(userid)
{
	$("#dialogmsg").html("<h3>Are you sure you want to delete this line?</h3>");
	$("#dialogmsg").dialog({
		modal: true,
		buttons: {
			Yes: function () {
				var flag=false;
				$.ajax({
					type: "POST",
					url: "functions",
					data: {
						_token : $('meta[name="csrf-token"]').attr('content'),
						method : 'removeUser',
						user_id : userid
					},
					async: false,
					success: function (msg) {
						flag=true;
						getUsers();
					}
				});
				if(flag)
					$(this).dialog("close");
			},
			No: function () {
				$("#dialogerrormsg").html("");
				$(this).dialog("close");
			}
		}
	});
}

function getUsers()
{
	$.ajax({
		type: "POST",
		url: "functions",
		data : {
			_token : $('meta[name="csrf-token"]').attr('content'),
			method : 'getUsers'
		},
		async: false,
		success: function (result) {

			var out = '<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableData"><thead><tr><td>Actions</td><th>User Name</th><th>Security Level</th></tr></thead><tbody>';
		
			for(var i = 0; i < result['data'].length; i++) {
				out += '<tr><td><button class="btn btn-primary btn-mini" onclick="javascript:EditUser(' + result['data'][i]['userid'] + ')"><i class="icon-pencil icon-white" ></i> Edit</button>&nbsp;&nbsp;<button class="btn btn-danger btn-mini" onclick="javascript:DeleteUser(' + result['data'][i]['userid'] + ')"><i class="icon-remove icon-white"></i> Delete</button></td><td>' +
				result['data'][i]['user'] +
				"</td><td>" +
				result['data'][i]['security_level'] +
				'</td></tr>';
			}
			out += '</tbody></table>'
			$("#divdata").html(out);
			$('#tableData').dataTable( {
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
				"sPaginationType": "bootstrap",
				"iDisplayLength": 25,
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				}
			});
		},
		Error: function (x, e) {
			alert('Some issue please contact to admin');
		}
	});
}

$(document).ready(function(){
	
	getUsers();
	
	$("#addUser").click(function(){
		$("#dialogAddUser").dialog({
			modal: true,
			buttons: {
				Save: function () {
					var message=ValidateUser();
					if(message!="")
					{
						$("#dialogmsg").html(message);
						$("#dialogmsg").dialog({
							modal: true,
							buttons: {
								Ok: function () {
									$(this).dialog("close");
								}
							}
						});
					}
					else
					{
						var flag=false;
						$.ajax({
							type: "POST",
							url: "functions",
							data: {
								_token 			: $('meta[name="csrf-token"]').attr('content'),
								method 			: 'addUser',
								user 			: $("#userName").val(),
								password 		: $("#password").val(),
								security_level 	: $("#securityLevel").val()
							},
							async: false,
							success: function (msg) {
								getUsers();
								$("#userName").val("");
								$("#password").val("");
								$("#securityLevel").val("0");
								flag=true;
							}
						});
						if(flag)
							$(this).dialog("close");
					}
				},
				Cancel: function () {
					$("#userName").val("");
					$("#password").val("");
					$("#securityLevel").val("0");
					$(this).dialog("close");
				}
			}
		});
	});
});