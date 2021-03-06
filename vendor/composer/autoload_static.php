<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5eb2a944ad685799e7b9d389c8eb72b8
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5eb2a944ad685799e7b9d389c8eb72b8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5eb2a944ad685799e7b9d389c8eb72b8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
