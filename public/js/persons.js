function Validate()
{
	var msg="";
    var validFlag=true;
	if($("#txtfirstname").val()=="")
	{
		msg = msg + "<br>*Don't leave First Name blank";
		validFlag=false;
	}
	if($("#txtlastname").val()=="")
	{
		msg = msg + "<br>*Don't leave Last Name blank";
		validFlag=false;
	}
	if($("#txtemgroup").val()=="")
	{
		msg = msg + "<br>*Don't leave EM group blank";
		validFlag=false;
	}
	if($("#txtoffcphone").val()=="")
	{
		msg = msg + "<br>*Don't leave Office Phone blank";
		validFlag=false;
	}
	if($("#txtemail").val()=="")
	{
		msg = msg + "<br>*Don't leave Email blank";
		validFlag=false;
	}
	if($("#txtlocation").val()=="")
	{
		msg = msg + "<br>*Don't leave Location blank";
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

$("#btnAddPerson").click(function(){
	$("#dialogSite").dialog({
		modal: true,
		width:700,
		buttons: {
			Save:function(){
				var flag = Validate();
				if (!flag) return false;
				flag=false;
				
				$.ajax({
					type: "POST",
					url: "functions",
					data: {
						_token 		: $('meta[name="csrf-token"]').attr('content'),
						method 		: 'addPerson',
						firstname	: $("#txtfirstname").val(),
						lastname	: $("#txtlastname").val(),
						company 	: $("#txtcompany").val(),
						emgroup		: $("#txtemgroup").val(),
						offcphone	: $("#txtoffcphone").val(),
						cellphone	: $("#txtcellphone").val(),
						email 		: $("#txtemail").val(),
						location 	: $("#txtlocation").val()
					},
					async: false,
					success: function (msg) {
						if(msg["success"])
						{
							flag=true;
							alert("Person Saved successfully!");
							window.location = window.location;
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

function EditPerson(id)
{
	$.ajax({
		type: "POST",
		url: "functions",
		data: {
			_token 	: $('meta[name="csrf-token"]').attr('content'),
			method 	: 'getPersonbyID',
			id 		: id
		},
		async: false,
		success: function (result) {

			$("#hdnid").val(result['data']['id']);
			$("#txtfirstname").val(result['data']['firstname']);
			$("#txtlastname").val(result['data']['lastname']);
			$("#txtcompany").val(result['data']['company']);
			$("#txtemgroup").val(result['data']['emgroup']);
			$("#txtoffcphone").val(result['data']['offcphone']);
			$("#txtcellphone").val(result['data']['cellphone']);
			$("#txtemail").val(result['data']['email']);
			$("#txtlocation").val(result['data']['id']);
			
			$("#dialogSite").dialog({
				modal: true,
				width:700,
				buttons: {
					Save:function(){
						var flag = Validate();
						if (!flag) return false;						
						flag=false;

						$.ajax({
							type: "POST",
							url: "functions",
							data: {
								_token 		: $('meta[name="csrf-token"]').attr('content'),
								method 		: 'updatePerson',
								id 			: id,
								firstname	: $("#txtfirstname").val(),
								lastname	: $("#txtlastname").val(),
								company 	: $("#txtcompany").val(),
								emgroup		: $("#txtemgroup").val(),
								offcphone	: $("#txtoffcphone").val(),
								cellphone	: $("#txtcellphone").val(),
								email 		: $("#txtemail").val(),
								location 	: $("#txtlocation").val()

							},
							async: false,
							success: function (msg) {
								if(msg["success"])
								{
									flag=true;
									alert("Person Saved successfully!");
									window.location = window.location
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
		}
	});
}