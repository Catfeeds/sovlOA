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