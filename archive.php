<?php if (!defined('WEBPATH')) die(); ?>
<?php header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?> | <?php echo gettext("Archive View"); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<link rel="stylesheet" href="/themes/modelrail/styles/dark.css" type="text/css" />
	<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
</head>

<body>

<div id="main">

	<div id="gallerytitle">
		<h2><?php printHomeLink('', ' | '); ?><a href="<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php echo gettext('Gallery Index'); ?>"><?php echo getGalleryTitle();?></a>
		</span> | <?php echo gettext("Archive View"); ?></h2>
		<?php printSearchForm(); ?>
	</div>
		<div id="padbox">
		<div id="archive"><?php printAllDates('archive','year','month','desc'); ?></div>
		<div id="tag_cloud">
					<p><? echo gettext('Popular Tags'); ?></p>
			<?php printAllTagsAs('cloud', 'tags'); ?>
				</div>
	</div>

</div>

<div id="credit"><?php printRSSLink('Gallery','','RSS', ' | '); ?>
<?php require_once("footer.php"); ?>