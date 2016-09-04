<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("head","","0");?>
<div class="body">
	<div class="left"><?php $APP->tpl->p("inc/list","","0");?><?php $APP->tpl->p("inc/left","","0");?></div>
	<div class="right">
		<div class="vmenu"><h3><?php echo $rs[title];?></h3></div>
		<div class="box pd5"><?php echo $rs[content];?></div>
	</div>
	<div class="clear"></div>
</div>
<?php $APP->tpl->p("foot","","0");?>