<?php
/*
 * Class Name: Rahmanda_Comment_Walker
 *  
 *
 * @package Rahmanda
 */

/* Check if Class Exists. */
if ( !class_exists('Rahmanda_Comment_Walker') ) {
	/**
	 * Rahmanda_Comment_Walker class.
	 *
	 * @extends Walker_Comment
	 */
    class Rahmanda_Comment_Walker extends Walker_Comment {
        /**
         * Starts the list before the elements are added.
         *
         * @since 2.7.0
         *
         * @see Walker::start_lvl()
         * @global int $comment_depth
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param int    $depth  Optional. Depth of the current comment. Default 0.
         * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $GLOBALS['comment_depth'] = $depth + 1;

            switch ( $args['style'] ) {
                case 'div':
                    break;
                case 'ol':
                    $output .= '<ol class="children list-unstyled">' . "\n";
                    break;
                case 'ul':
                default:
                    $output .= '<ul class="children list-unstyled">' . "\n";
                    break;
            }
        }
    }
}