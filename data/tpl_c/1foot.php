<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><div class="copyright">
	<?php $link = phpok("link");?>
	<?php if($link[rslist]){?>
	<div class="link">
		<h3><?php echo $link[me][title];?></h3>
		<span>
		<?php $_i=0;$link[rslist]=(is_array($link[rslist]))?$link[rslist]:array();foreach($link[rslist] AS  $key=>$value){$_i++; ?>
		<a href="<?php echo $value[link_url];?>" title="<?php echo $value[title];?>" target="_blank"><?php echo $value[title];?></a>
		<?php } ?>
		</span>
		<a href="<?php echo module_url($link[me]);?>" class="more">更多&gt;&gt;</a>
	</div>
	<?php } ?>
	<div class="bottom"><?php $copyright = phpok('copyright');?><?php echo $copyright[content];?><?php unset($copyright);?></div>
</div>
<?php $kflist = phpok('qq');?>
<?php if($kflist[rslist] && is_array($kflist[rslist]) && count($kflist[rslist])>0){?>
<script type="text/javascript">
if($.browser.msie && parseInt($.browser.version, 10) < 7)
{
	$(document).ready(function(){
		 $(window).scroll(function(){
			 $("#qqonline_float").css({top:$(this).scrollTop()+$(this).height()-500});
		 });
	});
}
</script>
<div id="qqonline_float">
	<div class="qq-top"></div>
	<div class="qq-list">
		<?php $_i=0;$kflist[rslist]=(is_array($kflist[rslist]))?$kflist[rslist]:array();foreach($kflist[rslist] AS  $key=>$value){$_i++; ?>
		<div class="myqq"><?php echo $value[kfcode];?></div>
		<?php } ?>
	</div>
	<div class="qq-bottom"></div>
</div>
<?php } ?>
<?php echo $plugin_html;?>
</body>
</html>