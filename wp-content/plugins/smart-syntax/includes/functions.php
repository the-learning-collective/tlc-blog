<?php

function smart_syntax_prettyprint($content)
{
    global $post;
    global $comment;
    $seeker     = "/(<pre)(.+)(<code.+class.+[\'\"])([^\'\"]+)([\'\"]>)/i";
    $prettified = '$1 class="prettyprint lang-$4"$2$3$4$5';
    $content    = preg_replace($seeker, $prettified, $content);
    return $content;
}

function smart_syntax_prettify_script()
{
    global $post;
    global $comment;
    $content      = $post->post_content . $comment->comment_content;
    $smart_syntax = get_option('_smart_syntax_options');
    $output       = preg_match_all('/(<pre)(.+)(<code.+class.+[\'"])([^\'"]+)([\'"]>)/i', $content, $matches);
    // find language tags
    if (!empty($matches[0]) && isset($matches[0])) {
        $langs = remove_dupe_langs($matches[4]);
        foreach ($langs as $lg) {
            if ($lg = 'css') {
                $lang = $lg;
            }
        }
    }
    if (is_singular() && !empty($matches[0]) && isset($matches[0])) {
        
        if (!empty($lang) && isset($lang)) {
            $suffix = '?lang=' . $lang;
        }
        
        if (isset($smart_syntax['cdn_prettify']) && $smart_syntax['cdn_prettify'] == true) {
            
            $source = 'https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js' . $suffix;
            
        } else {
            
            $source = SMART_SYNTAX_URL . 'assets/js/src/run_prettify.js' . $suffix;
            
        }
        wp_enqueue_script('smart-syntax-prettify', $source, null, null, true);
?>
				<script>prettyPrint()</script>
			<?php
        
        if (isset($smart_syntax['custom_skin']) && $smart_syntax['custom_skin'] == true) {
            wp_enqueue_style('smart-syntax-skin', SMART_SYNTAX_URL . 'assets/css/smart_syntax.css', true, '1.0.0');
        } elseif ($smart_syntax['custom_skin'] != true && $smart_syntax['cdn_prettify'] != true) {
            wp_enqueue_style('smart-syntax-skin', SMART_SYNTAX_URL . 'assets/css/prettify.css', true, '1.0.0');
        }
    }
}

function remove_dupe_langs($array)
{
    foreach ($array as $lang => $val)
        $sort[$lang] = serialize($val);
    $uni = array_unique($sort);
    foreach ($uni as $lang => $ser)
        $sorted[$lang] = unserialize($ser);
    return ($sorted);
}
