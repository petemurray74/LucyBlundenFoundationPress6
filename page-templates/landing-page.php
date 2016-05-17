<?php
/*
Template Name: Landing Page
*/
get_header(); ?>

<header id="hero" role="banner">
	<div class="marketing">
		<div class="tagline">
			<div class="taglinecontent">
				<h2><?php bloginfo( 'name' ); ?></h2>
				<h4 class="subheader"><?php bloginfo( 'description' ); ?></h4>
			</div>
		</div>

	</div>

</header>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</div>

	</div>

</section>


<?php
$start3col="<div class=\"lp-3col\">";
$start1col="<div class=\"lp-1col\">";
$endcol="</div>";

// check if the flexible content field has rows of data
if( have_rows('row') ):
     // loop through the rows of data
    while ( have_rows('row') ) : the_row();
        if( get_row_layout() == 'single_column' ):
		?><div class="lp-row-wrapper text-center"><div class="lp-row"><?php
			echo($start1col.get_sub_field('content_single_col').$endcol);
		?></div></div><?php	
        elseif( get_row_layout() == 'three_column' ): 
		?><div class="lp-row-wrapper"><div class="lp-row"><?php
        	echo($start3col.get_sub_field('content_3_col_1').$endcol);
			echo($start3col.get_sub_field('content_3_col_2').$endcol);
			echo($start3col.get_sub_field('content_3_col_3').$endcol);
			?></div></div><?php
        endif;
    endwhile;
else :
    // no layouts found
endif;
?>


<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_footer();
