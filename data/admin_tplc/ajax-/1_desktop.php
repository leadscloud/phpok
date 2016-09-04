<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $_i=0;$quick_links=(is_array($quick_links))?$quick_links:array();foreach($quick_links AS  $key=>$value){$_i++; ?>
<li quick_id="<?php echo $value[id];?>" quick_name="<?php echo $value[title];?>" quick_url="<?php echo $value[linkurl];?>&_hotid=<?php echo $value[id];?>">
	<div class="ico"><img src="./app/admin/view/images/ico/<?php echo $value[ico];?>" alt="<?php echo $value[title];?>" border="0" class="ie6png" width="48px" height="48px" /></div>
	<div class="txt"><?php echo $value[title];?></div>
</li>
<?php } ?>