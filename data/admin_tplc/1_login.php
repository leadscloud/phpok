<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录后台管理 -- Www.Phpok.Com</title>
<meta name="keywords" content="情感,企业,网站,建设,phpok,qinggan,phpok" />
<meta name="description" content="企业网站建设用PHPOK3.0更简单！ - PHPOK.COM" />
<link href="./app/admin/view/images/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var base_file = "<?php echo HOME_PAGE;?>";
var base_url = "<?php echo $sys_app->url;?>";
var base_ctrl = "<?php echo $sys_app->config->c;?>";
var base_func = "<?php echo $sys_app->config->f;?>";
var base_dir = "<?php echo $sys_app->config->d;?>";
var phpok_data = "";
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<?php if(function_exists("imagecreate") && defined("SYS_VCODE_USE") && SYS_VCODE_USE == true){?>
<script type="text/javascript">
function adm_login_vcode()
{
	var srcurl = "<?php echo site_url('login,codes','','&');?>";
	var rand = Math.random();
	srcurl += "rand="+rand;
	$("#phpok_vcode").attr("src",srcurl);
}
function chk_vcode()
{
	var chk = $("#chk").val();
	if(!chk)
	{
		alert("验证码不允许为空");
		return false;
	}
	return true;
}
</script>
<?php }else{ ?>
<script type="text/javascript">
function chk_vcode(){return true}
</script>
<?php } ?>
<script type="text/javascript">
function phpok_chklogin(t)
{
	var username = $("#username").val();
	var mypass = $("#password").val();
	if(!username)
	{
		alert("账号不允许为空");
		return false;
	}
	if(!mypass)
	{
		alert("密码不允许为空");
		return false;
	}
	var vcode_chk = chk_vcode();
	if(!vcode_chk) return false;
	return true;
}
if (self.location != top.location) top.location = self.location;
</script>
</head>

<body>
<div class="top"></div>
<div class="main">
	<div class="box">
		<form method="post" action="<?php echo site_url('login,login_ok','','&');?>" onsubmit="return phpok_chklogin()" id="login_action">
		<table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="30">用户名：</td>
			<td colspan="2">网站语言：</td>
		</tr>
		<tr>
			<td height="40"><input name="username" type="text" class="user user_bg1" id="username" tabindex="1" /></td>
			<td colspan="2"><select name="langid" id="langid" class="lang">
				<?php $_i=0;$langlist=(is_array($langlist))?$langlist:array();foreach($langlist AS  $key=>$value){$_i++; ?>
				<option value="<?php echo $value[id];?>"><?php echo $value[title];?></option>
				<?php } ?>
			</select></td>
		</tr>
  <?php if(function_exists("imagecreate") && defined("SYS_VCODE_USE") && SYS_VCODE_USE == true){?>
  <tr>
    <td width="209" height="30">密码：</td>
    <td colspan="2">验证码：</td>
    </tr>
  <tr>
    <td height="40"><input name="password" id="password" type="password" class="user user_bg2" tabindex="2" /></td>
    <td width="72"><input name="chk" type="text" class="user user_bg3" id="chk" tabindex="3" /></td>
    <td width="79"><img src="<?php echo site_url('login,codes','','&');?>" border="0" align="absmiddle" style="cursor:pointer;" onclick="adm_login_vcode()" id="phpok_vcode"></td>
    </tr>
  <?php }else{ ?>
  <tr>
    <td width="209" height="30" colspan="3">密码：</td>
    </tr>
  <tr>
    <td height="40"><input name="password" id="password" type="password" class="user user_bg2" /></td>
    </tr>
  <?php } ?>
  <tr>
    <td height="80" colspan="3"><input type="submit" class="but" id="phpok_button" value=" " /></td>
    </tr>
  </table>
</div>
</form>
<div class="bottom"></div>
</div>
</body>
</html>