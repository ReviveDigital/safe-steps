<?php 

if( function_exists('acf_add_options_page') ) {
   acf_add_options_page(array(
      'page_title'   => 'Company Information',
      'menu_title'   => 'Company Information',
      'menu_slug'    => 'company-information',
      'position'     => '30',
      'icon_url'     => 'dashicons-phone'
   ));

   acf_add_options_page(array(
      'page_title'   => 'Donate',
      'menu_title'   => 'Donate',
      'menu_slug'    => 'donate',
      'position'     => '30',
      'icon_url'     => 'dashicons-heart'
   ));
}