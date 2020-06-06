<?php get_header(); ?>

	<section class="index">

		<div class="wrapper clear">

			<?php
			$sliders = get_option('waorder_sliders');
			?>
			<?php if( $sliders ): ?>
				<div class="slider">
					<?php foreach((array) $sliders as $key=>$val ): ?>
						<?php
						$slider_link = get_post_meta($key, 'slider_link', true);
						?>
						<div class="slide">
							<?php if($slider_link) : ?>
								<a href="<?php echo esc_url($slider_link); ?>" target="_blank"><img class="tns-lazy-img" data-src="<?php echo $val; ?>"></a>
							<?php else: ?>
								<img class="tns-lazy-img" data-src="<?php echo $val; ?>">
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => get_option('posts_per_page'),
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'orderby'        => 'date',
			);

			$products = new WP_Query( $args );

			if( $products && null !== $products->have_posts() && $products->have_posts() ):
				?>


			<div class="judulproduk">
				<h3><i class="fas fa-shopping-bag"></i> PRODUK TERBARU</h3>
				<a href="<?php echo site_url('product'); ?>"><i class="fas fa-angle-double-right"></i> Lihat Semua</a>
				<div class="clearfix"></div>
				<hr>
			</div>

				<div class="boxcontainer clear">

					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
						<?php get_template_part('template/productbox'); ?>
					<?php endwhile; ?>

				</div>

				<?php
			else:
                ?>
                <div class="boxcontainer clear">

					<?php get_template_part('template/404'); ?>

				</div>
                <?php
			endif;

			wp_reset_postdata();
			?>	
				

		</div>
	</section>

<?php get_footer(); ?>
