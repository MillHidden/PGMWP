<?php

//Build Shortcodes
add_shortcode('articles', array($this, 'recent'));

public function recent($atts, $content)
{
    $atts = shortcode_atts(array('numberposts' => 5, 'order' => 'DESC'), $atts);
    $posts = get_posts($atts);

    $html = array();
    $html[] = $content;
    $html[] = '<ul>';
    foreach ($posts as $post) {
        $html[] = '<li><a href="'.get_permalink($post).'">'.$post->post_title.'</a></li>';
    }
    $html[] = '</ul>';

    echo implode('', $html);
}

?>