<!--#include file="../include/www-buyok-com.asp"-->

<html><head><title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
</head>
<body>
<table class="tableBorder" width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
							  <tr>
							  <td colspan="4" align="center" background="../shopxp_images/admin_bg_1.gif"><b><font color="#000000">图片查看与修改</font></b></td>
							  </tr>
                                <tr > 
                                  <td width="40%" align="center">分类名称</td>
                                  <td width="20%" align="center">分类排序</td>
                                  <!--<td width="20%" align="center">所属栏目</td>-->
                                 <!-- <td width="20%" align="center">确定操作</td>-->
                                </tr>
                                <%set rs=server.CreateObject("adodb.recordset")
		  rs.Open "select * from Advertor_btype order by shopxpbe_idorder asc",conn,1,1
		  dim paixu
		  if rs.EOF and rs.BOF then
		  response.Write "<div align=center><font color=red>还没有分类</font></center>"
		  paixu=0
		  else
		  do while not rs.EOF
		  %>
                                <form name="form1" method="post" action="Advertor_bclass.asp?action=edit&id=<%=int(rs("shopxpbe_id"))%>">
                                  <tr  align="center"> 
 <td><input name="shopxpbe_name" type="text" id="shopxpbe_name" size="12" value="<%=trim(rs("shopxpbe_name"))%>">
                                    </td>
                                    <td><input name="shopxpbe_idorder" type="text" id="shopxpbe_idorder" size="4" value="<%=int(rs("shopxpbe_idorder"))%>">
                                    </td>
                                    <!--<td><select name="fudongjia" type="text" id="fudongjia" >
<option value="美国游学" < %if rs("fudongjia")="美国游学" then%> selected< %end if%>>美国游学</option>
<option value="美国考察" < %if rs("fudongjia")="美国考察" then%> selected< %end if%>>美国考察</option>
<option value="旅美助手" < %if rs("fudongjia")="旅美助手" then%> selected< %end if%>>旅美助手</option>
</select><!--<input name="fudongjia" type="text" id="fudongjia" size="15" value="< %=rs("fudongjia")%>">
                                    </td>-->
                                    <td><input type="submit" name="Submit" value="修 改">&nbsp;
									<a href="Advertor_bclass.asp?id=<%=int(rs("shopxpbe_id"))%>&action=del" onClick="return confirm('您确定要删除该分类吗？')"><font color=red>删除</font></a>
                                    </td>
                                  </tr>
                                </form>
						<%rs.MoveNext
								loop
								paixu=rs.RecordCount
								end if%>
								</table><br>
<table class="tableBorder" width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="4" align="center" background="../shopxp_images/admin_bg_1.gif"><b><font color="#000000">添加图片大类</font></b></td>
</tr>
<tr  align="center"> 
<td width="40%" align="center"> 分类名称</td>
<td width="20%" align="center"> 分类排序</td>
<!--<td width="20%" align="center">所属栏目(请填写)</td>-->
<td width="20%" align="center"> 确定操作</td>
</tr>
<form name="form1" method="post" action="Advertor_bclass.asp?action=add">
<tr  align="center"> 
<td>
<input name="anclass2" type="text" id="anclass2" size="12">
</td>
<td>
<input name="anclassidorder2" type="text" id="anclassidorder2" size="4" value="<%=paixu+1%>">
</td>
<!--<td>
<select name="fudongjia2" type="text" id="fudongjia2" >
<option value="美国游学">美国游学</option>
<option value="美国考察">美国考察</option>
<option value="旅美助手">旅美助手</option>
</select>
</td>-->
<td>
<input type="submit" name="Submit3" value="添 加">

</td>
</tr>
</form>
</table>
 
</body>
</html>