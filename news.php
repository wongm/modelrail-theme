<?php if (!defined('WEBPATH')) die();  DEFINE('FRONTPAGE', false); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?> | <?php echo gettext("News"); ?> <?php echo getBareNewsTitle(""); ?><?php printCurrentNewsCategory(" | "); printCurrentNewsArchive(); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<link rel="stylesheet" href="/themes/modelrail/styles/dark.css" type="text/css" />
	<?php printRSSHeaderLink("News","News", "en", ""); ?>
</head>
<body>
<div id="main">
	<div id="gallerytitle">
		<h2><span><?php printHomeLink('', ' | '); ?><a href="<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php echo gettext('Home'); ?>"><?php printGalleryTitle();?></a> <?php printNewsIndexURL("News Index"," | "); ?><?php printCurrentNewsCategory(" | Category - "); ?><?php printNewsTitle(" | "); printCurrentNewsArchive(" | "); ?></h2>
		<?php printSearchForm("","search","",gettext("Search")); ?>
	</div>
	<?php if (!is_NewsArticle()) { 
		?>
	<div id="gallerydesc">
	<?php printGalleryDesc(); ?> 
	</div>
	<?php } ?> 
<?php 
require_once("news-common.php");
require_once("footer.php"); 
?>