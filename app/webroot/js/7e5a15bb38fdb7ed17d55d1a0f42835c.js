$("#submit-417508481").bind("click", function (event) {$.ajax({data:$("#submit-417508481").closest("form").serialize(), dataType:"html", error:function (XMLHttpRequest, textStatus, errorThrown) {ajaxsubmiterrormessage('/aplicacionenlinea/');}, success:function (data, textStatus) {ajaxsubmitaddmessage('/aplicacionenlinea/');$("#superatetable").html(data);}, type:"post", url:"\/aplicacionenlinea\/admin\/Superates\/add"});
return false;});
$(".submit").bind("click", function (event) {$('#form-content-superateadd').modal('hide')
return false;});