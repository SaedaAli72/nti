<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit49a7f1d9a8c6d992f34cd6138d3607fc
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit49a7f1d9a8c6d992f34cd6138d3607fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit49a7f1d9a8c6d992f34cd6138d3607fc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit49a7f1d9a8c6d992f34cd6138d3607fc::$classMap;

        }, null, ClassLoader::class);
    }
}