<?php if (!defined('WEBPATH')) die(); ?>
<?php header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php echo getBareGalleryTitle(); ?> | <?php echo gettext("Search"); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<link rel="stylesheet" href="/themes/modelrail/styles/dark.css" type="text/css" />
	<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
</head>

<body>

<div id="main">

	<div id="gallerytitle">
		<?php
			printSearchForm();
		?>
		<h2><span><?php printHomeLink('', ' | '); ?><a href="
		<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php echo ('Gallery Index'); ?>">
		<?php echo getGalleryTitle();?></a></span> |
		<?php
		  echo "<em>".gettext("Search")."</em>";
		?>
		</h2>
	</div>

		<div id="padbox">
		<?php
		if (($total = getNumImages() + getNumAlbums()) > 0) {
			if (isset($_REQUEST['date'])){
				$searchwords = getSearchDate();
 		} else { $searchwords = getSearchWords(); }
			echo '<p class="newsarticlecredit">'.sprintf(gettext('Total matches for <em>%1$s</em>: %2$u'), $searchwords, $total).'</p>';
		}
		$c = 0;
		?>
<div id="albums">
			<?php while (next_album()): $c++;?>
				<div class="album">
					<div class="thumb">
						<a href="<?php echo htmlspecialchars(getAlbumURL());?>" title="<?php echo gettext('View album:');?> <?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
					</div>
					<div class="albumdesc">
						<h3><a href="<?php echo htmlspecialchars(getAlbumURL());?>" title="<?php echo gettext('View album:');?> <?php echo getAnnotatedAlbumTitle();?>"><?php printAlbumTitle(); ?></a></h3>
						<p><?php printAlbumDesc(); ?></p>
						<small><?php printAlbumDate(gettext("Date:").' '); ?> </small>
					</div>
					<p style="clear: both; "></p>
				</div>
			<?php endwhile; ?>
			</div>
			
			<table id="images">
				<tr>
				<?php $i=0; ?>
				<?php while (next_image()): $c++;?>
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
		<br clear=all>
		<?php
		if (function_exists('printSlideShowLink')) printSlideShowLink(gettext('View Slideshow'));
		if ($c == 0) {
				echo "<p>".gettext("Sorry, no image matches. Try refining your search.")."</p>";
			}

			printPageListWithNav("« ".gettext("prev"),gettext("next")." »");
			?>

	</div>

</div>

<div id="credit"><?php printRSSLink('Gallery', '', gettext('Gallery RSS'), ' | '); ?>
<?php require_once("footer.php"); ?>