<?php if(!defined('PHPOK_SET')){die('<h3>Error...</h3>');}?><script type="text/javascript">
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabversion=6,0,0,0" width="<?php echo $width;?>" height="<?php echo $height;?>">');
document.write('<param name="movie" value="<?php echo $swfurl;?>?xml=<?php echo $xmlfile;?>">');
document.write('<param name="quality" value="high"><param name="wmode" value="opaque">');
document.write('<embed src="<?php echo $swfurl;?>?xml=<?php echo $xmlfile;?>" wmode="opaque" quality="high" width="<?php echo $width;?>" height="<?php echo $height;?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
document.write('</object>');
</script>