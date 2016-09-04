<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $notice = phpok("notice");?>
<?php if($notice[rslist]){?>
<h3 class="title"><?php echo $notice[me][title];?></h3>
<div class="content">
	<div id="notice_marquee">
		<?php $_i=0;$notice[rslist]=(is_array($notice[rslist]))?$notice[rslist]:array();foreach($notice[rslist] AS  $key=>$value){$_i++; ?>
		<h3><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><?php echo $value[title];?></a></h3>
		<div class="msg"><?php echo $value[note];?></div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">new Marquee("notice_marquee","top",null,226,150,null,null,600);</script>
<?php } ?>
<?php unset($notice);?>