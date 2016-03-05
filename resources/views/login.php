<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>城市系统工程研究中心专家信息库</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #016aa9;
	overflow:hidden;
}

.STYLE1 {
	color: #000000;
	font-size: 12px;
}
.piclink {margin:0 auto; width:30px;}
a.piclink:hover{ text-decoration:none;}
a.piclink img{ border:#fff 0px;}
a.piclink:hover img{ border:#888 0px dotted;}
-->
</style>
<script type="text/javascript">
	function keyup(){
			if(window.event.keyCode==13)  
			document.forms[0].submit();
        }
	function doSubmit(){
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		if(username!=null&&password!=null){
			window.document.forms[0].submit();
			return false;
		}else{
			alert("请填写完整的登录信息.");
		}
			
	}
</script>
</head>

<body>
<form  action="loginAuth" id="login" name="login">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="962" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="235" background="images/login_03.bmp">&nbsp;</td>
      </tr>
      <tr>
        <td height="53"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="394" height="53" background="images/login_05.gif">&nbsp;</td>
            <td width="206" background="images/login_06.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%" height="25"><div align="right"><span class="STYLE1">用户</span></div></td>
                <td width="57%" height="25"><div align="center">
                  <input type="text" name="username" id="username" style="width:105px; height:17px; background-color:#292929; border:solid 1px #7dbad7; font-size:12px; color:#6cd0ff">
                </div></td>
                
                <td width="27%" height="25"><?php echo Session::get('message')?></td>
              </tr>
              <tr>
                <td height="25"><div align="right"><span class="STYLE1">密码</span></div></td>
                <td height="25"><div align="center">
                  <input type="password" name="password" id="password" style="width:105px; height:17px; background-color:#292929; border:solid 1px #7dbad7; font-size:12px; color:#6cd0ff">
                </div></td>
                <td height="25"><div align="left"><a class="piclink" href="#" onclick="doSubmit();return false;"><img src="images/dl.gif" width="49" height="18" border="0" /></a></div></td>
              	<td>
              </tr>
              
            </table></td>
            <td width="362" background="images/login_07.gif">&nbsp;</td>
          	
          </tr>
          
        </table></td>
      </tr>
      <tr>
        <td height="213" background="images/login_08.gif">&nbsp;</td>
      </tr>
      
    </table></td>
  </tr>
</table>
</form>
<div></div>
</body>
</html>