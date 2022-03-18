<?php if (!defined('WEBPATH')) die(); ?>
<?php header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php zp_apply_filter('theme_head'); ?>
		<title><?php echo getBareGalleryTitle(); ?> | Recent Uploads</title>
		<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
		<link rel="stylesheet" href="/themes/modelrail/styles/dark.css" type="text/css" />
		<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
	</head>

	<body>

	<div id="main">
	
		<div id="gallerytitle">
			<h2><span><?php printHomeLink('', ' | '); ?><a href="<?php echo html_encode(getGalleryIndexURL());?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo getGalleryTitle();?></a> | </span>Recent Uploads</h2>
		</div>
	
			<div id="padbox">
			
				<?php echo getNumberCurrentDisplayedRecords("Displaying images ", ""); ?>
	
				<div id="images">
				<?php while (next_photostream_image()): ?>
				<div class="image">
					<div class="imagethumb"><a href="<?php echo html_encode(getImageURL());?>" title="<?php printBareImageTitle();?>"><?php printImageThumb(getAnnotatedImageTitle()); ?></a>
					<p><?php echo getAnnotatedImageTitle(); ?></p></div>
				</div>
				<?php endwhile; ?>
	
			</div>
	
			<?php printPhotostreamPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?>
			
		</div>
	</div>
	
	<div id="credit"><?php printCustomPageURL(gettext("Archive View"),"archive"); ?> |
	<?php printZenphotoLink(); ?>
	<?php
	if (function_exists('printUserLogin_out')) {
		printUserLogin_out(" | ");
	}
	?>
	</div>
	
	<?php
	printAdminToolbox();
	zp_apply_filter('theme_body_close');
	?>
	
	</body>
</html>