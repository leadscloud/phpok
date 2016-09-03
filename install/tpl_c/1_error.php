<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><?php $APP->tpl->p("head","","0");?>
<div class="div_w m_top">
	<div class="left">
		<div class="model"><div class="bg">
			<h5>说明</h5>
			<ol class="ol">
				<li>正在安装（升级中）</li>
			</ol>
		</div></div>
		<div class="space"></div>
	</div>
	<div class="right">
		<div class="model"><div class="bg">
			<h5>友情提示</h5>
			<div class="msg" style="padding:5px 15px;line-height:21px;"><?php echo $content;?><?php if($is_refresh){?><br />请稍候，正在执行下一步，如果升级包未在 <span style="color:red;">2</span> 秒后自行跳转，请点按钮“下一步”！<?php } ?></div>
		</div></div>
		<?php if($url){?>
		<div class="space"></div>
		<div align="right"><button onclick="window.location.href='<?php echo $url;?>'" type="button" class="btn"><span><span>下一步</span></span></button></div>
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>

<?php if($is_refresh){?>
<script type="text/javascript">
function refresh_url()
{
	window.location.href = "<?php echo $url;?>";
}
window.setTimeout("refresh_url()",2000);
</script>
<?php } ?>
<?php $APP->tpl->p("foot","","0");?>