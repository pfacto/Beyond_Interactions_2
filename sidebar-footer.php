<?php
global $theme_sidebars;
$places = array();
foreach ($theme_sidebars as $sidebar){
    if ($sidebar['group'] !== 'footer')
        continue;
    $widgets = theme_get_dynamic_sidebar_data($sidebar['id']);
    if (!is_array($widgets) || count($widgets) < 1)
        continue;
    $places[$sidebar['id']] = $widgets;
}
$place_count = count($places);
$needLayout = ($place_count > 1);
if (theme_get_option('theme_override_default_footer_content')) {
    if ($place_count > 0) {
        $centred_begin = '<div class="art-center-wrapper"><div class="art-center-inner">';
        $centred_end = '</div></div><div class="clearfix"> </div>';
        if ($needLayout) { ?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
        <?php 
        }
        foreach ($places as $widgets) { 
            if ($needLayout) { ?>
            <div class="art-layout-cell art-layout-cell-size<?php echo $place_count; ?>">
            <?php 
            }
            $centred = false;
            foreach ($widgets as $widget) {
                 $is_simple = ('simple' == $widget['style']);
                 if ($is_simple) {
                     $widget['class'] = implode(' ', array_merge(explode(' ', theme_get_array_value($widget, 'class', '')), array('art-footer-text')));
                 }
                 if (false === $centred && $is_simple) {
                     $centred = true;
                     echo $centred_begin;
                 }
                 if (true === $centred && !$is_simple) {
                     $centred = false;
                     echo $centred_end;
                 }
                 theme_print_widget($widget);
            } 
            if (true === $centred) {
                echo $centred_end;
            }
            if ($needLayout) {
           ?>
            </div>
        <?php 
            }
        } 
        if ($needLayout) { ?>
    </div>
</div>
        <?php 
        }
    }
?>
<div class="art-footer-text">
<?php
global $theme_default_options;
echo do_shortcode(theme_get_option('theme_override_default_footer_content') ? theme_get_option('theme_footer_content') : theme_get_array_value($theme_default_options, 'theme_footer_content'));
} else { 
?>
<div class="art-footer-text">

<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 25%"><?php if (false === theme_print_sidebar('footer-1-widget-area')) { ?>
        <p style="font: 22px 'Century Gothic'; color: #808080">Ipsum enim.</p><br><ul><li><a href="#">Welkom</a></li><li><a href="#">Schedule</a></li><li><a href="#">Management</a></li></ul>
    <?php } ?></div><div class="art-layout-cell layout-item-0" style="width: 25%"><?php if (false === theme_print_sidebar('footer-2-widget-area')) { ?>
        <p style="font: 22px 'Century Gothic'; color: #808080">Odio et.</p><br><ul><li><a href="#">Map</a></li><li><a href="#">Address</a></li><li><a href="#">Contact Us</a></li></ul>
    <?php } ?></div><div class="art-layout-cell layout-item-0" style="width: 17%"><?php if (false === theme_print_sidebar('footer-3-widget-area')) { ?>
        <p style="font: 22px 'Century Gothic'; color: #808080">Ligula.</p><br><ul><li><a href="#">About Us</a></li><li><a href="#">Terms</a></li></ul>
    <?php } ?></div><div class="art-layout-cell layout-item-0" style="width: 33%"><?php if (false === theme_print_sidebar('footer-4-widget-area')) { ?>
        <p><br></p><p style="font: 22px 'Century Gothic'; text-align: right; color: #E1482D;">1.555.456.7984</p><br><p style="text-align:right;">Ac montes leo sapien.<br>Malesuada nullam.</p>
    <?php } ?></div>
    </div>
</div>

    
  
<?php } ?>
<p class="art-page-footer">
        <span id="art-licence-links">Images by Flickr/Eric Fischer</span>
    </p>
</div>
