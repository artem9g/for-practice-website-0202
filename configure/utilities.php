<?php

// Utilities functions here


function show_custom_logo( $size = 'medium' ) {
    if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
        $logo_image = wp_get_attachment_image( $custom_logo_id, $size, false, array(
            'class'    => 'custom-logo skip-lazy',
            'itemprop' => 'siteLogo',
            'alt'      => get_bloginfo( 'name' ),
        ) );
    } else {
        $logo_url   = get_stylesheet_directory_uri() . '/assets/images/custom-logo.png';
        $w          = 200;
        $h          = 160;
        $logo_image = '<img src="' . $logo_url . '" width="' . $w . '" height="' . $h . '" class="custom-logo" itemprop="siteLogo" alt="' . get_bloginfo( 'name' ) . '">';
    }

    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" title="%2$s" itemscope>%3$s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
    echo apply_filters( 'get_custom_logo', $html );
}

/**
 * Theme main colors.
 *
 * @return array
 */
function get_theme_colors() {
    // Default colors fallback.
    // TODO Fill $palette array with main design colors to be able use in Gutenberg editor
    $palette = [
        [ "name" => "Black", "slug" => "black", "color" => "#000000" ],
        [ "name" => "White", "slug" => "white", "color" => "#ffffff" ],
        [ "name" => "Blue", "slug" => "blue", "color" => "#2d22b4" ],
    ];

    return $palette;
}


/**
 * Custom styles in TinyMCE
 *
 * @param array $buttons
 *
 * @return array
 */

function custom_style_selector( $buttons ) {
    array_unshift( $buttons, 'styleselect' );

    return $buttons;
}

add_filter( 'mce_buttons_2', 'custom_style_selector' );

function starter_update_default_tinymce_settings( $init_array ) {
    // Define the style_formats array
    $style_formats               = array(
        array(
            'title'    => 'Heading 1',
            'classes'  => 'h1',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
            'wrapper'  => false,
        ),
        array(
            'title'    => 'Heading 2',
            'classes'  => 'h2',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
            'wrapper'  => false,
        ),
        array(
            'title'    => 'Heading 3',
            'classes'  => 'h3',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
            'wrapper'  => false,
        ),
        array(
            'title'    => 'Heading 4',
            'classes'  => 'h4',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
            'wrapper'  => false,
        ),
        array(
            'title'    => 'Heading 5',
            'classes'  => 'h5',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
            'wrapper'  => false,
        ),
        array(
            'title'    => 'Heading 6',
            'classes'  => 'h6',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
            'wrapper'  => false,
        ),
        array(
            'title'    => 'Button',
            'classes'  => 'button',
            'selector' => 'a',
            'wrapper'  => false,
        ),
        array(
            'title'  => 'Small text',
            'inline' => 'small',
        ),
        array(
            'title'    => 'Two columns',
            'classes'  => 'two-columns',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,ul',
        ),
        array(
            'title'    => 'Three columns',
            'classes'  => 'three-columns',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,ul',
        ),
    );
    $init_array['style_formats'] = json_encode( $style_formats );

    // Define Editor styles css version. Preventing hard caching
    $time = filemtime( get_stylesheet_directory() . '/editor-style.css' );
    // Add the timestamp
    $init_array['cache_suffix'] = 'v=' . $time;

    // Add custom color to TinyMCE editor text color selector
    $default_colours = '"000000", "Black","993300", "Burnt orange","333300", "Dark olive","003300", "Dark green","003366", "Dark azure","000080", "Navy Blue","333399", "Indigo","333333", "Very dark gray","800000", "Maroon","FF6600", "Orange","808000", "Olive","008000", "Green","008080", "Teal","0000FF", "Blue","666699", "Grayish blue","808080", "Gray","FF0000", "Red","FF9900", "Amber","99CC00", "Yellow green","339966", "Sea green","33CCCC", "Turquoise","3366FF", "Royal blue","800080", "Purple","999999", "Medium gray","FF00FF", "Magenta","FFCC00", "Gold","FFFF00", "Yellow","00FF00", "Lime","00FFFF", "Aqua","00CCFF", "Sky blue","993366", "Brown","C0C0C0", "Silver","FF99CC", "Pink","FFCC99", "Peach","FFFF99", "Light yellow","CCFFCC", "Pale green","CCFFFF", "Pale cyan","99CCFF", "Light sky blue","CC99FF", "Plum","FFFFFF", "White"';

    $custom_colours = '';

    foreach ( get_theme_colors() as $color ) {
        $custom_colours .= '"' . str_replace( '#', '', $color['color'] ) . '","' . $color['name'] . '",';
    }

    $init_array['textcolor_map']  = '[' . $default_colours . ',' . $custom_colours . ']';
    $init_array['textcolor_rows'] = 6; // expand colour grid to 6 rows

    return $init_array;
}

add_filter( 'tiny_mce_before_init', 'starter_update_default_tinymce_settings' );

// Include styles for TinyMCE editor
add_editor_style();



// Move Yoast Meta Box to bottom
//
//function yoasttobottom() {
//    return 'low';
//}
//
//add_filter( 'wpseo_metabox_prio', 'yoasttobottom' );