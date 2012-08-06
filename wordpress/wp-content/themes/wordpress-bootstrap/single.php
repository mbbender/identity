<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
                <?php
                $blog_hero = of_get_option('blog_hero');
                if ($blog_hero){
                    ?>
                    <div class="clearfix row-fluid">
                        <div class="hero-unit identity" style="padding: 35px 35px 90px;">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/identityheaderselfburn.png" id="selfpic"/>
                            <h1><?php bloginfo('title'); ?></h1>

                            <p><?php bloginfo('description'); ?></p>
                            <ul id="css3" class="social">
                                <li class="linkedin">
                                    <a target="_blank" href="http://www.linkedin.com/pub/michael-bender/4/515/b70"><strong>LinkedIn</strong></a>
                                </li>
                                <li class="facebook">
                                    <a target="_blank" href="http://www.facebook.com/mbbender"><strong>Facebook</strong></a>
                                </li>
                                <li class="twitter">
                                    <a target="_blank" href="http://twitter.com/bender_michael"><strong>Twitter</strong></a>
                                </li>
                                <li class="googleplus">
                                    <a target="_blank" href="https://plus.google.com/u/0/109350476984468771338/posts/p/pub"><strong>Google+</strong></a>
                                </li>
                                <li class="stackoverflow">
                                    <a target="_blank" href="http://stackoverflow.com/users/821870/michael"><strong>StackOverflow</strong></a>
                                </li>
                                <li class="github">
                                    <a target="_blank" href="https://github.com/michael-bender"><strong>Github</strong></a>
                                </li>


                            </ul>

                        </div>
                    </div>
                    <?php
                }
                ?>
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
						
							<?php the_post_thumbnail( 'wpbs-featured' ); ?>
							
							<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
							
							<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","bonestheme"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template('',true); ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>