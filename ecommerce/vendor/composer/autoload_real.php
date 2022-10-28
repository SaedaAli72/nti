<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit49a7f1d9a8c6d992f34cd6138d3607fc
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit49a7f1d9a8c6d992f34cd6138d3607fc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit49a7f1d9a8c6d992f34cd6138d3607fc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit49a7f1d9a8c6d992f34cd6138d3607fc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}