<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("header","","0");?>
<div class="notice"><div class="p">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td><span class="lead">&nbsp;&raquo; <a href="<?php echo site_url('user');?>">会员管理</a> &raquo; 添加/编辑信息</span></td>
	</tr>
	</table>
</div></div>

<form method="post" action="<?php echo site_url('user,setok');?>id=<?php echo $id;?>" onsubmit="return to_submit();">
<div class="table">
	<div class="left"><span class="red">*</span> 会员组：</div>
	<select name="groupid" id="groupid" onchange="direct('<?php echo site_url('user,set');?>id=<?php echo $id;?>&groupid='+this.value);">
		<?php $_i=0;$grouplist=(is_array($grouplist))?$grouplist:array();foreach($grouplist AS  $key=>$value){$_i++; ?>
		<option value="<?php echo $value[id];?>"<?php if($value[id] == $groupid){?> selected<?php } ?>><?php echo $value[title];?><?php if($value[group_type] == "guest"){?>【游客组】<?php } ?></option>
		<?php } ?>
	</select>
	<span class="clue_on"> 注意，不要选择游客组，游客组仅限来访者权限</span>
</div>

<div class="table">
	<div class="left">前台显示：</div>
	<select name="ifshow" id="ifshow">
		<option value="0">不限</option>
		<option value="1"<?php if($rs[ifshow] == 1){?> selected<?php } ?>>显示</option>
		<option value="2"<?php if($rs[ifshow] == 2){?> selected<?php } ?>>隐藏</option>
	</select>
	<span class="clue_on"> 启用“不限”时将由会员组决定是否显示会员信息。</span>
</div>

<div class="table">
	<div class="left"><span class="red">*</span> 会员名：</div>
	<input type="text" name="name" id="name" value="<?php echo $rs[name];?>">
</div>

<input type="hidden" name="thumb_id" id="thumb_id" value="<?php echo $rs[thumb_id];?>">
<div class="table">
	<div class="left">
		<div style="padding-bottom:3px;">会员头像：</div>
		<div style="padding-bottom:3px;"><input type="button" class="btn2" value="选择" onclick="phpjs_img('thumb_id','thumb_view');" /> &nbsp;</div>
		<input type="button" value="删除" class="btn2" onclick="phpjs_clear_img('thumb_id','thumb_view')" /> &nbsp;
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td align="left" id="thumb_view"><?php if($rs[picture]){?><img src="<?php echo $rs[picture];?>" width="80px" height="80px" border="0" /><?php }else{ ?><img src="./app/admin/view/images/nopic.gif" border="0" /><?php } ?></td>
	</tr>
	</table>
</div>

<div class="table">
	<div class="left"><?php if(!$id){?><span class="red">*</span> <?php } ?>密码：</div>
	<input type="text" name="pass" id="pass" value="">
	<span class="clue_on"> <?php if($id){?>不修改密码请保留为空<?php }else{ ?>请填写密码<?php } ?></span>
</div>

<div class="table">
	<div class="left"><span class="red">*</span> 邮箱：</div>
	<input type="text" name="email" id="email" value="<?php echo $rs[email];?>">
</div>

<div class="table">
	<div class="left">注册时间：</div>
	<input type="text" name="regdate" id="regdate" onfocus="show_date('regdate')" value="<?php echo $rs[regdate] ? date('Y-m-d H:i',$rs[regdate]) : date('Y-m-d H:i',$sys_app->system_time);?>">
</div>

<?php $_i=0;$extlist_must=(is_array($extlist_must))?$extlist_must:array();foreach($extlist_must AS  $key=>$value){$_i++; ?>
<?php echo $value;?>
<?php } ?>



<div class="table">
	<div class="left">&nbsp;</div>
	<input type="submit" class="btn3" id="_phpok_submit" name="article_submit" value=" 提交 ">
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
	var name = getid("name").value;
	if(!name)
	{
		alert("会员名不允许为空");
		getid("name").focus();
		return false;
	}
	var email = getid("email").value;
	if(!email)
	{
		alert("邮箱不允许为空");
		getid("email").focus();
		return false;
	}
	<?php if(!$id){?>
	var pass = getid("pass").value;
	if(!pass)
	{
		alert("密码不允许为空");
		getid("pass").focus();
		return false;
	}
	<?php } ?>
	<?php $_i=0;$extlist=(is_array($extlist))?$extlist:array();foreach($extlist AS  $key=>$value){$_i++; ?>
	<?php if($value[if_must] && $value[input] != "radio" && $value[input] != "checkbox"){?>
		<?php if($value[input] != "edit"){?>
		var <?php echo $value[identifier];?> = getid("<?php echo $value[identifier];?>").value;
		<?php }else{ ?>
		var oEditor_<?php echo $value[identifier];?> = FCKeditorAPI.GetInstance('<?php echo $value[identifier];?>');
		var <?php echo $value[identifier];?> = oEditor_<?php echo $value[identifier];?>.GetXHTML(true);
		<?php } ?>
		if(!<?php echo $value[identifier];?>)
		{
			alert("<?php echo $value['error_note'] ? $value['error_note'] : '所有加红色星号信息均必须填写';?>");
			tab_set("main");
			return false;
		}
	<?php } ?>
	<?php } ?>

	//通过Ajax检测会员账号和邮箱是否重复
	var url = "<?php echo site_url('user,chk');?>id=<?php echo $id;?>&email="+EncodeUtf8(email)+"&name="+EncodeUtf8(name);
	var msg = get_ajax(url);
	if(!msg) msg = "error: 检测失败";
	if(msg != "ok")
	{
		alert(msg);
		return false;
	}
	getid("_phpok_submit").disabled = true;
}
</script>
<?php $APP->tpl->p("footer","","0");?>