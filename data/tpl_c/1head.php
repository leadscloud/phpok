<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($sitetitle){?><?php echo $sitetitle;?> - <?php } ?><?php if($_sys[seotitle]){?> <?php echo $_sys[seotitle];?> - <?php } ?><?php echo $_sys[sitename];?> -- Powered by phpok.com</title>
<?php if($_sys[google_site_verification]){?><meta name="google-site-verification" content="<?php echo $_sys[google_site_verification];?>" /><?php } ?>
<?php if($_sys[yahoo_site_key]){?><meta name="y_key" content="<?php echo $_sys[yahoo_site_key];?>" /><?php } ?>
<?php if($_sys[ms_site_validate]){?><meta name="msvalidate.01" content="<?php echo $_sys[ms_site_validate];?>" /><?php } ?>
<?php if($_sys[baidu_union_verify]){?><meta name="baidu_union_verify" content="<?php echo $_sys[baidu_union_verify];?>" /><?php } ?>
<meta name="keywords" content="<?php echo $_sys[keywords];?>,qinggan,phpok">
<meta name="description" content="<?php echo $_sys[description];?> - PHPOK.COM">
<script type="text/javascript">
var base_file = "<?php echo HOME_PAGE;?>";
var base_url = "<?php echo $sys_app->url;?>";
var base_ctrl = "<?php echo $sys_app->config->c;?>";
var base_func = "<?php echo $sys_app->config->f;?>";
var base_dir = "<?php echo $sys_app->config->d;?>";
var phpok_data = "";
var iframe_id = "";
</script>
<?php if($_sys[siteurl] && $_sys[site_type] == 'html'){?><base href="<?php echo $_sys[siteurl];?>" /><?php } ?>
<link rel="stylesheet" type="text/css" href="tpl/www/images/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/www.js"></script>
<?php if($sys_app->control_name && file_exists(ROOT."js/www/".$sys_app->control_name.".js")){?>
<script type="text/javascript" src="js/www/<?php echo $sys_app->control_name;?>.js"></script>
<?php } ?>
</head>

<body>
<div class="header">
	<div class="logo"><img src="<?php echo $_sys[logo] ? $_sys[logo] : 'tpl/www/images/logo.jpg';?>" alt="<?php echo $_sys[sitename];?>" /></div>
	<ul class="menu">
		<?php $menulist = phpok_menu($id,$cid,$mid);?>
		<?php $_i=0;$menulist=(is_array($menulist))?$menulist:array();foreach($menulist AS  $key=>$value){$_i++; ?>
		<li<?php if($value[my_highlight]){?> class="li_a"<?php } ?>><a href="<?php echo $value[link];?>"<?php if($value[target]){?> target="_blank"<?php } ?> title="<?php echo $value[note] ? $value[note] : $value[title];?>"><?php echo $value[title];?></a></li>
		<?php } ?>
		<?php unset($menulist);?>
	</ul>
	<div class="clear"></div>
</div>