<!--#include file="../include/www-buyok-com.asp"-->

<%dim shopxpbe_id,shopxpbe_name,paixu
shopxpbe_name=request.QueryString("shopxpse_name")
shopxpbe_id=request.QueryString("id")
%>
<html><head><title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
</head>
<body>
<table class="tableBorder" width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr> 
<td colspan="4" align="center" background="../shopxp_images/admin_bg_1.gif"><b><font color="#ffffff">文章小类管理</font></b></td>
</tr>
<tr> 
<td width="30%" valign="top" align="center" ><br>
<select name="select" onChange="var jmpURL=this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}" >
<option selected="selected">选择文章分类</option>
        <%set rs=server.createobject("adodb.recordset")
		rs.Open "select * from Advertor_btype order by shopxpbe_id asc",conn,1,1
		do while not rs.eof %>
                                  <option value="Advertor_sname.asp?id=<%=rs("shopxpbe_id")%>&shopxpbe_name=<%=rs("shopxpbe_name")%>" <%if rs("shopxpbe_id")=cint(request.QueryString("id")) then %><%end if%>><%=trim(rs("shopxpbe_name"))%></option>
                                  <%rs.movenext
		loop
		rs.close
		set rs=nothing
		%>
                                </select><br>
                                <%if request.QueryString("id")<>"" then
        response.Write "当前查讯："&request.QueryString("shopxpbe_name")
        end if%>
</td>
<td width="70%" > 
<table width="90%" align="center" border="0" cellpadding="1" cellspacing="2">
<tr> 
<td width="50%" align="center">分类名称</td>
<td width="20%" align="center">分类排序</td>
<td width="30%" align="center">确定操作</td>
</tr>
  <%
        if shopxpbe_id="" then
        response.Write "<div align=center><font color=red>请选择左测的分类</font></div>"
        else
        set rs=server.CreateObject("adodb.recordset")
        rs.Open "select * from Advertor_stype where shopxpbe_id="&shopxpbe_id&" order by shopxpse_idorder",conn,1,1
         if rs.EOF and rs.BOF then
		  response.Write "<div align=center><font color=red>还没有分类</font></center>"
		  paixu=0
		  else
         do while not rs.EOF
         %>
<form name="form1" method="post" action="Advertor_sclass.asp?action=edit&id=<%=rs("shopxpse_id")%>&shopxpbe_name=<%=request.QueryString("shopxpbe_name")%>">
<tr> 
<td align="center">
<input name="shopxpse_name" type="text" id="shopxpse_name" size="16" value="<%=trim(rs("shopxpse_name"))%>">
<input name="shopxpbe_id" type="hidden" value="<%=request.QueryString("id")%>" id="Hidden1"></td>
<td align="center"><input name="shopxpse_idorder" type="text" id="shopxpse_idorder" size="4" value="<%=int(rs("shopxpse_idorder"))%>"></td>
<td align="center">
<input type="submit" name="Submit" value="修 改">&nbsp;
<a href="Advertor_sclass.asp?id=<%=int(rs("shopxpse_id"))%>&action=del&shopxpbe_id=<%=request.QueryString("id")%>&shopxpbe_name=<%=request.QueryString("shopxpbe_name")%>" onClick="return confirm('您确定进行删除操作吗？')"><font color=red>删除</font></a></td>
</tr>
</form>
		<%rs.movenext
        loop
        paixu=rs.RecordCount
        rs.close
        set rs=nothing
        end if
        end if
		%>
</table>
</td>
</tr>
</table><br>
<table class="tableBorder" width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr> 
<td colspan="4" align="center" background="../shopxp_images/admin_bg_1.gif"><b><font color="#ffffff">添加文章分类</font></b></td>
</tr>
<tr> 
<td width="30%" valign="top" align="center" ><br>
当前分类：<%=request.QueryString("shopxpbe_name")%></div>
</td>
<td width="70%" > 
<table width="90%" align="center" border="0" cellpadding="1" cellspacing="2">
<tr> 
<td width="50%" align="center">分类名称</div></td>
<td width="20%" align="center">分类排序</div></td>
<td width="30%" align="center">确定操作</div></td>
</tr>
<form name="form2" method="post" action="Advertor_sclass.asp?action=add&shopxpbe_name=<%=request.QueryString("shopxpbe_name")%>">
<tr> 
<td align="center"> 
<input name="nclass2" type="text" id="nclass22" size="16">
<input name="shopxpbe_id" type="hidden" value="<%=request.QueryString("id")%>">
</td>
<td align="center"> 
<input name="nclassidorder2" type="text" id="nclassidorder22" size="4" value="<%=paixu+1%>">
</td>
<td align="center"> 
<input type="submit" name="Submit2" value="添加分类">
</td>
</tr>
</form>
</table>
</td>
</tr>
</table>
 
</body>
</html>