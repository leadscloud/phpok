<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><div class="main">
<table width="100%" style="layout:fixed;" cellpadding="0" cellspacing="0">
<tr>
	<td class="t_sub" width="33px">&nbsp;</td>
	<td class="t_sub" width="30px">状态</td>
	<?php if($ifcate){?>
	<td class="t_sub" width="120px">主分类</td>
	<?php } ?>
	<td class="t_sub"><?php echo $m_rs[title_nickname] ? $m_rs[title_nickname] : '主题';?></td>
	<?php if($m_rs[if_biz]){?>
		<td class="t_sub" width="150px">售价</td>
	<?php } ?>
	<?php $_i=0;$mlist=(is_array($mlist))?$mlist:array();foreach($mlist AS  $key=>$value){$_i++; ?>
		<td class="t_sub"><?php echo $value;?></td>
	<?php } ?>
	<td class="t_sub" width="120px">发布时间</td>
	<td class="t_sub" width="50px">排序</td>
	<td class="t_sub" width="<?php echo $m_rs[if_reply] ? '65' : '45';?>px">操作</td>
</tr>
<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
<tr class="tr_out" onMouseOver="over_tr(this)" onMouseOut="out_tr(this)" id="list_<?php echo $m_rs[id];?>_<?php echo $value[id];?>">
	<td align='center' class="tc_left"><input type="checkbox" value="<?php echo $value[id];?>" /></td>
	<td align="center" class="tc_right" id="status_<?php echo $value[id];?>"><a href="javascript:status(<?php echo $value[id];?>,<?php echo intval($value[status]);?>);void(0);" class="status<?php echo intval($value[status]);?>"></a></td>
	<?php if($ifcate){?>
	<td align="center" class="tc_right"><?php echo $value[cate_name] ? $value[cate_name] : '-';?></td>
	<?php } ?>
	<td align='left' class="tc_right">
		<div style="padding:2px 5px;">
			【<?php echo $value[id];?>】
			<span class="tips" style="<?php echo $value[style];?>" title="<?php echo $value[title];?>" rel="<?php echo site_url('list,ajax');?>id=<?php echo $value[id];?>"><?php echo $value[title];?></span>
			<?php if($value[thumb]){?><a href="javascript:phpjs_preview('<?php echo $value[thumb_id];?>');void(0);"><span class="darkred">【图片】</span></a><?php } ?>
			<?php if($value[istop]){?> <span class="red">[顶]</span><?php } ?>
			<?php if($value[isvouch]){?> <span class="darkblue">[荐]</span><?php } ?>
			<?php if($value[isbest]){?> <span class="darkred">[精]</span><?php } ?>
			<?php if($value[identifier]){?><span class="clue_on">【<?php echo $value[identifier];?>】</span><?php } ?>
		</div>
	</td>
	<?php if($m_rs[if_biz]){?>
		<td align="center" class="tc_right"><?php if($value[price]){?><?php echo sys_format_price($value[price],$value[price_currency]);?><?php }else{ ?>未设定<?php } ?></td>
	<?php } ?>
	<?php $_i=0;$mlist=(is_array($mlist))?$mlist:array();foreach($mlist AS  $k=>$v){$_i++; ?>
		<td  align="center" class="tc_right"><?php echo $value[$k];?></td>
	<?php } ?>
	<td  align="center" class="tc_right"><?php echo date('Y-m-d H:i',$value[post_date]);?></td>
	<td  align="center" class="tc_right"><input type="text" class="center" style="width:40px;" id="taxis_<?php echo $value[id];?>" value="<?php echo $value[taxis];?>" /></td>
	<td align="center" class="tc_right">
		<?php if($m_rs[if_reply]){?><a href="<?php echo site_url('reply');?>tid=<?php echo $value[id];?>" class="btn reply" title="留言"></a><?php } ?>
		<a href="<?php echo site_url('list,set');?>id=<?php echo $value[id];?>" class="btn edit" title="编辑"></a>
		<a href="javascript:del(<?php echo $value['id'];?>);void(0);" class="btn del" title="删除"></a>
	</td>
</tr>
<script type="text/javascript">
var right_menu = [[
	{
		text:"设为快捷键",
		func:function(){
			parent.$.phpok.shortcut_ajax($.str.encode('<?php echo $value[title];?>'),$.str.encode("{admin}?{c}=list&{f}=set&id=<?php echo $value[id];?>"));
		}
	},{
		text:"编辑(E)",
		func:function(){
			direct("<?php echo site_url('list,set');?>id=<?php echo $value[id];?>");
		}
	},{
		text:"删除(D)",
		func:function(){
			del("<?php echo $value['id'];?>");
		}
	}
]];
$("#list_<?php echo $m_rs[id];?>_<?php echo $value[id];?>").smartMenu(right_menu, {name: "list_<?php echo $m_rs[id];?>_<?php echo $value[id];?>"});
right_menu = null;
</script>
<?php } ?>
</table>
</div>
<script type="text/javascript">
/* 自定义提示 */
$.include("js/cluetip/jquery.cluetip.css");
$.include("js/cluetip/jquery.cluetip.all.min.js",function(){
	$(".tips").cluetip({
		width: 400
	});
});
</script>