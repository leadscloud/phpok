<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><h3 class="title">会员登录</h3>
<div class="content">
	<form method="post" action="<?php echo site_url('login,ok','',false);?>">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="21%" height="35">帐 号：</td>
		<td width="79%"><input type="text" name="username" /></td>
	</tr>
	<tr>
		<td height="35">密 码：</td>
		<td><input type="password" name="password" /></td>
	</tr>
	<tr>
	<td height="35" colspan="2"><input type="submit" value="登 录" class="but01" />
	  <input type="button" value="注 册" class="but01" onclick="window.location.href='<?php echo site_url('register');?>'" /> <a href="<?php echo site_url('login,getpass');?>">忘记密码？</a></td>
	</tr>
	</table>
	</form>
</div>