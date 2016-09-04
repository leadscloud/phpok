<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><<?php echo "";?>?xml version="1.0" encoding="utf-8"?<?php echo "";?>>
<data>
	<channel>
		<?php $_i=0;$rslist=(is_array($rslist))?$rslist:array();foreach($rslist AS  $key=>$value){$_i++; ?>
		<item>
			<link><?php echo $value[link_url];?></link>
			<image><?php echo $value[picture];?></image>
			<title><?php echo $value[title];?></title>
		</item>
		<?php } ?>
	</channel>
	<config>
		<roundCorner>0</roundCorner>
		<autoPlayTime>8</autoPlayTime>
		<isHeightQuality>false</isHeightQuality>
		<blendMode>normal</blendMode>
		<transDuration>1</transDuration>
		<windowOpen>_blank</windowOpen>
		<btnSetMargin>auto 5 5 auto</btnSetMargin>
		<btnDistance>20</btnDistance>
		<titleBgColor>0xff6600</titleBgColor>
		<titleTextColor>0xffffff</titleTextColor>
		<titleBgAlpha>.75</titleBgAlpha>
		<titleMoveDuration>1</titleMoveDuration>
		<btnAlpha>.7</btnAlpha>	
		<btnTextColor>0xffffff</btnTextColor>	
		<btnDefaultColor>0x1B3433</btnDefaultColor>
		<btnHoverColor>0xff9900</btnHoverColor>
		<btnFocusColor>0xff6600</btnFocusColor>
		<changImageMode>click</changImageMode>
		<isShowBtn><?php echo $showbtn;?></isShowBtn>
		<isShowTitle><?php echo $showtitle;?></isShowTitle>
		<scaleMode>noBorder</scaleMode>
		<transform>blur</transform>
		<isShowAbout>false</isShowAbout>
		<titleFont>微软雅黑</titleFont>
	</config>
</data>