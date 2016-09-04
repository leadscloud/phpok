<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php if($cid){?>
<?php $_list = phpok("list","cid=".$cid);?>
<?php if($_list[rslist]){?>
<h3 class="title"><?php echo $_list[me][cate_name];?></h3>
<div class="content">
	<ul class="catelist">
		<?php $_i=0;$_list[rslist]=(is_array($_list[rslist]))?$_list[rslist]:array();foreach($_list[rslist] AS  $key=>$value){$_i++; ?>
		<li class="<?php echo $value[id] == $id ? 'parent_over' : 'parent';?>"><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><?php echo $value[title];?></a></li>
		<?php } ?>
	</ul>
</div>
<?php } ?>
<?php unset($_list);?>
<?php } ?>