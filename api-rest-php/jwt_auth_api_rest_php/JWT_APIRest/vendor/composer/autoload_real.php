<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb909c957ab128ba51a31f0d0a00970c2
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

        spl_autoload_register(array('ComposerAutoloaderInitb909c957ab128ba51a31f0d0a00970c2', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb909c957ab128ba51a31f0d0a00970c2', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb909c957ab128ba51a31f0d0a00970c2::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
