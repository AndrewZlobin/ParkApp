<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba2713f78acd1c4dee41c4188c88498c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Andrew\\ParkApp\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Andrew\\ParkApp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba2713f78acd1c4dee41c4188c88498c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba2713f78acd1c4dee41c4188c88498c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
