<?php

declare(strict_types=1);

namespace Jascha030\WPLTemplate\Bootstrap;

use Jascha030\PluginLib\Exception\Psr11\DoesNotImplementHookableInterfaceException;
use Jascha030\PluginLib\Exception\Psr11\DoesNotImplementProviderInterfaceException;
use Jascha030\PluginLib\Plugin\ConfigurablePluginApiRegistry as Plugin;

\defined('ABSPATH') || exit('Forbidden.');

/**
 * Composer Auto loading
 * Throws exception when autoload.php doesn't exist.
 */
$loader = include __DIR__.'/loader.php';

require_once $loader(\dirname(__DIR__));

/**
 * Get plugin instance.
 * Serves as replacement for a class implementing the singleton pattern.
 */
function plugin(): Plugin
{
    static $plugin;

    if (! isset($plugin)) {
        $plugin = new Plugin(
            'WPL Plugin Template',
            WPL_PLUGIN_FILE,
            WPL_PLUGIN_DIR.'/config/plugin.php'
        );

        try {
            $plugin->run();
        } catch (DoesNotImplementHookableInterfaceException | DoesNotImplementProviderInterfaceException $e) {
            if (\function_exists('wp_die')) {
                \wp_die($e->getMessage());
            }

            \exit($e->getMessage());
        }
    }

    return $plugin;
}

/*
 * Hook initial (constructing) call to plugin class.
 */
if (\function_exists('add_action')) {
    \add_action('plugins_loaded', __NAMESPACE__.'\\plugin', 10);
}
