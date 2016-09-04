<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("head","","0");?>
<div class="body">
	<div class="left"><?php $APP->tpl->p("inc/usercp","","0");?><?php $APP->tpl->p("inc/left","","0");?></div>
	<div class="right">
		<div class="vmenu"><h3><?php echo $m_rs[title];?></h3></div>
		<div class="box pd5"><?php echo sys_post('book');?></div>
		<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
		<div class="vmenu"><h3><?php echo $value[title];?></h3></div>
		<div class="box pd5">
			<div class="content"><?php echo $value[content];?></div>
			<?php if($value[admreply]){?>
			<div class="reply"><span class="red">管理员于回复：</span><?php echo $value[admreply];?></div>
			<?php } ?>
		</div>
		<?php } ?>
		<?php $APP->tpl->p("inc/pagelist","","0");?>
	</div>
	<div class="clear"></div>
</div>
<?php $APP->tpl->p("foot","","0");?>