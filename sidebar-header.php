<?php theme_print_sidebar('header-widget-area'); ?>



    <div class="art-shapes">

            </div>
<?php if(theme_get_option('theme_header_show_headline')): ?>
	<?php $headline = theme_get_option('theme_'.(is_home()?'posts':'single').'_headline_tag'); ?>
	<<?php echo $headline; ?> class="art-headline" data-left="0%">
    <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
</<?php echo $headline; ?>>
<?php endif; ?>
<?php if(theme_get_option('theme_header_show_slogan')): ?>
	<?php $slogan = theme_get_option('theme_'.(is_home()?'posts':'single').'_slogan_tag'); ?>
	<<?php echo $slogan; ?> class="art-slogan" data-left="0%"><?php bloginfo('description'); ?></<?php echo $slogan; ?>>
<?php endif; ?>




<nav class="art-nav">
    <div class="art-nav-inner">
    <?php
	echo theme_get_menu(array(
			'source' => theme_get_option('theme_menu_source'),
			'depth' => theme_get_option('theme_menu_depth'),
			'menu' => 'primary-menu',
			'class' => 'art-hmenu'
		)
	);
	get_sidebar('nav'); 
?> 
        </div>
    </nav>

                    
