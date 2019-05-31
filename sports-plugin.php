<?php
/*
Plugin Name: Sports Plugin
Plugin URI:  http://localhost/wordpress
Description: Basic WordPress Plugin Header Comment
Version:     1.0
Author:      Anjani Anusuri
Author URI:  http://localhost/wordpress
Text Domain: wporg
Domain Path: /languages
License:     GPL2

{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

function anjani_custom_posttypes() {
  $args = array(
    'public' => true,
    'label' => 'Careers'
  );
  register_post_type('careers', $args);
}

add_action('init', 'anjani_custom_posttypes');
