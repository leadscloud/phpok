<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("header","","0");?>
<div class="notice"><div class="p">
	<table width="100%">
	<tr>
		<td><span class="lead">&nbsp;&raquo; 添加/修改模块</span></td>
		<td align="right"><a href="<?php echo site_url('ctrl');?>" class="button">返回模块列表</a></td>
	</tr>
	</table>
</div></div>
<form method="post" action="<?php echo site_url('ctrl,setok');?>id=<?php echo $id;?>" onsubmit="return chk('<?php echo $id;?>');">
<div id="layout_setting" style="display:none;">
	<table width="99%">
	<tr>
		<th colspan="3">核心字段：</th>
	</tr>
	<tr>
		<td width="33%">
			<table>
			<tr>
				<td><input type="checkbox" name="layout[]" value="subtitle"<?php if(in_array('subtitle',$layout)){?> checked<?php } ?> /></td>
				<td>副主题</td>
			</tr>
			</table>
		</td>
		<td>
			<table>
			<tr>
				<td><input type="checkbox" name="layout[]" value="author"<?php if(in_array('author',$layout)){?> checked<?php } ?> /></td>
				<td>发布人</td>
			</tr>
			</table>
		</td>
		<td>
			<table>
			<tr>
				<td><input type="checkbox" name="layout[]" value="link_url"<?php if(in_array('link_url',$layout)){?> checked<?php } ?> /></td>
				<td>链接地址</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table>
			<tr>
				<td><input type="checkbox" name="layout[]" value="hits"<?php if(in_array('hits',$layout) || !$id){?> checked<?php } ?> /></td>
				<td>查看次数</td>
			</tr>
			</table>
		</td>
		<td>
			<table>
			<tr>
				<td><input type="checkbox" name="layout[]" value="good_hits"<?php if(in_array('good_hits',$layout)){?> checked<?php } ?> /></td>
				<td>好评</td>
			</tr>
			</table>
		</td>
		<td>
			<table>
			<tr>
				<td><input type="checkbox" name="layout[]" value="good_hits"<?php if(in_array('good_hits',$layout)){?> checked<?php } ?> /></td>
				<td>差评</td>
			</tr>
			</table>
		</td>
	</tr>
	<?php if($keylist && count($keylist)>0){?>
	<tr>
		<th colspan="3">扩展字段：</th>
	</tr>
	<tr>
		<th colspan="3"><div style="padding-left:25px;">扩展字段在后台调用的数据<span class="red">未执行格式化操作，只显示存储的值</span></div></th>
	</tr>
	<tr>
		<?php $_i=0;$keylist=(is_array($keylist))?$keylist:array();foreach($keylist AS  $key=>$value){$_i++; ?>
		<td>
			<table>
			<tr>
				<td><input type="checkbox" name="layout[]" value="<?php echo $value[identifier];?>"<?php if(in_array($value[identifier],$layout)){?> checked<?php } ?> /></td>
				<td><?php echo $value[title];?></td>
			</tr>
			</table>
		</td>
		<?php if($_i%3===0){echo '</tr><tr>';}?>
		<?php } ?>
	</tr>
	<?php } ?>
	</table>
	<div align="center"><input type="button" class="btn3" value="提交" onclick="Layer.over();"></div>
</div>

<div class="table">
	<div class="left"><span class="red">*</span> 模块名：</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td><input type="text" id="title" name="title" value="<?php echo $rs[title];?>" /></td>
		<td>&nbsp;</td>
		<td><input type="checkbox" name="if_hidden"<?php if($rs[if_hidden]){?> checked<?php } ?>></td>
		<td class="clue_on">&nbsp;不打算在导航中体现，请打上勾</td>
	</tr>
	</table>
</div>
<div class="table">
	<div class="left"><span class="red">*</span> 所属模块组：</div>
	<select name="group_id" id="group_id">
	<option value="0">全部组</option>
	<?php $_i=0;$group_list=(is_array($group_list))?$group_list:array();foreach($group_list AS  $key=>$value){$_i++; ?>
	<?php if(!$value[js_function]){?>
	<option value="<?php echo $value[id];?>"<?php if($rs[group_id] == $value[id]){?> selected<?php } ?>><?php echo $value[title];?></option>
	<?php } ?>
	<?php } ?>
	</select>
</div>
<div class="table">
	<div class="left"><span class="red">*</span> 唯一标识：</div>
	<input type="text" id="identifier" name="identifier" value="<?php echo $rs[identifier];?>" class="short_input" <?php if($id){?> disabled<?php } ?> />
	<span class="clue_on"> 唯一标识不允许为空，仅限<span class="red">小写字母，不要超过8位</span></span>
</div>
<div class="table">
	<div class="left">模块备注：</div>
	<input type="text" id="note" name="note" class="long_input" value="<?php echo $rs[note];?>" />
	<span class="clue_on">简单说明这个模块做什么，限后台使用，不超过80字</span>
</div>
<?php if(!$id){?>
<div class="table">
	<div class="left"><span class="red">*</span> 控制层：</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td><input type="radio" name="ctrl_init" value="list" id="ctrl_init_list"  onclick="ctrl_set('list')"></td>
		<td>&nbsp;内容管理&nbsp;</td>
		<td><input type="radio" name="ctrl_init" value="" id="ctrl_init_user" onclick="ctrl_set('user')"></td>
		<td>&nbsp;自定义&nbsp;</td>
		<td id="ctrl_init_input"><input type="text" name="ctrl_init_val" value="<?php echo $rs[ctrl_init];?>" class="short_input" id="ctrl_init_val"></td>
		<td class="clue_on">&nbsp;自定义时请填写app/control/目录下的文件名（不含.php）</td>
	</tr>
	</table>
</div>
<?php }else{ ?>
<div class="table">
	<div class="left"><span class="red">*</span> 控制层：</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td><input type="radio" name="ctrl_init" value="list" id="ctrl_init_list" disabled></td>
		<td>&nbsp;内容管理&nbsp;</td>
		<td><input type="radio" name="ctrl_init" value="" id="ctrl_init_user" disabled></td>
		<td>&nbsp;自定义&nbsp;</td>
		<td id="ctrl_init_input"><input type="text" name="ctrl_init_val" value="<?php echo $rs[ctrl_init];?>" class="short_input" id="ctrl_init_val" disabled></td>
		<td class="clue_on">&nbsp;自定义时请填写app/control/目录下的文件名（不含.php）</td>
	</tr>
	</table>
</div>
<?php } ?>
<div id="content_set">
	<div class="table">
		<div class="left">后台布局：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="tplset" value="list"<?php if(!$rs[tplset] || $rs[tplset] == 'list'){?> checked<?php } ?>></td>
			<td>&nbsp;列表&nbsp;</td>
			<td><input type="radio" name="tplset" value="pic"<?php if($rs[tplset] == 'pic'){?> checked<?php } ?>></td>
			<td>&nbsp;图文&nbsp;</td>
			<td><input type="button" value="定制布局" onclick="Layer.inline('layout_setting',500,400);" class="btn4" /></td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">分类功能：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_cate" value="1"<?php if($rs[if_cate]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="radio" name="if_cate" value="0"<?php if(!$rs[if_cate]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持&nbsp;</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">默认分页数：</div>
		<input type="text" name="psize" id="psize" value="<?php echo $rs[psize] ? $rs[psize] : '30';?>" class="short_input">
		<span class="clue_on"> 最大不超过 255，0为不分页</span>
	</div>

	<input type="hidden" id="if_point" name="if_point" value="0" />

	<div class="table">
		<div class="left">搜索定制：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="insearch" value="1"<?php if($rs[insearch]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="radio" name="insearch" value="0"<?php if(!$rs[insearch]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">列表页：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_list" value="1"<?php if($rs[if_list]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="checkbox" id="if_content" name="if_content"<?php if($rs[if_content]){?> checked<?php } ?> /></td>
			<td>&nbsp;读内容，&nbsp;</td>
			<td><input type="radio" name="if_list" value="0"<?php if(!$rs[if_list]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持&nbsp; <span class="clue_on">不使用列表功能，将跳转到内容页</span></td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">内容页：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_msg" value="1"<?php if($rs[if_msg]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="radio" name="if_msg" value="0"<?php if(!$rs[if_msg]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持&nbsp; <span class="clue_on">不使用列表及内容时，将提示错误</span></td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">图片关联：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><select name="if_thumb" id="if_thumb">
				<option value="0">不支持</option>
				<option value="1"<?php if($rs[if_thumb] == 1 && !$rs[if_thumb_m]){?> selected<?php } ?>>支持</option>
				<option value="2"<?php if($rs[if_thumb] == 1 && $rs[if_thumb_m]){?> selected<?php } ?>>支持且必填</option>
			</select></td>
			<td>&nbsp;默认读取：</td>
			<td><select name="inpic" id="inpic">
				<option value="">原图</option>
				<?php $_i=0;$gdlist=(is_array($gdlist))?$gdlist:array();foreach($gdlist AS  $key=>$value){$_i++; ?>
				<option value="<?php echo $value[pictype];?>"<?php if($rs[inpic] == $value[pictype]){?> selected<?php } ?>>关联：<?php echo $value[picsubject];?></option>
				<?php } ?>
			</select></td>
			<td class="clue_on">&nbsp;不支持缩略图的模块，此参数无效</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">主题别称：</div>
		<input type="text" id="title_nickname" name="title_nickname" value="<?php echo $rs[title_nickname];?>" />
		<span class="clue_on">根据需要自定义副主题别称，不要加冒号，下同</span>
	</div>

	<div class="table">
		<div class="left">副标题：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_subtitle" value="1"<?php if($rs[if_subtitle]){?> checked<?php } ?>></td>
			<td>&nbsp;使用&nbsp;</td>
			<td><input type="radio" name="if_subtitle" value="0"<?php if(!$rs[if_subtitle]){?> checked<?php } ?>></td>
			<td>&nbsp;禁用&nbsp;&nbsp;别称：</td>
			<td><input type="text" id="subtitle_nickname" name="subtitle_nickname" value="<?php echo $rs[subtitle_nickname];?>" /></td>
			<td class="clue_on">&nbsp;根据需要自定义副标题别称</td>
		</tr>
		</table>
	</div>


	<div class="table">
		<div class="left">标识串：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_sign_m" value="1"<?php if($rs[if_sign_m]){?> checked<?php } ?>></td>
			<td>&nbsp;必填&nbsp;</td>
			<td><input type="radio" name="if_sign_m" value="0"<?php if(!$rs[if_sign_m]){?> checked<?php } ?>></td>
			<td>&nbsp;选填&nbsp;&nbsp;别称：</td>
			<td><input type="text" id="sign_nickname" name="sign_nickname" value="<?php echo $rs[sign_nickname];?>" />&nbsp;</td>
			<td class="clue_on">根据需要自定义标识串别称</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">&nbsp;</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="checkbox" name="lock_identifier"<?php if($rs[lock_identifier]){?> checked<?php } ?>></td>
			<td>&nbsp;启用锁定功能，请打上勾。<span class="clue_on">锁定后，编辑操作将不允许修改！此操作可避免客户误修改标识串</span></td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">扩展属性：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_propety" value="1"<?php if($rs[if_propety]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="radio" name="if_propety" value="0"<?php if(!$rs[if_propety]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持&nbsp;</td>
			<td class="clue_on"> 含：置顶、推荐、精华三个属性可选</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">可选扩展：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_ext" value="1"<?php if($rs[if_ext]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="radio" name="if_ext" value="0"<?php if(!$rs[if_ext]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持&nbsp;</td>
			<td class="clue_on"> 含：自定义标识串，自定义模板，SEO等常见信息</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">简要描述：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_des" value="1"<?php if($rs[if_des]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="radio" name="if_des" value="0"<?php if(!$rs[if_des]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持&nbsp;</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">电子商务：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_biz" value="1"<?php if($rs[if_biz]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="radio" name="if_biz" value="0"<?php if(!$rs[if_biz]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持&nbsp;</td>
			<td class="clue_on">启用此功能，将支持购物车等消费行为</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">外部网址：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><select name="if_url_m" id="if_url_m">
				<option value="0">不支持</option>
				<option value="1"<?php if($rs[if_url_m] == 1){?> selected<?php } ?>>支持</option>
				<option value="2"<?php if($rs[if_url_m] == 2){?> selected<?php } ?>>支持且必填</option>
			</select></td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">邮件通知：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="radio" name="if_email" value="1"<?php if($rs[if_email]){?> checked<?php } ?>></td>
			<td>&nbsp;支持&nbsp;</td>
			<td><input type="radio" name="if_email" value="0"<?php if(!$rs[if_email]){?> checked<?php } ?>></td>
			<td>&nbsp;不支持&nbsp;</td>
			<td class="clue_on">前台操作时将同时发送邮件通知管理员</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">模块图片：</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td class="clue_on" style="line-height:150%;">各类型图片在前台调用客户自行控制。注意这里只调用原图，请注意规格。</td>
		</tr>
		</table>
	</div>

	<div class="table">
		<div class="left">图标：</div>
		<input type="text" name="ico" id="ico" value="<?php echo $rs[ico];?>" class="long_input clue_on" readonly>
		<input type="button" class="btn2" value="选择" onclick="cate_select_pic('ico')">
		<input type="button" class="btn2" value="预览" onclick="cate_view_pic('ico')">
		<input type="button" class="btn2" value="清空" onclick="getid('ico').value=''">
	</div>

	<div class="table">
		<div class="left">小图：</div>
		<input type="text" name="small_pic" id="small_pic" value="<?php echo $rs[small_pic];?>" class="long_input clue_on" readonly>
		<input type="button" class="btn2" value="选择" onclick="cate_select_pic('small_pic')">
		<input type="button" class="btn2" value="预览" onclick="cate_view_pic('small_pic')">
		<input type="button" class="btn2" value="清空" onclick="getid('small_pic').value=''">
	</div>

	<div class="table">
		<div class="left">中图：</div>
		<input type="text" name="medium_pic" id="medium_pic" value="<?php echo $rs[medium_pic];?>" class="long_input clue_on" readonly>
		<input type="button" class="btn2" value="选择" onclick="cate_select_pic('medium_pic')">
		<input type="button" class="btn2" value="预览" onclick="cate_view_pic('medium_pic')">
		<input type="button" class="btn2" value="清空" onclick="getid('medium_pic').value=''">
	</div>

	<div class="table">
		<div class="left">大图：</div>
		<input type="text" name="big_pic" id="big_pic" value="<?php echo $rs[big_pic];?>" class="long_input clue_on" readonly>
		<input type="button" class="btn2" value="选择" onclick="cate_select_pic('big_pic')">
		<input type="button" class="btn2" value="预览" onclick="cate_view_pic('big_pic')">
		<input type="button" class="btn2" value="清空" onclick="getid('big_pic').value=''">
	</div>



</div>


<div class="table">
	<div class="left">权限：</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<?php $_i=0;$popedom_list=(is_array($popedom_list))?$popedom_list:array();foreach($popedom_list AS  $key=>$value){$_i++; ?>
		<td><input type="checkbox" name="popedom[]" value="<?php echo $value[id];?>"<?php if(in_array($value[id],$rs[popedom])){?> checked<?php } ?>>&nbsp;<?php echo $value[title];?> &nbsp;&nbsp;</td>
		<?php if($_i%5===0){echo '</tr><tr>';}?>
		<?php } ?>
	</tr>
	</table>
</div>
<div class="table">
	<div class="left">&nbsp;</div>
	<table>
	<tr>
		<td class="clue_on">在这里配置的权限将在管理员中体现，管理员可以根据自己的权限进行设权</td>
	</tr>
	</table>
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
var ctrl_init = "<?php echo $rs[ctrl_init];?>";
ctrl_set(ctrl_init);

function cate_select_pic(vid)
{
	var extend = "input="+vid;
	var url = get_url("open,img",extend);
	Layer.init(url,550,400);
	return true;
}

function cate_view_pic(vid)
{
	var url = getid(vid).value;
	if(!url)
	{
		alert("没有相关图片信息！");
		return false;
	}
	Layer.init(url,550,400);
	return true;
}

</script>

<?php $APP->tpl->p("footer","","0");?>