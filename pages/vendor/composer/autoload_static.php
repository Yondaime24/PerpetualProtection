<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite68c8a21db2ee8294fc495582f5665c5
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MessageBird\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MessageBird\\' => 
        array (
            0 => __DIR__ . '/..' . '/messagebird/php-rest-api/src/MessageBird',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite68c8a21db2ee8294fc495582f5665c5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite68c8a21db2ee8294fc495582f5665c5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite68c8a21db2ee8294fc495582f5665c5::$classMap;

        }, null, ClassLoader::class);
    }
}
