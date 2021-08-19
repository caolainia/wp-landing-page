<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf60942179b37d610bd9fc61ba1d8e757
{
    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wpscholar\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wpscholar\\' => 
        array (
            0 => __DIR__ . '/..' . '/wpscholar/url',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'wpscholar\\Url' => __DIR__ . '/..' . '/wpscholar/url/Url.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf60942179b37d610bd9fc61ba1d8e757::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf60942179b37d610bd9fc61ba1d8e757::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf60942179b37d610bd9fc61ba1d8e757::$classMap;

        }, null, ClassLoader::class);
    }
}
