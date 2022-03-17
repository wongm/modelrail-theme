<?php if (!defined('WEBPATH')) die(); ?>
<?php header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?> | <?php echo getBareAlbumTitle();?> | <?php echo getBareImageTitle();?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<link rel="stylesheet" href="/themes/modelrail/styles/dark.css" type="text/css" />
	<script src="<?php echo FULLWEBPATH . "/" . ZENFOLDER ?>/js/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
	<script src="<?php echo FULLWEBPATH . "/" . ZENFOLDER ?>/js/lightbox.js" type="text/javascript"></script>
	<script type="text/javascript">
		// <!-- <![CDATA[
		$(document).ready(function(){
			$(".colorbox").colorbox({inline:true, href:"#imagemetadata"});
		});
		// ]]> -->
	</script>
		<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>

</head>

<body>

<div id="main">

	<div id="gallerytitle">
		<div class="imgnav">
			<?php if (hasPrevImage()) { ?>
			<div class="imgprevious"><a href="<?php echo htmlspecialchars(getPrevImageURL());?>" title="<?php echo gettext("Previous Image"); ?>">« <?php echo gettext("prev"); ?></a></div>
			<?php } if (hasNextImage()) { ?>
			<div class="imgnext"><a href="<?php echo htmlspecialchars(getNextImageURL());?>" title="<?php echo gettext("Next Image"); ?>"><?php echo gettext("next"); ?> »</a></div>
			<?php } ?>
		</div>
		<h2><span><?php printHomeLink('', ' | '); ?><a href="<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php gettext('Home'); ?>"><?php echo getGalleryTitle();?>
			</a> | <?php printParentBreadcrumb("", " | ", " | "); printAlbumBreadcrumb("", " | "); ?>
			</span> <?php printImageTitle(true); ?>
		</h2>

	</div>

	<!-- The Image -->
	<div id="image">
		<?php
		$fullimage = getFullImageURL();
		if (!empty($fullimage)) {
			?>
			<a href="<?php echo htmlspecialchars($fullimage);?>" rel="lightbox" title="<?php echo getBareImageTitle();?>">
			<?php
		}
		if (function_exists('printUserSizeImage') && isImagePhoto()) {
			printUserSizeImage(getImageTitle());
		} else {
			printDefaultSizedImage(getImageTitle());
		}
		if (!empty($fullimage)) {
			?>
			</a>
			<?php
		}
		?>
		<?php
	if (function_exists('printUserSizeImage') && isImagePhoto()) printUserSizeSelectior(); ?>
	</div>

	<div id="narrow">
		(Click to enlarge)<br />
		<?php printImageDesc(true); ?>
		<?php if (function_exists('printSlideShowLink')) printSlideShowLink(gettext('View Slideshow')); ?>
		<hr /><br />
		<?php
			if (getImageMetaData()) {echo "<div id=\"exif_link\"><a href=\"#\" title=\"".gettext("Image Info")."\" class=\"colorbox\">".gettext("Image Info")."</a></div>";
				echo "<div style='display:none'>"; printImageMetadata('', false); echo "</div>";
			}
		?>
		<br clear=all />

    <?php if (function_exists('printRating')) { printRating(); }?>

		<?php if (function_exists('printShutterfly')) printShutterfly(); ?>

		<?php
		if (function_exists('printCommentForm')) {
			printCommentForm();
		}
		
		if (function_exists('printImageMarkupFields')) {
		    printImageMarkupFields();
		}
		?>
	</div>
</div>

<div id="credit"><?php printRSSLink('Gallery','','RSS', ' | '); ?> 
<?php require_once("footer.php"); ?>