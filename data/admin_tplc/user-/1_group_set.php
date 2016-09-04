<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("header","","0");?>
<div class="notice"><div class="p">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td><span class="lead">&nbsp;&raquo; <a href="<?php echo site_url('usergroup');?>">会员组管理</a> &raquo; 添加/编辑信息</span></td>
	</tr>
	</table>
</div></div>

<form method="post" action="<?php echo site_url('usergroup,setok');?>id=<?php echo $id;?>" onsubmit="return to_submit();">
<div class="table">
	<div class="left"><span class="red">*</span> 组名称：</div>
	<input type="text" name="title" id="title" value="<?php echo $rs[title];?>">
</div>
<div class="table">
	<div class="left">权限设置：</div>
	<span class="clue_on" height="25px">请按钮Ctrl键进行多选，除阅读权限可设置“全部”外，其他均须手动设置</span>
</div>

<div class="table">
	<div class="left">发布：</div>
	<select name="popedom_post[]" multiple style="width:300px;height:150px;">
		<?php if($modulelist){?>
		<optgroup label="模块">
			<?php $_i=0;$modulelist=(is_array($modulelist))?$modulelist:array();foreach($modulelist AS  $key=>$value){$_i++; ?>
			<option value="m:<?php echo $value[id];?>"<?php if(in_array('m:'.$value[id],$p_post)){?> selected<?php } ?>><?php echo $value[title];?></option>
			<?php } ?>
		</optgroup>
		<?php } ?>
		<?php if($catelist){?>
		<optgroup label="分类">
			<?php $_i=0;$catelist=(is_array($catelist))?$catelist:array();foreach($catelist AS  $key=>$value){$_i++; ?>
			<option value="c:<?php echo $value[id];?>"<?php if(in_array('c:'.$value[id],$p_post)){?> selected<?php } ?>><?php echo $value[space];?><?php echo $value[cate_name];?></option>
			<?php } ?>
		</optgroup>
		<?php } ?>
	</select>
</div>

<div class="table">
	<div class="left">回复：</div>
	<select name="popedom_reply[]" multiple style="width:300px;height:150px;">
		<?php if($modulelist){?>
		<optgroup label="模块">
			<?php $_i=0;$modulelist=(is_array($modulelist))?$modulelist:array();foreach($modulelist AS  $key=>$value){$_i++; ?>
			<option value="m:<?php echo $value[id];?>"<?php if(in_array('m:'.$value[id],$p_reply)){?> selected<?php } ?>><?php echo $value[title];?></option>
			<?php } ?>
		</optgroup>
		<?php } ?>
		<?php if($catelist){?>
		<optgroup label="分类">
			<?php $_i=0;$catelist=(is_array($catelist))?$catelist:array();foreach($catelist AS  $key=>$value){$_i++; ?>
			<option value="c:<?php echo $value[id];?>"<?php if(in_array('c:'.$value[id],$p_reply)){?> selected<?php } ?>><?php echo $value[space];?><?php echo $value[cate_name];?></option>
			<?php } ?>
		</optgroup>
		<?php } ?>
	</select>
</div>

<div class="table">
	<div class="left">阅读：</div>
	<select name="popedom_read[]" multiple style="width:300px;height:150px;">
		<option value="all"<?php if(in_array('all',$p_read)){?> selected<?php } ?>>全部</option>
		<?php if($modulelist){?>
		<optgroup label="模块">
			<?php $_i=0;$modulelist=(is_array($modulelist))?$modulelist:array();foreach($modulelist AS  $key=>$value){$_i++; ?>
			<option value="m:<?php echo $value[id];?>"<?php if(in_array('m:'.$value[id],$p_read)){?> selected<?php } ?>><?php echo $value[title];?></option>
			<?php } ?>
		</optgroup>
		<?php } ?>
		<?php if($catelist){?>
		<optgroup label="分类">
			<?php $_i=0;$catelist=(is_array($catelist))?$catelist:array();foreach($catelist AS  $key=>$value){$_i++; ?>
			<option value="c:<?php echo $value[id];?>"<?php if(in_array('c:'.$value[id],$p_read)){?> selected<?php } ?>><?php echo $value[space];?><?php echo $value[cate_name];?></option>
			<?php } ?>
		</optgroup>
		<?php } ?>
	</select>
</div>

<div class="table">
	<div class="left">免审核：</div>
	<table>
	<tr>
		<td><input type="checkbox" id="post_cert" name="post_cert"<?php if($rs[post_cert]){?> checked<?php } ?> /></td>
		<td>发布&nbsp; &nbsp;</td>
		<td><input type="checkbox" id="reply_cert" name="reply_cert"<?php if($rs[reply_cert]){?> checked<?php } ?> /></td>
		<td>回复&nbsp; &nbsp;</td>
	</tr>
	</table>
</div>

<div class="table">
	<div class="left">前台显示：</div>
	<table>
	<tr>
		<td><input type="checkbox" id="ifshow" name="ifshow"<?php if($rs[ifshow]){?> checked<?php } ?> <?php if($rs[group_type] == 'guest'){?> disabled<?php } ?> /></td>
		<td>允许&nbsp; &nbsp;</td>
		<td class="clue_on">不启用显示，请将勾去掉！<?php if($rs[group_type] == 'guest'){?> <span class="red"> 游客组不支持</span><?php } ?></td>
	</tr>
	</table>
</div>


<div class="table">
	<div class="left">&nbsp;</div>
	<input type="submit" class="btn3" id="_phpok_submit" name="article_submit" value=" 提交 ">
</div>

</form>

<script type="text/javascript">
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