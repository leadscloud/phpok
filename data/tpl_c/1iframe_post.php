<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($sitetitle){?><?php echo $sitetitle;?> - <?php } ?><?php echo $_sys[sitename];?><?php if($_sys[seotitle]){?> -- <?php echo $_sys[seotitle];?><?php } ?> -- Powered by phpok.com</title>
<meta name="keywords" content="<?php echo $_sys[keywords];?>,qinggan,phpok">
<meta name="description" content="<?php echo $_sys[description];?> - PHPOK.COM">
<script type="text/javascript">
var base_file = "<?php echo $_sys[siteurl];?><?php echo HOME_PAGE;?>";
var base_url = "<?php echo $_sys[siteurl];?><?php echo $sys_app->url;?>";
var base_ctrl = "<?php echo $sys_app->config->c;?>";
var base_func = "<?php echo $sys_app->config->f;?>";
var base_dir = "<?php echo $sys_app->config->d;?>";
var iframe_id = "__<?php echo $m_rs[identifier];?>__iframepage";
</script>
<style type="text/css">
body{background:<?php echo $bgcolor;?>;font-size:12px;}
.table{margin:1px auto;width:99%;clear:both;}
.table .left{float:left;width:20%;text-align:right;padding:3px 1px;}
.table .right{float:left;text-align:left;padding:3px 1px;width:68%;}
.btn2{width:40px;height:20px;line-height:18px;border:1px solid #ccc;}
.long_input{width:300px;}
.short_input{width:50px;}
.clue_on{font-size:12px;color:#484848}
.red{font-size:12px;color:red;}
</style>
<link rel="stylesheet" type="text/css" href="tpl/www/images/calendar.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/php.js"></script>
<script type="text/javascript" src="libs/xheditor/xheditor.js"></script>
<script type="text/javascript">
if (self.location == top.location)
{
	direct("<?php echo $_goback;?>");
}
</script>
</head>

<body>
<form method="post" action="<?php echo site_url('post,setok');?>id=<?php echo $id;?>&module_id=<?php echo $module_id;?>" onsubmit="return to_submit();" target="_top">
<input type="hidden" id="_to_url" name="_to_url" value="<?php echo $_goback;?>" />
<div class="table">
	<div class="left"><span class="red">*</span> <?php echo $m_rs[title_nickname] ? $m_rs[title_nickname] : '主题';?>：</div>
	<div class="right"><input type="text" name="subject" id="subject" class="long_input"></div>
	<div class="clear"></div>
</div>
<?php if($m_rs[if_url_m]){?>
<div class="table">
	<div class="left"><span class="red">*</span> 链接网址：</div>
	<input type="text" name="link_url" id="link_url" class="long_input" value="<?php echo $rs[link_url];?>">
	<select name="target" id="target">
	<option value="0">当前窗口</option>
	<option value="1">新窗口</option>
	</select>
</div>
<?php } ?>
<?php if($ifcate){?>
<div class="table">
	<div class="left"><span class="red">*</span> 分类：</div>
	<?php echo $cate_html;?>
</div>
<?php } ?>
<?php if($m_rs[if_thumb]){?>
<input type="hidden" name="thumb_id" id="thumb_id" value="<?php echo $rs[thumb_id];?>">
<div class="table">
	<div class="left">
		<div style="padding-bottom:3px;"><?php if($m_rs[if_thumb_m]){?><span class="red">*</span> <?php } ?>缩略图：</div>
		<div style="padding-bottom:3px;"><input type="button" class="btn2" value="选择" onclick="phpjs_img('thumb_id','thumb_view');" /> &nbsp;</div>
		<input type="button" value="删除" class="btn2" onclick="phpjs_clear_img('thumb_id','thumb_view')" /> &nbsp;
	</div>
	<?php $thumb = $rs[thumb] ? $rs[thumb] : "ima"."ges/nopic.gif";?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td align="left" id="thumb_view"><img src="<?php echo $thumb;?>" border="0" width="80px" height="80px" /></td>
	</tr>
	</table>
</div>
<?php } ?>


<?php $_i=0;$extlist_must=(is_array($extlist_must))?$extlist_must:array();foreach($extlist_must AS  $key=>$value){$_i++; ?>
<?php echo $value;?>
<?php } ?>

<div <?php if(!$m_rs[if_biz]){?> style="display:none;"<?php } ?>>
	<div class="table">
		<div class="left">售价：</div>
		<input type="text" name="price" id="price" value="<?php echo $rs[price];?>">
		<span class="clue_on"> RMB</span>
	</div>
	<div class="table">
		<div class="left">虚拟产品：</div>
		<input type="checkbox" name="virtual" id="virtual" value="1"<?php if($rs[virtual]){?> checked<?php } ?>>
		<span class="clue_on"> 如果该产品是虚拟产品，请打上勾（购买虚拟产品不需填写地址，不计运费）</span>
	</div>
	<div class="table">
		<div class="left">特价：</div>
		<input type="checkbox" name="ifspecial" id="ifspecial" value="1"<?php if($rs[ifspecial]){?> checked<?php } ?>>
		<span class="clue_on"> 如果该价格是特价产品，请打上勾</span>
	</div>
	<div class="table">
		<div class="left">免费：</div>
		<input type="checkbox" name="free" id="free" value="1"<?php if($rs[free]){?> checked<?php } ?>>
		<span class="clue_on"> 如果该产品免费，请打上勾</span>
	</div>
	<div class="table">
		<div class="left">重量：</div>
		<input type="text" name="weight" id="weight" class="short_input" value="<?php echo $rs[weight];?>">
		<span class="clue_on"> 单位是：Kg</span>
	</div>
</div>



<?php if(function_exists("imagecreate") && defined("SYS_VCODE_USE") && SYS_VCODE_USE == true){?>
<div class="table">
	<div class="left">验证码：</div>
	<div class="right">
		<input name="sys_check" id="sys_check" type="text" style="width:50px;" />
		<span id="phpok_update_code"><img src="<?php echo site_url('login,codes');?>" border="0" align="absmiddle" style="cursor:pointer;" onclick="phpok_update_code()"></span>
	</div>
	<div class="clear"></div>
</div>
<?php }else{ ?>
<input type="hidden" id="hidden" value="sys_check" name="sys_check" id="chk" />
<?php } ?>

<div class="table">
	<div class="left">&nbsp;</div>
	<input type="submit" class="but01" id="_phpok_submit" value=" 提交 ">
</div>
</form>
<script type="text/javascript">
<?php $_i=0;$extlist=(is_array($extlist))?$extlist:array();foreach($extlist AS  $key=>$value){$_i++; ?>
	<?php if($value[input] == "opt"){?>
	phpjs_parent_opt('<?php echo $value[default_val];?>','<?php echo $value[identifier];?>','<?php echo $value[id];?>','<?php echo $value[link_id];?>');
	<?php }elseif($value[input] == "img"){ ?>
	phpjs_viewpic('<?php echo $value[default_val];?>','<?php echo $value[identifier];?>');
	<?php }elseif($value[input] == "download"){ ?>
	phpjs_viewdown('<?php echo $value[default_val];?>','<?php echo $value[identifier];?>');
	<?php }elseif($value[input] == "video"){ ?>
	phpjs_viewvideo('<?php echo $value[default_val];?>','<?php echo $value[identifier];?>');
	<?php } ?>
<?php } ?>

function to_submit()
{
	var subject = $("#subject").val();
	if(!subject)
	{
		alert("主题不允许为空");
		getid("subject").focus();
		return false;
	}
	//判断核心模块是否必填
	<?php if($ifcate){?>
	var cate_id = getid("cate_id").value;
	if(!cate_id || cate_id == "0")
	{
		alert("请选择分类");
		return false;
	}
	<?php } ?>
	<?php if($m_rs[if_thumb] && $m_rs[if_thumb_m]){?>
	var thumb_id = getid("thumb_id").value;
	if(!thumb_id)
	{
		alert("请选择缩略图信息");
		return false;
	}
	<?php } ?>
	var chkcode = $("#sys_check").val();
	if(!chkcode)
	{
		alert("验证码不允许为空！");
		return false;
	}
	<?php $_i=0;$extlist=(is_array($extlist))?$extlist:array();foreach($extlist AS  $key=>$value){$_i++; ?>
	<?php if($value[if_must] && $value[input] != "radio" && $value[input] != "checkbox"){?>
		var <?php echo $value[identifier];?> = $("#<?php echo $value[identifier];?>").val();
		if(!<?php echo $value[identifier];?>)
		{
			alert("<?php echo $value['error_note'] ? $value['error_note'] : '加红色星号信息均必须填写';?>");
			return false;
		}
	<?php } ?>
	<?php } ?>
	getid("_phpok_submit").disabled = true;
	return true;
}
</script>

</body>
</html>