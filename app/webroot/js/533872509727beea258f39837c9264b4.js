$("#submit-39179196").bind("click", function (event) {$.ajax({data:$("#submit-39179196").closest("form").serialize(), dataType:"html", error:function (XMLHttpRequest, textStatus, errorThrown) {ajaxsubmiterrormessage('/aplicacionenlinea/');}, success:function (data, textStatus) {ajaxsubmitaddmessage('/aplicacionenlinea/');$("#familiartable").html(data);}, type:"post", url:"\/aplicacionenlinea\/admin\/Tipofamiliares\/edit\/1"});
return false;});
$(".submit").bind("click", function (event) {$('#form-content-familiaredit').modal('hide')
return false;});