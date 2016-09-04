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
			<ul class="picture">
			<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
			<li>
				<div><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><img src="<?php echo $value[picture];?>" border="0" alt="<?php echo $value[title];?>" /></a></div>
				<div><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><?php echo sys_cutstring($value[title],17);?></a></div>
			</li>
			<?php } ?>
			</ul>
			<div class="clear line"></div>
			<?php $APP->tpl->p("inc/pagelist","","0");?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php $APP->tpl->p("foot","","0");?>