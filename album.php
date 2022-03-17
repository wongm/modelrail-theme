<?php if (!defined('WEBPATH')) die(); ?>
<?php header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?> | <?php echo getBareAlbumTitle();?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<link rel="stylesheet" href="/themes/modelrail/styles/dark.css" type="text/css" />
	<?php printRSSHeaderLink('Album',getAlbumTitle()); ?>
</head>

<body>

<div id="main">

	<div id="gallerytitle">
		<h2><span><?php printHomeLink('', ' | '); ?><a href="<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php echo gettext('Home'); ?>"><?php echo getGalleryTitle();?></a> | <?php printParentBreadcrumb(); ?></span> <?php printAlbumTitle(true);?></h2>
	</div>

		<div id="padbox">

		<?php printAlbumDesc(true); ?>
		<?php $i=0; ?>
		<table id="images">
			<tr>
			<?php while (next_image()): ?>
			
			<td class="image">
				<div class="imagethumb"><a href="<?php echo htmlspecialchars(getImageURL());?>" title="<?php echo getBareImageTitle();?>"><?php printImageThumb(getAnnotatedImageTitle()); ?></a></div>
				<p style="clear: both;"><?=getAnnotatedImageTitle()?><br>
				<small><?=printImageDate()?></small></p>
				
			</td>
<?php 		if (($i % 2) == 1)
				echo "</tr><tr>";
			
			$i = $i + 1;
			endwhile; ?>
			</tr>
		</table>
		</div>

		<?php printPageListWithNav("« ".gettext("prev"), gettext("next")." »"); ?>

	
	<?php if (function_exists('printSlideShowLink')) printSlideShowLink(gettext('View Slideshow')); ?>
	<?php if (function_exists('printRating')) { printRating(); }?>
	</div>
</div>

<div id="credit"><?php printRSSLink('Album', '', gettext('Album RSS'), ' | '); ?>
<?php require_once("footer.php"); ?>