<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf01f0e07decaf6111d8c9a6d2af6aca3
{
    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'CPT' => 
            array (
                0 => __DIR__ . '/..' . '/jjgrainger/wp-custom-post-type-class/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitf01f0e07decaf6111d8c9a6d2af6aca3::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
