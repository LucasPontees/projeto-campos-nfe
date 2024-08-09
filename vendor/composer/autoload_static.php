<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48d2371bdc53c7798a2a3b42c1171083
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'N' => 
        array (
            'NFePHP\\NFe\\' => 11,
            'NFePHP\\Gtin\\' => 12,
            'NFePHP\\DA\\' => 10,
            'NFePHP\\Common\\' => 14,
        ),
        'J' => 
        array (
            'JsonSchema\\' => 11,
        ),
        'C' => 
        array (
            'Com\\Tecnick\\Color\\' => 18,
            'Com\\Tecnick\\Barcode\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'NFePHP\\NFe\\' => 
        array (
            0 => __DIR__ . '/..' . '/nfephp-org/sped-nfe/src',
        ),
        'NFePHP\\Gtin\\' => 
        array (
            0 => __DIR__ . '/..' . '/nfephp-org/sped-gtin/src',
        ),
        'NFePHP\\DA\\' => 
        array (
            0 => __DIR__ . '/..' . '/nfephp-org/sped-da/src',
        ),
        'NFePHP\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/nfephp-org/sped-common/src',
        ),
        'JsonSchema\\' => 
        array (
            0 => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema',
        ),
        'Com\\Tecnick\\Color\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-color/src',
        ),
        'Com\\Tecnick\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-barcode/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit48d2371bdc53c7798a2a3b42c1171083::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit48d2371bdc53c7798a2a3b42c1171083::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit48d2371bdc53c7798a2a3b42c1171083::$classMap;

        }, null, ClassLoader::class);
    }
}
