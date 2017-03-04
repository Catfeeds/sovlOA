<form method="post">
    <table width="300px">
        <tr style="line-height: 35px;">
            <td width="60px">用户名：</td>
            <td align="left" width="180px"><input  type="text" style="border: 1px solid #D7D5D6;" id="LoginForm_username" name="LoginForm[username]" /></td>
            <td><input type="hidden" value='1' name="loginType"><a target="_blank" href="<?=Yii::app()->createUrl("/site/reger");?>">注册</a></td>
        </tr>
        <tr>        
            <td valign="top">密码：</td>
            <td align="left"><input type="password" style="border: 1px solid #D7D5D6" id="LoginForm_password"name="LoginForm[password]"></td>
            <td><a href="javascript:void(0)">忘记密码？</a></td>
        </tr>
    </table>
</form>
<script>
function createAlbum(){
           var content = "<div id='alertform'>"+$("#albumform").html()+"</div>";
            jw.pop.customtip(
            "用户登录",
            content,
            {
                hasBtn_ok:true,
                hasBtn_cancel:true,
                zIndex:10000,
                ok: function(){
                    var username = $.trim($("#alertform form input[name='LoginForm[username]']").val());
                    var password = $.trim($("#alertform form input[name='LoginForm[password]']").val());
                    var url="<?=Yii::app()->createUrl("/site/login");?>"
                    if(username==""){
                        jw.pop.alert("请输入用户名！",{
                            zIndex:10001,
                            icon:2
                        });
                        return false;
                    }
                    if(password==""){
                        jw.pop.alert("请输入密码！",{
                            zIndex:10001,
                            icon:2
                        });
                        return false;
                    }
                    $.post(url,$("#alertform form").serialize(),function(msg){
                        jw.pop.alert(msg,{
                            zIndex:10001,
                            icon:2
                        });
						var patt = new RegExp('登录成功');
						if(patt.test(msg)){
							setTimeout("window.location.reload();",2000);
						}else{
							createAlbum();
						}
                    },"html")
                },
                btn_float:"center"
            }
        );
    }
</script>
