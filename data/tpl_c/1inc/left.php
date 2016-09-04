<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $news = phpok("news");?>
<?php if($news[rslist]){?>
<h3 class="title"><?php echo $news[me][cate_name];?></h3>
<div class="content">
	<ul class="news">
		<?php $_i=0;$news[rslist]=(is_array($news[rslist]))?$news[rslist]:array();foreach($news[rslist] AS  $key=>$value){$_i++; ?>
		<li><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><?php echo sys_cutstring($value[title],30,'…');?></a></li>
		<?php } ?>
	</ul>
</div>
<?php } ?>
<?php unset($news);?>

<h3 class="title">站内搜索</h3>
<div class="content"><?php echo sys_search($mid,$cid,$keywords,$ext_keywords);?></div>


<?php $procate = phpok('procate');?>
<?php if($procate[rslist]){?>
<h3 class="title"><?php echo $procate[me][cate_name];?></h3>
<div class="content">
	<table width="100%">
	<tr>
		<?php $_i=0;$procate[rslist]=(is_array($procate[rslist]))?$procate[rslist]:array();foreach($procate[rslist] AS  $key=>$value){$_i++; ?>
		<td align="center"><a href="<?php echo list_url($value);?>" title="<?php echo $value[title];?>"><?php echo $value[cate_name];?></a></td>
		<?php if($_i%2===0){echo '</tr><tr>';}?>
		<?php } ?>
	</tr>
	</table>
</div>
<?php } ?>
<?php unset($procate);?>