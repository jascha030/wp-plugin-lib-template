<?php

declare(strict_types=1);

defined('ABSPATH') || exit('Forbidden.');

return static function (string $pluginDir): string {
    $prioritisedAutoloaders = [
        $pluginDir.'/vendor/autoload.php', // Local plugin.
        ABSPATH.'/vendor/autoload.php', // Normal WP-root.
        dirname(ABSPATH, 2).'/vendor/autoload.php', // Relative to git root.
    ];

    foreach ($prioritisedAutoloaders as $autoloaderPath) {
        if (is_file($autoloaderPath)) {
            return $autoloaderPath;
        }
    }

    $errorMsg = sprintf(
        'Couldn\'t find Composer\'s Autoloader file in any of the following paths:
                %s, please make sure you run the %s or %s commands.',
        implode(', ', $prioritisedAutoloaders),
        '<pre>composer install --prefer-source</pre>',
        '<pre>composer dump-autoload</pre>'
    );

    throw new \RuntimeException($errorMsg);
};
