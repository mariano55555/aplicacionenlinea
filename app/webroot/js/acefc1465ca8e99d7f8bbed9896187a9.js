$("#link-1492674003").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#loading").fadeIn();}, dataType:"html", success:function (data, textStatus) {$("#loading").fadeOut();$("#here").html(data);}, url:"\/aplicacionenlinea\/admin\/dashboard"});
return false;});
$("#link-1466703598").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#loading").fadeIn();}, dataType:"html", success:function (data, textStatus) {$("#loading").fadeOut();$("#here").html(data);}, url:"\/aplicacionenlinea\/admin\/Aplicaciones\/generales"});
return false;});