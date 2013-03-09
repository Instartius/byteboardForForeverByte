<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Behind
 * @version 0.0.1
 * @created 1/19/13
 * El Code Behind del componente @see navbar.php
 */

class NavBar
{
    static function NavMenu()
    {
        if ( is_user_logged_in() )
        {
            wp_nav_menu( array( 'theme_location' => 'logged-in-menu' ) ); /* if the visitor is logged in, this primary navigation will be displayed */
        }
        else
        {
            wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); /* if the visitor is NOT logged in, this primary navigation will be displayed. if a single menu should be displayed for both conditions, set the same menues to be displayed under both conditions through the Wordpress backend */
        }
    }

    static function SearchForm()
    {
        get_search_form();
    }
}
