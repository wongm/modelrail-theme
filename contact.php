<?php if (!defined('WEBPATH')) die(); ?>
<?php header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?> | <?php echo gettext("Contact Me"); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo  getOption('charset'); ?>" />
	<link rel="stylesheet" href="/themes/modelrail/styles/dark.css" type="text/css" />
</head>
<body>
<div id="main">

	<div id="gallerytitle">
		<h2>
		<?php printHomeLink('', ' | '); ?>
		<a href="<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php echo gettext('Gallery'); ?>"><?php echo getGalleryTitle();?></a> | 
		<?php echo gettext('Contact Me'); ?>
		</h2>
	</div>

<h3><?php echo gettext('Contact Me') ?></h3>

<?php  printContactForm();  ?>

</div>
<?php if (function_exists('printLanguageSelector')) { printLanguageSelector(); } ?>

<div id="credit"><?php printRSSLink('Gallery', '', gettext('Gallery RSS'), ' | '); ?>
<?php require_once("footer.php"); ?>
