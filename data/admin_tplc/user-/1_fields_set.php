<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("header","","0");?>
<script type="text/javascript">
function if_must_set(val)
{
	if(val == '1')
	{
		getid("error_note_title").style.display = "";
		getid("if_must_1").checked = true;
	}
	else
	{
		getid("error_note_title").style.display = "none";
		getid("if_must_0").checked = true;
	}
}
function input_type(val)
{
	getid("input_width").style.display = "none";
	getid("input_height").style.display = "none";
	getid("input_defalt_val").style.display = "none";
	getid("input_list_val").style.display = "none";
	getid("input_link").style.display = "none";
	if(val == "text")
	{
		getid("input_width").style.display = "";
		getid("input_defalt_val").style.display = "";
	}
	else if(val == "opt")
	{
		getid("input_link").style.display = "";
	}
	else if(val == "textarea" || val == "edit")
	{
		getid("input_width").style.display = "";
		getid("input_height").style.display = "";
	}
	else if(val == "radio" || val == "checkbox" || val == "select")
	{
		getid("input_defalt_val").style.display = "";
		getid("input_list_val").style.display = "";
	}
}

function fields_chk(id)
{
	var title = getid("title").value;
	if(!title)
	{
		alert("字段名称不允许为空");
		return false;
	}
	//检测标识符是否符合要求
	if(id == "" || !id || id == "0")
	{
		var identifier = getid("identifier").value;
		if(!identifier || identifier == "")
		{
			alert("标识符为空");
			return false;
		}
		//判断内容
		var module_id = getid("groupid").value;
		if(!module_id || module_id == "0")
		{
			alert("会员组ID获取失败，请检查");
			return false;
		}
		var url = base_url + base_func + "=chk_identifier2&identifier="+identifier+"&groupid="+module_id;
		var msg = get_ajax(url);
		if(msg != "ok")
		{
			if(!msg) msg = "error: 操作错误";
			alert(msg);
			return false;
		}
		//判断控制类型
		var input_type = getid("input").value;
		if(!input_type || input_type == "")
		{
			alert("请选择有效的表单控件");
			return false;
		}
	}
	return true;
}

</script>
<div class="notice"><div class="p">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td><span class="lead">&nbsp;&raquo; 添加/修改字段</span></td>
		<td align="right"><a href="<?php echo site_url('usergroup,fields');?>id=<?php echo $groupid;?>" class="button">返回字段列表</a></td>
	</tr>
	</table>
</div></div>
<form method="post" action="<?php echo site_url('usergroup,fields_setok');?>id=<?php echo $id;?>" onsubmit="return fields_chk('<?php echo $id;?>');">
<input type="hidden" name="groupid" id="groupid" value="<?php echo $groupid;?>">
<div class="table">
	<div class="left"><span class="red">*</span> 标题：</div>
	<input type="text" id="title" name="title" value="<?php echo $rs[title];?>" />
</div>
<div class="table">
	<div class="left"><span class="red">*</span> 唯一标识：</div>
	<input type="text" id="identifier" name="identifier" value="<?php echo $rs[identifier];?>" class="short_input" <?php if($id){?> disabled<?php } ?> />
	<span class="clue_on"> 唯一标识不允许为空，<span class="red">不要超过8位</span></span>
</div>
<div class="table">
	<div class="left">左侧文字：</div>
	<input type="text" id="sub_left" name="sub_left" value="<?php echo $rs[sub_left];?>" />
	<span class="clue_on"> 用于左侧信息，为空使用标题</span>
</div>
<div class="table">
	<div class="left">右侧备注：</div>
	<input type="text" id="sub_note" name="sub_note" value="<?php echo $rs[sub_note];?>" class="long_input" />
	<span class="clue_on"> 简单说明这个模块做什么，仅限后台使用</span>
</div>
<div class="table">
	<div class="left"><span class="red">*</span> 表单控件：</div>
	<select name="input" id="input" onchange="input_type(this.value)"<?php if($id){?> disabled<?php } ?>>
	<option value="">请选择表单控件</option>
	<?php $_i=0;$input_list=(is_array($input_list))?$input_list:array();foreach($input_list AS  $key=>$value){$_i++; ?>
	<option value="<?php echo $key;?>"<?php if($key == $rs[input]){?> selected<?php } ?>><?php echo $value;?></option>
	<?php } ?>
	</select>
</div>
<div class="table" id="input_width">
	<div class="left">表单宽度：</div>
	<input type="text" id="width" name="width" value="<?php echo $rs[width];?>" class="short_input" />
	<span class="clue_on"> 宽度，示例：100px 或 98%</span>
</div>
<div class="table" id="input_height">
	<div class="left">表单高度：</div>
	<input type="text" id="height" name="height" value="<?php echo $rs[height];?>" class="short_input" />
	<span class="clue_on"> 高度，示例：100px 或 98%</span>
</div>
<div class="table" id="input_defalt_val">
	<div class="left">默认值：</div>
	<input type="text" id="default_val" name="default_val" value="<?php echo $rs[default_val];?>" />
	<span class="clue_on"> 设定一个默认值，仅限文本框、单选、复选及下拉表单中有效</span>
</div>
<div class="table" id="input_list_val">
	<div class="left">值列表：</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td><textarea id="list_val" name="list_val" style="width:300px;height:100px;"><?php echo $rs[list_val];?></textarea></td>
	</tr>
	<tr>
		<td style="padding-top:3px;">一行一个值，格式：<span class="red">值,显示值</span> 或是 <span class="red">值</span></td>
	</tr>
	</table>
</div>

<div class="table" id="input_link">
	<div class="left">联动组：</div>
	<select name="link_id" id="link_id">
		<option value="0">请选择…</option>
		<?php $_i=0;$datalink=(is_array($datalink))?$datalink:array();foreach($datalink AS  $key=>$value){$_i++; ?>
		<option value="<?php echo $value[id];?>"<?php if($value[id] == $rs[link_id]){?> selected<?php } ?>><?php echo $value[title];?></option>
		<?php } ?>
	</select>
</div>

<div class="table">
	<div class="left">必填：</div>
	<input type="radio" name="if_must" value="1" id="if_must_1" onclick="if_must_set('1')">
	支持 &nbsp; 
	<input type="radio" name="if_must" value="0" id="if_must_0" onclick="if_must_set('0')">
	不支持 &nbsp;
</div>

<div class="table" id="error_note_title">
	<div class="left">错误提示：</div>
	<input type="text" id="error_note" name="error_note" value="<?php echo $rs[error_note];?>" class="long_input" />
	<span class="clue_on"> 此字段有误或为空时弹出的提示信息</span>
</div>

<div class="table">
	<div class="left">排序：</div>
	<input type="text" id="taxis" name="taxis" value="<?php echo $rs[taxis] ? $rs[taxis] : '255';?>" class="short_input" />
	<span class="clue_on"> 值越小越往前靠</span>
</div>
<div class="table">
	<div class="left">&nbsp;</div>
	<input type="submit" value="提 交" class="btn3" />
	<br /><br />
</div>

</form>
<script type="text/javascript">
if_must_set("<?php echo $rs[if_must];?>");
input_type("<?php echo $rs[input];?>");
</script>

<?php $APP->tpl->p("footer","","0");?>