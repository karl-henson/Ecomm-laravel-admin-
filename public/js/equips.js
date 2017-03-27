function Validate()
{
	var msg="";
    var validFlag=true;
	if($("#txtpartnum").val()=="")
	{
		msg = msg + "<br>*Don't leave Part Number blank";
		validFlag=false;
	}
	if($("#txtpartdesc").val()=="")
	{
		msg = msg + "<br>*Don't leave Description blank";
		validFlag=false;
	}
	if($("#txtpartmfr").val()=="")
	{
		msg = msg + "<br>*Don't leave Part mfr blank";
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

$("#btnAddEquip").click(function(){
	$("#dialogEquip").dialog({
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
						method 		: 'addEquip',
						partnum 	: $("#txtpartnum").val(),
						partdesc 	: $("#txtpartdesc").val(),
						partmfr 	: $("#txtpartmfr").val()
					},
					async: false,
					success: function (msg) {
						if(msg['success'])
						{
							flag=true;
							alert("Equipment Saved successfully!");
							window.location=window.location;
						}
					},
					Error: function (x, e) {
						alert('Some issue please contact to admin');
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

function EditEquipment(id_equip)
{
	$.ajax({
		type: "POST",
		url: "functions",
		data: {
			_token 		: $('meta[name="csrf-token"]').attr('content'),
			method 		: 'getEquipbyID',
			id_equip 	: id_equip
		},
		async: false,
		success: function (result) {

			$("#hdnid_equip").val(result['data']['id_equip']);
			$("#txtpartnum").val(result['data']['partnum']);
			$("#txtpartdesc").val(result['data']['partdesc']);
			$("#txtpartmfr").val(result['data']['partmfr']);
			
			$("#dialogEquip").dialog({
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
								method 		: 'updateEquip',
								id_equip 	: id_equip,
								partnum 	: $("#txtpartnum").val(),
								partdesc 	: $("#txtpartdesc").val(),
								partmfr 	: $("#txtpartmfr").val()
							},
							async: false,
							success: function (msg) {
								if(msg['success'])
								{
									flag=true;
									alert("Equipment Saved successfully!");
									window.location=window.location;
								}
							},
							Error: function (x, e) {
								alert('Some issue please contact to admin');
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