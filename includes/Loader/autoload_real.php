<?php

// autoload_real.php modified from Composer

/**
 * Class ApplicationAutoloaderInit
 */
class ApplicationAutoloaderInit
{
    private static $loader;

    /**
     * @param $class
     */
    public static function loadClassLoader($class)
    {
        if ('ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('SurveyAutoloaderInit', 'loadClassLoader'), true, true);
        self::$loader = $loader = new ClassLoader();
        spl_autoload_unregister(array('SurveyAutoloaderInit', 'loadClassLoader'));


        $classMap = require __DIR__ . '/autoload_classmap.php';
        if ($classMap) {
            $loader->addClassMap($classMap);
        }

        $loader->register(true);

        return $loader;
    }
}

/**
 * @param $file
 */
function surveyRequire($file)
{
    require $file;
}
