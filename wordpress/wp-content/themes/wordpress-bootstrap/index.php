<?php get_header(); ?>
			
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
                        <li class="runkeeper">
                            <a target="_blank" href="http://runkeeper.com/user/558381988/profile""><strong>RunKeeper</strong></a>
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
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
						
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wpbs-featured' ); ?></a>
							
							<div class="page-header"><h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
							
							<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix">
							<?php the_content( __("Read more &raquo;","bonestheme") ); ?>
						</section> <!-- end article section -->
						
						<footer>
			
							<p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', ''); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template(); ?>
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>		
					
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