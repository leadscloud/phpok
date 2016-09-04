<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("head","","0");?>
<script type="text/javascript" src="js/msclass.js"></script>
<div class="body">
	<div class="left">
		<?php $APP->tpl->p("inc/notice","","0");?>
		<?php $APP->tpl->p("inc/usercp","","0");?>
		<?php $APP->tpl->p("inc/left","","0");?>
	</div>
	<div class="right">
		<div class="me">
			<?php $aboutus = phpok_msg("aboutus");?>
			<div class="aboutus">
				<h3><?php echo $aboutus[title];?></h3>
				<p><?php echo nl2br($aboutus[note]);?></p>
			</div>
			<div class="banner"><?php echo phpok_plugin('picplay');?></div>
		</div>
		<?php $hotpic = phpok("hotpic");?>
		<?php if($hotpic[rslist]){?>
		<div class="vmenu"><h3><?php echo $hotpic[me][cate_name];?></h3></div>
		<div class="box">
			<ul class="picture">
			<?php $_i=0;$hotpic[rslist]=(is_array($hotpic[rslist]))?$hotpic[rslist]:array();foreach($hotpic[rslist] AS  $key=>$value){$_i++; ?>
			<li>
				<div><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><img src="<?php echo $value[picture];?>" border="0" alt="<?php echo $value[title];?>" /></a></div>
				<div><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><?php echo sys_cutstring($value[title],17);?></a></div>
			</li>
			<?php } ?>
			</ul>
			<div class="clear line"></div>
		</div>
		<?php } ?>
		<?php unset($hotpic);?>
		<?php $products = phpok("product");?>
		<?php if($products[rslist]){?>
		<div class="vmenu"><h3><?php echo $products[me][cate_name];?></h3></div>
		<div class="box">
			<ul class="indexpro">
			<?php $_i=0;$products[rslist]=(is_array($products[rslist]))?$products[rslist]:array();foreach($products[rslist] AS  $key=>$value){$_i++; ?>
			<li>
				<table width="100%">
				<tr>
					<td class="img"><a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>"><img src="<?php echo $value[picture];?>" border="0" alt="<?php echo $value[title];?>" /></a></td>
					<td valign="top">
						<div class="line1">名称：<a href="<?php echo msg_url($value);?>" title="<?php echo $value[title];?>" style="<?php echo $value[style];?>"><?php echo sys_cutstring($value[title],17);?></a></div>
						<div class="line2">编号：<strong><?php echo $value[pronum];?></strong></div>
						<div class="line2">规格：<?php echo $value[prostd];?></div>
						<?php if($value[price]>0){?><div class="line2">售价：<span class="red"><?php echo sys_format_price($value[price],$value[price_currency]);?></span></div><?php } ?>
					</td>
				</tr>
				</table>
			</li>
			<?php } ?>
			</ul>
			<div class="clear line"></div>
		</div>
		<?php } ?>
		<?php unset($products);?>
	</div>
	<div class="clear"></div>
</div>
<?php $APP->tpl->p("foot","","0");?>