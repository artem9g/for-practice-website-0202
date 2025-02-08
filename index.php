<?php
get_header();
?>


        <main id="main" class="site-main page">
<div class="page__container">
	        <?php
	        while(have_posts()) : the_post();
		        ?>

                <section>
                    <div class="tt__container">
                        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consequatur expedita
                            facere illo nostrum. Ad assumenda aut delectus dignissimos, dolore ipsa modi nam
                            necessitatibus, odio, odit perferendis repudiandae rerum totam!
                        </div>
                        <div>Accusamus, aspernatur consectetur corporis doloremque eos nemo neque nihil nobis nostrum
                            quae qui quibusdam quidem quod repellat repellendus sequi veritatis vitae voluptates!
                            Aliquam dignissimos eligendi facilis harum ipsum magni sed.
                        </div>
                        <div>Accusamus accusantium amet assumenda debitis ea earum eos esse est expedita facilis fuga
                            illum labore laborum laudantium magnam magni nemo non omnis perspiciatis possimus quas quo,
                            repellat rerum sit totam?
                        </div>
                        <div>Alias consequatur consequuntur corporis cumque delectus dolores dolorum error eveniet
                            facere iste labore minus modi molestias, nesciunt, nostrum odio odit pariatur porro quas
                            quasi quibusdam quidem sapiente similique ullam voluptatum.
                        </div>
                        <div>Asperiores cumque dolor earum eum ipsum nesciunt officiis reprehenderit sit voluptas
                            voluptates? At consequatur culpa fugit inventore maiores molestiae nobis numquam quia
                            reprehenderit voluptatibus? Dicta eaque magnam obcaecati repellat sit.
                        </div></div>
			        <?php the_title('<h1>', '</h1>'); ?>

			        <?php
			        the_content();
			        ?>
					<div>11132323232234</div>
                </section>

		        <?php
	        endwhile; // End of the loop.
	        ?>
</div><!-- End of the container.-->
        </main><!-- #main -->


<?php
get_footer();