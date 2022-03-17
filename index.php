<?php if (!defined('WEBPATH')) die(); ?>
<?php header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?> | Home</title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<link rel="stylesheet" href="/themes/modelrail/styles/dark.css" type="text/css" />
	<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
</head>
<body>

<div id="main">

	<div id="gallerytitle">
		<h2><span><?php printHomeLink('', ' | '); ?><a href="<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php echo gettext('Home'); ?>"><?php echo getGalleryTitle();?></a> | Home</h2>
		<?php printSearchForm("","search","",gettext("Search")); ?>
	</div>
	<div id="gallerydesc">
		<?php printGalleryDesc(); ?> 
	</div>

<div id="content">
			<div id="albums">
				<?php while (next_album()): ?>
					<div class="album">
							<div class="thumb">
							<a href="<?php echo htmlspecialchars(getAlbumURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getBareAlbumTitle();?>"><?php printAlbumThumbImage(getBareAlbumTitle()); ?></a>
 							 </div>
							<div class="albumdesc">
								<h3><a href="<?php echo htmlspecialchars(getAlbumURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getBareAlbumTitle();?>"><?php printAlbumTitle(); ?></a></h3>
 								<?php printAlbumDate(""); ?>
								<p><?php echo getAlbumDesc(); ?></p>
							</div>
					</div>
				<?php endwhile; ?>
		</div>
		<br style="clear: both" />
		<?php printPageListWithNav("« ".gettext("prev"), gettext("next")." »"); ?>

</div><!-- content -->
</div><!-- main -->

<div id="credit"><?php printRSSLink('Gallery', '', gettext('Gallery RSS'), ' | '); ?>
<?php require_once("footer.php"); ?>