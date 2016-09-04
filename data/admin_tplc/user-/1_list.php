<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("header","","0");?>
<div class="notice"><div class="p">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td width="130px"><span class="lead">&nbsp;&raquo; 会员列表</span></td>
		<form method="post" action="<?php echo site_url('user','module_id='.$m_rs[id]);?>">
		<td align="left">
			搜索：<input type="text" name="keywords" id="keywords" value="<?php echo $keywords;?>">
			<input type="submit" class="btn2" value="查询">
		</td>
		</form>
		<td align="right"><a href="<?php echo site_url('user,set');?>module_id=<?php echo $m_rs[id];?>&" class="button">添加新会员</a></td>
	</tr>
	</table>
</div></div>

<div class="main">
<table width="100%" style="layout:fixed;" cellpadding="0" cellspacing="0">
<tr>
	<td class="t_sub" width="50px">ID</td>
	<td class="t_sub" width="35px">状态</td>
	<td class="t_sub">账号</td>
	<td class="t_sub">邮箱</td>
	<td class="t_sub" width="110px">注册时间</td>
	<td class="t_sub" width="65px">操作</td>
</tr>
<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
<tr class="tr_out" onMouseOver="over_tr(this)" onMouseOut="out_tr(this)">
	<td align='center' class="tc_left"><?php echo $value[id];?></td>
	<td align="center" class="tc_right" id="status_<?php echo $value['id'];?>"><a href="javascript:status(<?php echo $value[id];?>,<?php echo intval($value['status']);?>);void(0);" class="status<?php echo intval($value['status']);?>"></a></td>
	<td align='left' class="tc_right">&nbsp;<?php echo $value[name];?> <?php if($value[thumb_id]){?><a href="javascript:phpjs_preview(<?php echo $value[thumb_id];?>);void(0);"><span class="darkblue">【照片】</span></a><?php } ?><?php if($value[ifshow] == 1){?><span class="red">前台显示</span><?php } ?></td>
	<td align='left' class="tc_right">&nbsp;<?php echo $value[email];?></td>
	<td  align='center' class="tc_right"><?php echo date('Y-m-d H:i',$value[regdate]);?></td>
	<td align="center" class="tc_right">
		<a href="javascript:view(<?php echo $value[id];?>);void(0);" class="btn prev" title="查看"></a>
		<a href="<?php echo site_url('user,set');?>module_id=<?php echo $m_rs[id];?>&id=<?php echo $value[id];?>" class="btn edit" title="编辑"></a>
		<a href="javascript:del(<?php echo $value['id'];?>);void(0);" class="btn del" title="删除"></a>
	</td>
</tr>
<?php } ?>
</table>
</div>
<?php if($pagelist){?><div class="table"><?php echo $pagelist;?></div><?php } ?>
<script type="text/javascript">
function view(id)
{
	var url = "<?php echo site_url('user,view');?>id="+id;
	Layer.init(url,550,400);
}

function del(id)
{
	if(!id)
	{
		alert("操作非法");
		return false;
	}
	var q = confirm("确定要删除此信息吗？删除后是不能恢复的");
	if(q != 0)
	{
		var url = base_url + base_func + "=ajax_del&module_id=<?php echo $m_rs[id];?>&id="+id;
		var msg = get_ajax(url);
		if(!msg) msg = "error: 操作非法";
		if(msg == "ok")
		{
			direct(window.location.href);
		}
		else
		{
			alert(msg);
			return false;
		}
	}
}

//更改权限状态
function status(id,t)
{
	if(!id)
	{
		alert("操作非法");
		return false;
	}
	var url = base_url + base_func + "=ajax_status&module_id=<?php echo $m_rs[id];?>&id="+id;
	var msg = get_ajax(url);
	if(msg == "ok")
	{
		var n_t = t == 1 ? 0 : 1;
		$("#status_"+id+" > a").attr("class","status"+n_t);
		$("#status_"+id+" > a").attr("href","javascript:status("+id+","+n_t+");void(0)");
		return true;
	}
	else
	{
		if(!msg) msg = "error: 操作非法";
		alert(msg);
		return false;
	}
}
</script>
<?php $APP->tpl->p("footer","","0");?>