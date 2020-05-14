        <?php
        $featured = get_theme_mod('waorder_featured_onoff', 'show');
        if( $featured == 'show' ):
        ?>
        <div class="featurebox">

			<div class="wrapper clear">
				<div class="feature-wrap clear">
                    <div class="feature featureleft">
    					<div class="icon color-scheme-background">
                            <i class="fas fa-check-square"></i>
                        </div>
                        <div class="heading">
                            <?php echo get_theme_mod('waorder_featured_left_title', 'Simple Order'); ?>
                        </div>
                        <div class="description">
                            <?php echo get_theme_mod('waorder_featured_left_desc', 'Order cepat tanpa ribet langsung melalui form whatsapp.'); ?>
                        </div>
    				</div>
    				<div class="feature featurecenter">
                        <div class="icon color-scheme-background">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="heading">
                            <?php echo get_theme_mod('waorder_featured_center_title','Fast Respons'); ?>
                        </div>
                        <div class="description">
                            <?php echo get_theme_mod('waorder_featured_center_desc','Kami siap melayani dan merespons order Anda dengan cepat.'); ?>
                        </div>
    				</div>
    				<div class="feature featureright">
                        <div class="icon color-scheme-background">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="heading">
                            <?php echo get_theme_mod('waorder_featured_right_title','Quality Products'); ?>
                        </div>
                        <div class="description">
                            <?php echo get_theme_mod('waorder_featured_right_desc','Kami hanya menjual produk yang benar benar bermutu dan berkualitas.'); ?>
                        </div>
    				</div>
                </div>
			</div>
		</div>
        <?php endif; ?>

        <?php
        $social = get_theme_mod('waorder_social_onoff', 'show');
        if( $social == 'show' ):
        ?>
        <div class="socialbox">
            <div class="wrapper clear">
                <h2 style="margin:0; margin-bottom: 15px; text-align: center">Temukan Kami</h2>
                <div class="socials">
                    <a href="<?php echo get_theme_mod('waorder_social_facebook','#'); ?>" target="_blank" class="social">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="<?php echo get_theme_mod('waorder_social_instagram','#'); ?>" target="_blank" class="social">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="<?php echo get_theme_mod('waorder_social_youtube','#'); ?>" target="_blank" class="social">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="widgetbox">

			<div class="wrapper clear">
				<div class="widget widgetleft">
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-1')) ?>
				</div>
				<div class="widget widgetcenter">
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-2')) ?>
				</div>
				<div class="widget widgetright">
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-3')) ?>
				</div>
			</div>

		</div>
		<footer class="footer color-scheme-background">

			<div class="wrapper clear">
				<div class="copyright">
					<?php echo get_theme_mod('waorder_copyright_text','© 2019 Copyright WA ORDER'); ?>
				</div>
			</div>

		</footer>
        
		<?php wp_footer(); ?>

	</body>
</html>
