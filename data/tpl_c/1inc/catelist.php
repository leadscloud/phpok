<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php if($cid){?>
<?php $_catelist = phpok_catelist($cid);?>
<?php if($_catelist[rslist]){?>
<h3 class="title">相关分类</h3>
<div class="content">
	<ul class="catelist">
		<?php $_i=0;$_catelist[rslist]=(is_array($_catelist[rslist]))?$_catelist[rslist]:array();foreach($_catelist[rslist] AS  $key=>$value){$_i++; ?>
		<li class="<?php echo $value[id] == $cid ? 'parent_over' : 'parent';?>"><a href="<?php echo list_url($value);?>" title="<?php echo $value[cate_name];?>"><?php echo $value[cate_name];?></a></li>
			<?php $_i=0;$value[sonlist]=(is_array($value[sonlist]))?$value[sonlist]:array();foreach($value[sonlist] AS  $k=>$v){$_i++; ?>
			<li class="<?php echo $v[id] == $cid ? 'son_over' : 'son';?>"><a href="<?php echo list_url($v);?>" title="<?php echo $v[cate_name];?>">·<?php echo $v[cate_name];?></a></li>
			<?php } ?>
		<?php } ?>
	</ul>
</div>
<?php } ?>
<?php unset($_catelist);?>
<?php } ?>