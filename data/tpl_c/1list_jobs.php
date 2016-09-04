<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("head","","0");?>
<div class="body">
	<div class="left">
		<?php $APP->tpl->p("inc/catelist","","0");?>
		<?php $APP->tpl->p("inc/usercp","","0");?>
		<?php $APP->tpl->p("inc/left","","0");?>
	</div>
	<div class="right">
		<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
		<div class="vmenu"><h3>【<?php echo $m_rs[title];?>】<?php echo $value[title];?></h3><a href="<?php echo site_url('post,set');?>ms=apply&subject=<?php echo rawurlencode($value[title]);?>" target="_blank" class="apply">我要应聘</a></div>
		<div class="box">
			<table width="100%" cellspacing="0" cellpadding="0" class="itable">
			<tr>
				<td width="50%">招聘人数：<?php echo $value[jnum];?></td>
				<td>年龄要求：<?php echo $value[age];?></td>
			</tr>
			<tr>
				<td>工作经验：<?php echo $value[jy];?></td>
				<td>性别要求：<?php echo $value[sex];?></td>
			</tr>
			<tr>
				<td colspan="2">身高要求：<?php echo $value[hight];?></td>
			</tr>
			<tr>
				<td colspan="2">岗位说明：<?php echo $value[note];?></td>
			</tr>
			</table>
		</div>
		<?php } ?>
		<?php $APP->tpl->p("inc/pagelist","","0");?>
	</div>
	<div class="clear"></div>
</div>
<?php $APP->tpl->p("foot","","0");?>