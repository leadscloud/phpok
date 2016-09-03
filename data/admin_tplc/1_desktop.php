<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_lang[cp_name];?> - Phpok.Com</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="./app/admin/view/images/desktop.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/phpok.js"></script>
		<script type="text/javascript" src="js/desktop.js"></script>
		<script type="text/javascript" src="js/smart-menu.js"></script>
		<script type="text/javascript" src="js/jquery.str.js"></script>

		<script type="text/javascript">
		var base_file = "<?php echo HOME_PAGE;?>";
		var base_url = "<?php echo $sys_app->url;?>";
		var base_ctrl = "<?php echo $sys_app->config->c;?>";
		var base_func = "<?php echo $sys_app->config->f;?>";
		var base_dir = "<?php echo $sys_app->config->d;?>";
		var phpok_data = "";
		$(document).ready(function(){
			$.phpok.init({
				"js_path": "js/",
				"lang_id": "cn",
				"ajax_file": "<?php echo HOME_PAGE;?>",
				"trigger_c"	:"<?php echo $sys_app->config->c;?>",
				"trigger_f"	:"<?php echo $sys_app->config->f;?>",
				"trigger_d"	:"<?php echo $sys_app->config->d;?>"
			});
			$.desktop.init({"img_path":"./app/admin/view/images/desktop/","js_path":"js"});
			$.desktop.load_bg();
			//加载初始首页设置，允许关闭
			$.desktop.win({"title": "后台首页","btn_max": true,"btn_close": true,"btn_min": true,"drag": true,"iframe_url": "<?php echo site_url('home');?>"});
			//加载桌面图片
			$.desktop.quick_icons();
			$("#listmenu ul li").hover(function(){
				//$(this).children("ul").show();
				$(this).addClass("p_hover");
			},function(){
				//$(this).children("ul").hide();
				$(this).removeClass("p_hover");
			});
		});
		function clear_cache()
		{
			var turl = base_file + "?"+base_func+"=clear_cache";
			var msg = $.ajax({url:turl,cache:false,async:false}).responseText;
			if(msg == "ok")
			{
				alert("缓存已清空！");
				return true;
			}
			else
			{
				if(!msg) msg = "error";
				alert(msg);
				return false;
			}
		}

		function change_langid(){
			var val = $("#select_langid").val();
			if(!val)
			{
				alert("请选择语言！");
				return false;
			}
			if(val == "<?php echo $_SESSION[sys_lang_id];?>")
			{
				change_lang();
				return false;
			}
			var qc = confirm("确定要切换语言吗？");
			if(qc == "0"){
				return false;
			}
			//
			window.location.href = "<?php echo site_url('index,chang_langid','','&');?>langid="+val;
		}

		function change_lang()
		{
			if($("#lang_change").is(":hidden"))
			{
				$("#lang_change").show();
				$("#lang_change_old").hide();
			}
			else
			{
				$("#lang_change").hide();
				$("#lang_change_old").show();
			}
		}
		</script>
	</head>
	<body>
		<div id="desktop_startmenu" class="desktop_startmenu">
			<div class="box">
				<h1>管理员：<span class="white"><?php echo $_SESSION[admin_name];?></span></h1>
				<div class="content">
					<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td valign="top">
							<div class="listmenu" id="listmenu">
								<ul class="menu">
									<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
									<li class="p"><img src="./app/admin/view/images/group/<?php echo $value[id];?>.png" border="0" alt="<?php echo $value[title];?>" align="absmiddle" /> &nbsp;<a class="p" id="listmenu_p_<?php echo $value[id];?>"><?php echo $value[title];?></a>
									<script type="text/javascript">
									var right_menu = [[
										{
											text:"编辑(E)",
											func:function(){
												$.desktop.win({"title": "<?php echo $value[title];?>","iframe_url": "<?php echo site_url('ctrl,gset');?>id=<?php echo $value[id];?>"});
											}
										}
									]];
									$("#listmenu_p_<?php echo $value[id];?>").smartMenu(right_menu, {name: "listmenu_p_<?php echo $value[id];?>"});
									right_menu = null;
									</script>
										<?php if($value[sonlist] && count($value[sonlist])>0 && is_array($value[sonlist])){?>
										<ul class="s">
											<?php $_i=0;$value[sonlist]=(is_array($value[sonlist]))?$value[sonlist]:array();foreach($value[sonlist] AS  $k=>$v){$_i++; ?>
											<li onclick="$.desktop.win({'title':'<?php echo $v[title];?>','iframe_url':'<?php echo $v[menu_url];?>'})" id="listmenu_s_<?php echo $v[id];?>"><a title="<?php echo $v[note] ? $v[note] : $v[title];?>"><?php echo $v[title];?></a></li>
											<script type="text/javascript">
											var right_menu = [[
												{
													text:"设为桌面快捷键",
													func:function(){
														$.phpok.shortcut_ajax($.str.encode('<?php echo $v[title];?>'),$.str.encode("{admin}?{c}=<?php echo $v[ctrl_init];?>&module_id=<?php echo $v[id];?>"));
													}
												},{
													text:"编辑(E)",
													func:function(){
														$.desktop.win({"title": "模块管理","iframe_url": "<?php echo site_url('ctrl,set');?>id=<?php echo $v[id];?>"});
													}
												}
											]];
											$("#listmenu_s_<?php echo $v[id];?>").smartMenu(right_menu, {name: "listmenu_s_<?php echo $v[id];?>"});
											right_menu = null;
											</script>

											<?php } ?>
										</ul>
										<?php } ?>
									</li>
									<?php } ?>
									<div class="clear"></div>
								</ul>
							</div>
						</td>
						<td valign="top">
							<table width="100%" height="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td>
									<div class="main">
										<ul>
											<li><a href="javascript:$.desktop.win({'title':'模块管理','iframe_url':'<?php echo site_url('ctrl');?>'});void(0);" class="ctrl">模块管理</a></li>
											<li><a href="javascript:$.phpok.admin_pass();void(0);" class="pass">密码修改</a></li>
											<li><a href="javascript:$.desktop.win({'title':'分类管理','iframe_url':'<?php echo site_url('cate');?>'});void(0);" class="cate">分类管理</a></li>
											<li><a href="javascript:$.desktop.win({'title':'快捷方式','iframe_url':'<?php echo site_url('hotlink');?>'});void(0);" class="link">快捷方式</a></li>
											<li id="lang_change_old"><img src="./app/admin/view/images/lang/<?php echo $_SESSION[sys_lang_id];?>.png" border="0" alt="<?php echo $lang_rs[title];?>" /> &nbsp; <?php echo $lang_rs[title];?> <span style="cursor:pointer;color:#fff;" onclick="change_lang()">[选择]</span></li>
											<li id="lang_change" style="display:none;">
											    <select id="select_langid" name="select_langid">
												    <?php $_i=0;$langlist=(is_array($langlist))?$langlist:array();foreach($langlist AS  $key=>$value){$_i++; ?>
													<option value="<?php echo $value[langid];?>"<?php if($_SESSION[sys_lang_id] == $value[langid]){?> selected<?php } ?>><?php echo $value[title];?></option>
													<?php } ?>
												</select>
												<div class="logout" style="cursor:pointer;" onclick="change_langid()">修改</div>
												<div height="26px" style="cursor:pointer;color:#fff;" onclick="change_lang()">[返回]</div>
											</li>
										</ul>
									</div>
								</td>
							</tr>
							<tr>
								<td height="42px" align="center"><div class="logout"><a href="javascript:$.phpok.logout();void(0);" title="退出">退出</a></div></td>
							</tr>
							</table>
						</td>
					</tr>
					</table>
				</div>
			</div>
		</div>
		<div id="desktop_taskbar" class="taskbar">
			<ul class='tablist'></ul>
			<div class='taskbar_tab' id='desktop_taskbar_tab' style="z-index:10000">
				<table width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td width="20px"><div></div></td>
					<?php $home_url = site_url('home');?>
					<td onclick="$.desktop.win({'title':'后台首页','iframe_url':'<?php echo $home_url;?>'});"><a title="PHPOK版权说明" class="phpok_copyright"></a></td>
					<td onclick="clear_cache();"><a title="清空缓存" class="phpok_clear"></a></td>
					<td><a title="网站首页" class="phpok_home" target="_blank" href="<?php echo HOME_WWW;?>"></a></td>
					<td onclick="$.desktop.show_desktop();"><a title="显示桌面" class="phpok_show_desktop"></a></td>
				</tr>
				</table>
			</div>
		</div>
		<div id="desktop_start" class="start" style="z-index:10010"><div onclick='$.phpok.start();' title='开始' class='btn'></div></div>
	</body>
</html>