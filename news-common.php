<div id="news">
<?php
// single news article
if(is_NewsArticle()) { 
	?>  
  <?php if(getPrevNewsURL()) { ?><div class="singlenews_prev"><?php printPrevNewsLink(); ?></div><?php } ?>
  <?php if(getNextNewsURL()) { ?><div class="singlenews_next"><?php printNextNewsLink(); ?></div><?php } ?>
  <?php if(getPrevNewsURL() OR getNextNewsURL()) { ?><br style="clear:both" /><?php } ?>
  <div class="newsarticlecredit"><span class="newsarticlecredit-left"><?php printNewsDate();?> | <?php echo gettext("Comments:"); ?> <?php echo getCommentCount(); ?> | </span> <?php printNewsCategories(", ",gettext("Categories: "),"newscategories"); ?></div>
  <?php printNewsContent(); ?>
  <br style="clear:both;" />
  <?php if (function_exists('printRating')) { printRating(); } ?>
<?php 
// COMMENTS TEST
if (function_exists('printCommentForm')) { ?>
	<div id="comments">
		<?php printCommentForm(); ?>
	</div>
	<?php  } // comments allowed - end
} else {
// news article loop
  while (next_news()): ;?> 
 <div class="newsarticle"> 
    <h3><?php printNewsURL(); ?><?php echo " <span class='newstype'>[".getNewsType()."]</span>"; ?></h3>
        <div class="newsarticlecredit"><span class="newsarticlecredit-left"><?php printNewsDate();?> | <?php echo gettext("Comments:"); ?> <?php echo getCommentCount(); ?> | </span>
<?php
if(is_GalleryNewsType()) {
	if(!is_NewsType("album")) {
		echo gettext("Album:")."<a href='".getNewsAlbumURL()."' title='".getBareNewsAlbumTitle()."'> ".getNewsAlbumTitle()."</a>";
	} else {
		echo "<br />";
	}
} else {
	printNewsCategories(", ",gettext("Categories: "),"newscategories");
}
?>
</div>
    <?php printNewsContent(); ?>
    <p><?php printNewsReadMoreLinkLocal(); ?></p>
    <?php if(is_NewsType("news")) printCodeblock(1); ?>
    </div>	
<?php
  endwhile;
  
  printNewsPageListWithNav(gettext('next &raquo;'), gettext('&laquo; prev'));
  
// end single news article
} ?> 
</div><!-- news-->
</div><!-- main -->
<div id="credit"><?php 

function printNewsReadMoreLinkLocal($readmore='') {
	$readmore = getNewsReadMore($readmore);
	if(!empty($readmore)) {
		if(is_NewsType("news")) {
			$newsurl = getNewsURL(getNewsURL());
		} else {
			$newsurl = html_encode(getNewsURL());
		}
		echo "<a href='".$newsurl."' title=\"".getBareNewsTitle()."\">".html_encode($readmore)."</a>";
	}
 }







?>