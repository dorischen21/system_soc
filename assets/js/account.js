$(function(){var o=$("#baseUrl").val();$("#btn_login").bind("click",function(){$.ajax({type:"post",url:o+"account/doLogin",data:$("#form1").serialize(),statusCode:{200:function(n){"0"==n||"2"==n?alert("0"==n?"帳密錯誤":"登入期限已過期 !"):window.location=o+"news/showNewsList"}},error:function(){alert("error")}})}),$("#txt_loginPassword").keypress(function(o){return 13==o.which?($("#btn_login").click(),!1):void 0}),$("#btn_changePassword").bind("click",function(){return $("form")[0].checkValidity()?$("#txt_newPassword").val()!=$("#txt_confirmNewPassword").val()?void alert("兩次密碼不符!!"):void $.ajax({type:"post",url:o+"account/doChangePassword",data:$("#form1").serialize(),statusCode:{200:function(){alert("密碼已變更完成!!"),window.location=o+"news/showNewsList"}},error:function(){alert("error")}}):void 0}),$("#btn_saveMail").bind("click",function(){$("form")[0].checkValidity()&&$.ajax({type:"post",url:o+"account/doCreateMail",data:$("#form1").serialize(),statusCode:{200:function(){alert("已修改完成!!")}},error:function(){alert("error")}})}),$("#btn_createCompany").bind("click",function(){window.location=o+"account/detailCompany"}),$("#btn_saveCompany").bind("click",function(){$("form")[0].checkValidity()&&$.ajax({type:"post",url:o+"account/doDetailCompany",data:$("#form1").serialize(),statusCode:{200:function(){alert("操作成功!!"),window.location=o+"account/listCompany"}},error:function(){alert("error")}})}),$("#btn_cancelCompany").bind("click",function(){window.location=o+"account/listCompany"}),$("#btn_createType").bind("click",function(){window.location=o+"account/detailType"}),$("#btn_saveType").bind("click",function(){$("form")[0].checkValidity()&&$.ajax({type:"post",url:o+"account/doDetailType",data:$("#form1").serialize(),statusCode:{200:function(){alert("操作成功!!"),window.location=o+"account/listType"}},error:function(){alert("error")}})}),$("#btn_cancelType").bind("click",function(){window.location=o+"account/listType"}),$(".gohome").bind("click",function(){window.location=o+"news/showNewsList"}),$("#btn_createservice").bind("click",function(){window.location=o+"account/detailService"}),$("#btn_saveService").bind("click",function(){$("form")[0].checkValidity()&&$.ajax({type:"post",url:o+"account/doDetailService",data:$("#form1").serialize(),statusCode:{200:function(){alert("操作成功!!"),window.location=o+"account/listService"}},error:function(){alert("error")}})}),$("#btn_cancelService").bind("click",function(){window.location=o+"account/listService"})});