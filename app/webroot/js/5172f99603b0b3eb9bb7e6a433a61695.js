$("#submit-684830241").bind("click", function (event) {$.ajax({data:$("#submit-684830241").closest("form").serialize(), dataType:"html", error:function (XMLHttpRequest, textStatus, errorThrown) {ajaxsubmiterrormessage('/aplicacionenlinea/');}, success:function (data, textStatus) {ajaxsubmitaddmessage('/aplicacionenlinea/');$("#institucionestable").html(data);}, type:"post", url:"\/aplicacionenlinea\/admin\/Instituciones\/edit\/2"});
return false;});
$(".submit").bind("click", function (event) {$('#form-content-institucionesedit').modal('hide')
return false;});