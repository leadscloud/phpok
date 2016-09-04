<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><div class="pagelist">
	<?php $_i=0;$pagelist=(is_array($pagelist))?$pagelist:array();foreach($pagelist AS  $key=>$value){$_i++; ?>
	<a href="<?php echo $value[url];?>"<?php if($value[status]){?> class="hover"<?php } ?>><?php echo $value[name];?></a>
	<?php } ?>
</div>