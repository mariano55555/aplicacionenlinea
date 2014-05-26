$("#submit-2084714378").bind("click", function (event) {$.ajax({data:$("#submit-2084714378").closest("form").serialize(), dataType:"html", error:function (XMLHttpRequest, textStatus, errorThrown) {ajaxsubmiterrormessage('/aplicacionenlinea/');}, success:function (data, textStatus) {ajaxsubmitaddmessage('/aplicacionenlinea/');$("#familiartable").html(data);}, type:"post", url:"\/aplicacionenlinea\/admin\/Tipofamiliares\/edit\/4"});
return false;});
$(".submit").bind("click", function (event) {$('#form-content-familiaredit').modal('hide')
return false;});