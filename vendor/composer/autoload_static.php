<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9ac79137b11430f087d6b84c01b63ac5
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9ac79137b11430f087d6b84c01b63ac5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9ac79137b11430f087d6b84c01b63ac5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
