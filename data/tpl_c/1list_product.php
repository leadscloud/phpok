<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("head","","0");?>
<div class="body">
	<div class="left">
		<?php $APP->tpl->p("inc/catelist","","0");?>
		<?php $APP->tpl->p("inc/usercp","","0");?>
		<?php $APP->tpl->p("inc/left","","0");?>
	</div>
	<div class="right">
		<div class="vmenu"><h3><?php echo $rs[cate_name];?></h3></div>
		<div class="box">
			<ul class="prolist">
			<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
			<li>
				<table width="100%" height="100%">
				<tr>
					<td class="img"><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><img src="<?php echo $value[picture];?>" border="0" alt="<?php echo $value[title];?>" /></a></td>
					<td valign="top">
						<div class="line1">名称：<a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>" style="<?php echo $value[style];?>"><?php echo $value[title];?></a> <a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><img src="tpl/www/images/info.gif" border="0" alt="<?php echo $value[title];?>" align="absmiddle" /></a></div>
						<div class="line2">编号：<strong><?php echo $value[pronum];?></strong></div>
						<div class="line2">规格：<?php echo $value[prostd];?></div>
						<?php if($value[price]>0){?><div class="line2">售价：<span class="red"><?php echo sys_format_price($value[price]);?></span> 元</div><?php } ?>
						<div class="note2"><?php echo $value[note];?></div>
					</td>
				</tr>
				</table>
			</li>
			<?php } ?>
			</ul>
			<?php $APP->tpl->p("inc/pagelist","","0");?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php $APP->tpl->p("foot","","0");?>