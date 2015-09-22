<?php
/**
 * MaxFlat main template file.
 *
 *
 *
 * @since      MaxFlat 1.0
 */

get_header(); ?>


<main id="content" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
	<?php
    /* Get all sticky posts */
	$sticky = get_option( 'sticky_posts' );
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	if(harmonux_version_homepage()=='1'){


	//if slider based on sticky post

	  if(harmonux_version_slider()==1){
		 get_template_part('views/snippets/sticky-slider');

		 /* if sticky post in slider above ommit sticky post*/
		 $args = array(
				'post___not_in' => $sticky,
        'category_name'=>'Event',	
       	'ignore_sticky_posts' => 1,
       	'paged' => $paged

		 );

	 }else{

		 harmonux_get_homepage_slider();

		 $args = array(
			 'paged' => $paged

		 );
	 }



	$news= new WP_Query( $args );

	if ( $news->have_posts() ) : ?>
<h3>Our Event</h3>
<hr>
<ul class="small-block-grid-1 large-block-grid-2 smartlib-grid-list">
	<?php /* start the loop */ ?>
	<?php while ( $news->have_posts() ) : $news->the_post(); ?>
			<li>	<?php
			get_template_part( 'views/content'); ?>

			</li>
		<?php endwhile;
?>
</ul>
			<?php
	harmonux_list_pagination( 'nav-below' );

	?>
	<?php else : ?>
	<article id="post-0" class="post no-results not-found">

	<?php get_template_part( 'views/content', 'none'); ?>
	</article>
	<?php endif; // end have_posts() check ?>


	 <?php
 }else{

	 if ( have_posts() ) : ?>
	 <ul class="small-block-grid-1 large-block-grid-2 smartlib-grid-list">
		 <?php /* start the loop */ ?>
		 <?php while (have_posts() ) : the_post(); ?>
		 <li>	<?php
			 get_template_part( 'views/content'); ?>

		 </li>
		 <?php endwhile;
		 ?>
	 </ul>
	 <?php
	 harmonux_list_pagination( 'nav-below' );

	 ?>
	 <?php else : ?>
	 <article id="post-0" class="post no-results not-found">

		 <?php get_template_part( 'views/content', 'none'); ?>
	 </article>
	 <?php endif; // end have_posts() check ?>
		 <?php
 }
?>
</main><!-- #content -->
<h3>How to find us ?</h3>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9742731335477!2d107.61119130000003!3d-6.893680599999988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e650eb4c6aa1%3A0x80e485340203c8c7!2sMasjid+Salman+ITB!5e0!3m2!1sen!2sid!4v1440891267028" width="1280" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

</div><!-- #page -->

<?php
//add sidebar on the right side
if(check_position_of_component('sidebar', 'right'))
	get_sidebar();
?>
</div><!-- #wrapper -->
<?php get_footer(); ?>
