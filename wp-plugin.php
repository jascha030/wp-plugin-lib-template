<?php

declare(strict_types=1);

/**
 * Main plugin file for jascha030/wp-plugin-lib-template.
 *
 * @version 1.0.0
 *
 * @author  Jascha030 <contact@jaschavanaalst.nl>
 * @wordpress-plugin
 * Plugin Name:       WPL Plugin template
 * Plugin URI:        https://github.com/jascha030/wp-plugin-lib-template
 * Description:       An example plugin
 * Version:           1.0.0
 * Requires at least: 5.7
 * Requires PHP:      7.4
 * Author:            Jascha030
 * Author URI:        https://github.com/jascha030
 * Text Domain:       wpl-plugin
 * Update URI:        false
 */
defined('ABSPATH') || exit('Forbidden.');

/*
 * Set plugin globals.
 */
if (!defined('WPL_PLUGIN_FILE')) {
    define('WPL_PLUGIN_FILE', __FILE__);
    define('WPL_PLUGIN_DIR', __DIR__);
}

include __DIR__.'/includes/bootstrap.php';

/*
 * Now this... this is real silence...
 */
