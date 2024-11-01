<?php
function widgets_olakala_widget_score_func( $atts ){
    $a = shortcode_atts( array(
        'code' => '',
        'width' => '200px'
    ), $atts );
    $olakalaCode = $a['code'];
    $html = file_get_contents( OLAKALA_API_SCORE_URL.$olakalaCode );
    if( empty($html) ) return '';
    ob_start();
    ?>
    <script>var $ = jQuery.noConflict();</script>
    <div class="olakala-score" style="width:<?php echo $a['width']; ?>;">
    <?php echo $html; ?>
    </div>
    <?php
    return ob_get_clean(); 
}
add_shortcode('olakala-widget-score', 'widgets_olakala_widget_score_func', 2);

function widgets_olakala_widget_reviews_func( $atts ){
    $a = shortcode_atts( array(
        'code' => '',
        'width' => '700px'
    ), $atts );
    $olakalaCode = $a['code'];
    $html = file_get_contents( OLAKALA_API_REVIEWS_URL.$olakalaCode );
    if( empty($html) ) return '';
    ob_start();
    ?>
    <script>var $ = jQuery.noConflict();</script>
    <div class="olakala-reviews" style="width:<?php echo $a['width']; ?>;">
    <?php echo $html; ?>
    </div>
    <?php
    return ob_get_clean(); 
}
add_shortcode('olakala-widget-reviews', 'widgets_olakala_widget_reviews_func', 2);