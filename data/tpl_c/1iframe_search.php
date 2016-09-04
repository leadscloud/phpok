<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($sitetitle){?><?php echo $sitetitle;?> - <?php } ?><?php echo $_sys[sitename];?><?php if($_sys[seotitle]){?> -- <?php echo $_sys[seotitle];?><?php } ?></title>
<meta name="keywords" content="<?php echo $_sys[keywords];?>,qinggan,phpok">
<meta name="description" content="<?php echo $_sys[description];?> - PHPOK.COM">
<script type="text/javascript">
var base_file = "<?php echo $_sys[siteurl];?><?php echo HOME_PAGE;?>";
var base_url = "<?php echo $_sys[siteurl];?><?php echo $sys_app->url;?>";
var base_ctrl = "<?php echo $sys_app->config->c;?>";
var base_func = "<?php echo $sys_app->config->f;?>";
var base_dir = "<?php echo $sys_app->config->d;?>";
</script>
<style type="text/css">
body{background:<?php echo $bgcolor;?>;font-size:12px;}
input{width:120px;}
select{width:120px;}
.table{margin:1px auto;width:99%;clear:both;}
.table .left{float:left;width:60px;text-align:right;padding:3px 1px;}
.table .right{float:left;text-align:left;padding:3px 1px;}
.but01{background:url('tpl/www/images/but_bg02.jpg') no-repeat;width:50px;height:20px;line-height:18px;border:0;margin:0;padding:0;}
.btn2{width:40px;height:20px;line-height:18px;border:1px solid #ccc;}
.long_input{width:300px;}
.short_input{width:50px;}
.keywords{width:100px;}
.clue_on{font-size:12px;color:#484848}
.red{font-size:12px;color:red;}
</style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/php.js"></script>
<script type="text/javascript">
function to_submit()
{
	$("#_to_url").attr("value",top.location);
	return true;
}
//if (self.location == top.location)
//{
//	direct("<?php echo $_sys[site_url];?>");
//}
</script>
</head>

<body>
<form method="post" action="<?php echo site_url('search');?>" target="_top" onsubmit="return to_submit()">
<input type="hidden" id="_to_url" name="_to_url" value="" />
<input type="hidden" id="mid" name="mid" value="<?php echo $mid;?>" />
<?php if($catelist){?>
<div class="table">
	<div class="left">分类：</div>
	<div class="right">
	<select name="cateid" id="cateid">
	<option value="">请选择……</option>
	<?php $_i=0;$catelist=(is_array($catelist))?$catelist:array();foreach($catelist AS  $key=>$value){$_i++; ?>
	<option value="<?php echo $value[id];?>"<?php if($cateid == $value[id]){?> selected<?php } ?>><?php echo $value[space];?><?php echo $value[cate_name];?></option>
	<?php } ?>
	</select>
	</div>
</div>
<?php } ?>
<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
<?php echo $value;?>
<?php } ?>
<div class="table">
	<div class="left">&nbsp;关键字：</div>
	<input type="text" id="keywords" name="keywords" value="<?php echo $keywords;?>" class="keywords" />
</div>

<div class="table">
	<div class="left">&nbsp;</div>
	<input type="submit" class="but01" id="_phpok_submit" value=" 提交 ">
</div>
</form>
<script type="text/javascript">
<?php $_i=0;$jslist=(is_array($jslist))?$jslist:array();foreach($jslist AS  $key=>$value){$_i++; ?>
	<?php if($value[input] == "opt"){?>
	phpjs_parent_opt('<?php echo $value[default_val];?>','<?php echo $value[identifier];?>','<?php echo $value[id];?>','<?php echo $value[link_id];?>');
	<?php } ?>
<?php } ?>
</script>
</body>
</html>