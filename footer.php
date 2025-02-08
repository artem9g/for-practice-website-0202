
	<footer id="colophon" class="footer">
        <div class="footer__container">
            <div class="footer__logo">
                <?php if ( $footer_logo = get_field( 'footer_logo', 'options' ) ):
                    $logo_image = wp_get_attachment_image( $footer_logo['id'], 'medium', false, [
                        'class'    => 'custom-logo',
                        'itemprop' => 'siteLogo',
                        'alt'      => get_bloginfo( 'name' ),
                    ] );
                    echo sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" title="%2$s" itemscope>%3$s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
                else:
                    show_custom_logo();
                endif; ?>
            </div>
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi deserunt dolorem, eaque error fugit iste magnam nesciunt nostrum nulla, odit optio quas quos reiciendis sit tempora totam vel vero voluptates voluptatum! Esse et mollitia nemo odio officiis perspiciatis, quae quia ratione rem reprehenderit rerum similique, voluptatibus. Minima minus, temporibus!</div>
            <div class="footer__menu">
                <?php
                if ( has_nav_menu( 'footer-menu' ) ) {
                    wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu menu', 'depth' => 1 ) );
                }
                ?>
            </div>
            <div class="footer__sp">
<!--                --><?php //get_template_part( 'parts/socials' ); // Social profiles ?>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page wrapper -->

<?php wp_footer(); ?>

</body>
</html>
