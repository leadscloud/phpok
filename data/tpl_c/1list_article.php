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
			<ul class="newslist">
			<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
			<li><span class="date"><?php echo date("Y-m-d",$value[post_date]);?>&nbsp;</span><a href="<?php echo msg_url($value);?>"<?php if($value[target]){?> target="_blank"<?php } ?> style="<?php echo $value[style];?>"><?php echo $value[title];?></a></li>
			<?php } ?>
			</ul>
			<?php $APP->tpl->p("inc/pagelist","","0");?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php $APP->tpl->p("foot","","0");?>