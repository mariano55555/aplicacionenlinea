$("#link-86193835").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#loading").fadeIn();}, dataType:"html", success:function (data, textStatus) {$("#loading").fadeOut();$("#here").html(data);}, url:"\/aplicacionenlinea\/admin\/dashboard"});
return false;});