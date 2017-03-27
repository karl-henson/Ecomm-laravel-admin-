function Validate()
{
	var msg="";
    var validFlag=true;
	if($("#txtsiteclli").val()=="")
	{
		msg = msg + "<br>*Don't leave site clli blank";
		validFlag=false;
	}
	if($("#txtsitename").val()=="")
	{
		msg = msg + "<br>*Don't leave Name blank";
		validFlag=false;
	}
	if($("#txtaddress").val()=="")
	{
		msg = msg + "<br>*Don't leave address blank";
		validFlag=false;
	}
	if($("#txtzip").val()=="")
	{
		msg = msg + "<br>*Don't leave zip blank";
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

$("#btnAddsite").click(function(){
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
						method 		: 'addSite',
						siteclli	: $("#txtsiteclli").val(),
						sitename	: $("#txtsitename").val(),
						address 	: $("#txtaddress").val(),
						city 		: $("#txtcity").val(),
						state 		: $("#txtstate").val(),
						zip 		: $("#txtzip").val(),
						sitetype	: $("#txtsitetype").val(),
						opsmgr 		: $("#txtopsmgr").val(),
						sitetech	: $("#txtsitetech").val()
					},
					async: false,
					success: function (msg) {
						if(msg["success"])
						{
							flag=true;
							alert("Site Saved successfully!");
							window.location=window.location;
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

function EditSite(siteid)
{
	$.ajax({
		type: "POST",
		url: "functions",
		data: {
			_token 	: $('meta[name="csrf-token"]').attr('content'),
			method 	: 'getSitebyID',
			sites_id 		: siteid
		},
		async: false,
		success: function (result) {

			$("#hdnsiteid").val(result['data']['sites_id']);
			$("#txtsiteclli").val(result['data']['siteclli']);
			$("#txtsitename").val(result['data']['sitename']);
			$("#txtaddress").val(result['data']['address']);
			$("#txtcity").val(result['data']['city']);
			$("#txtstate").val(result['data']['state']);
			$("#txtzip").val(result['data']['zip']);
			$("#txtsitetype").val(result['data']['sitetype']);
			$("#txtopsmgr").val(result['data']['opsmgr']);
			$("#txtsitetech").val(result['data']['sitetech']);
			
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
								method 		: 'updateSite',
								siteclli	: $("#txtsiteclli").val(),
								sitename	: $("#txtsitename").val(),
								address 	: $("#txtaddress").val(),
								city 		: $("#txtcity").val(),
								state 		: $("#txtstate").val(),
								zip 		: $("#txtzip").val(),
								sitetype	: $("#txtsitetype").val(),
								opsmgr 		: $("#txtopsmgr").val(),
								sitetech	: $("#txtsitetech").val(),
								sites_id	: siteid
							},
							async: false,
							success: function (msg) {
								if(msg["success"])
								{
									flag=true;
									alert("Site Saved successfully!");
									window.location=window.location;
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