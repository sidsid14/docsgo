<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita6a2844bf8186bd1e1a16bc4a9239999
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '25072dd6e2470089de65ae7bf11d3109' => __DIR__ . '/..' . '/symfony/polyfill-php72/bootstrap.php',
        'f598d06aa772fa33d905e87be6398fb1' => __DIR__ . '/..' . '/symfony/polyfill-intl-idn/bootstrap.php',
        'bd9634f2d41831496de0d3dfe4c94881' => __DIR__ . '/..' . '/symfony/polyfill-php56/bootstrap.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        'b33e3d135e5d9e47d845c576147bda89' => __DIR__ . '/..' . '/php-di/php-di/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Util\\' => 22,
            'Symfony\\Polyfill\\Php72\\' => 23,
            'Symfony\\Polyfill\\Php56\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Intl\\Idn\\' => 26,
            'Symfony\\Contracts\\Service\\' => 26,
            'Symfony\\Contracts\\EventDispatcher\\' => 34,
            'Symfony\\Component\\Security\\Csrf\\' => 32,
            'Symfony\\Component\\Security\\Core\\' => 32,
            'Symfony\\Component\\Mime\\' => 23,
            'Symfony\\Component\\HttpFoundation\\' => 33,
            'SuperClosure\\' => 13,
        ),
        'R' => 
        array (
            'Rakit\\Validation\\' => 17,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
            'PhpParser\\' => 10,
            'PhpDocReader\\' => 13,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'L' => 
        array (
            'League\\Flysystem\\ZipArchive\\' => 28,
            'League\\Flysystem\\' => 17,
        ),
        'I' => 
        array (
            'Invoker\\' => 8,
        ),
        'F' => 
        array (
            'Filegator\\' => 10,
            'FastRoute\\' => 10,
        ),
        'D' => 
        array (
            'DI\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Util\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-util',
        ),
        'Symfony\\Polyfill\\Php72\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php72',
        ),
        'Symfony\\Polyfill\\Php56\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php56',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Intl\\Idn\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-intl-idn',
        ),
        'Symfony\\Contracts\\Service\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/service-contracts',
        ),
        'Symfony\\Contracts\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher-contracts',
        ),
        'Symfony\\Component\\Security\\Csrf\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/security-csrf',
        ),
        'Symfony\\Component\\Security\\Core\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/security-core',
        ),
        'Symfony\\Component\\Mime\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/mime',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'SuperClosure\\' => 
        array (
            0 => __DIR__ . '/..' . '/jeremeamia/superclosure/src',
        ),
        'Rakit\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/rakit/validation/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
        'PhpDocReader\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/phpdoc-reader/src/PhpDocReader',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'League\\Flysystem\\ZipArchive\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem-ziparchive/src',
        ),
        'League\\Flysystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem/src',
        ),
        'Invoker\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/invoker/src',
        ),
        'Filegator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/backend',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'DI\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/php-di/src',
        ),
    );

    public static $classMap = array (
        'Dibi\\Bridges\\Nette\\DibiExtension22' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Bridges/Nette/DibiExtension22.php',
        'Dibi\\Bridges\\Tracy\\Panel' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Bridges/Tracy/Panel.php',
        'Dibi\\Connection' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Connection.php',
        'Dibi\\ConstraintViolationException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\DataSource' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/DataSource.php',
        'Dibi\\DateTime' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/DateTime.php',
        'Dibi\\Driver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/interfaces.php',
        'Dibi\\DriverException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\Drivers\\DummyDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/DummyDriver.php',
        'Dibi\\Drivers\\FirebirdDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/FirebirdDriver.php',
        'Dibi\\Drivers\\FirebirdReflector' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/FirebirdReflector.php',
        'Dibi\\Drivers\\FirebirdResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/FirebirdResult.php',
        'Dibi\\Drivers\\MySqlReflector' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/MySqlReflector.php',
        'Dibi\\Drivers\\MySqliDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/MySqliDriver.php',
        'Dibi\\Drivers\\MySqliResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/MySqliResult.php',
        'Dibi\\Drivers\\NoDataResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/NoDataResult.php',
        'Dibi\\Drivers\\OdbcDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/OdbcDriver.php',
        'Dibi\\Drivers\\OdbcReflector' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/OdbcReflector.php',
        'Dibi\\Drivers\\OdbcResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/OdbcResult.php',
        'Dibi\\Drivers\\OracleDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/OracleDriver.php',
        'Dibi\\Drivers\\OracleReflector' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/OracleReflector.php',
        'Dibi\\Drivers\\OracleResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/OracleResult.php',
        'Dibi\\Drivers\\PdoDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/PdoDriver.php',
        'Dibi\\Drivers\\PdoResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/PdoResult.php',
        'Dibi\\Drivers\\PostgreDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/PostgreDriver.php',
        'Dibi\\Drivers\\PostgreReflector' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/PostgreReflector.php',
        'Dibi\\Drivers\\PostgreResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/PostgreResult.php',
        'Dibi\\Drivers\\Sqlite3Driver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/Sqlite3Driver.php',
        'Dibi\\Drivers\\Sqlite3Result' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/Sqlite3Result.php',
        'Dibi\\Drivers\\SqliteDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/SqliteDriver.php',
        'Dibi\\Drivers\\SqliteReflector' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/SqliteReflector.php',
        'Dibi\\Drivers\\SqliteResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/SqliteResult.php',
        'Dibi\\Drivers\\SqlsrvDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/SqlsrvDriver.php',
        'Dibi\\Drivers\\SqlsrvReflector' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/SqlsrvReflector.php',
        'Dibi\\Drivers\\SqlsrvResult' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Drivers/SqlsrvResult.php',
        'Dibi\\Event' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Event.php',
        'Dibi\\Exception' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\Expression' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Expression.php',
        'Dibi\\Fluent' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Fluent.php',
        'Dibi\\ForeignKeyConstraintViolationException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\HashMap' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/HashMap.php',
        'Dibi\\HashMapBase' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/HashMap.php',
        'Dibi\\Helpers' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Helpers.php',
        'Dibi\\IConnection' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/interfaces.php',
        'Dibi\\IDataSource' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/interfaces.php',
        'Dibi\\Literal' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Literal.php',
        'Dibi\\Loggers\\FileLogger' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Loggers/FileLogger.php',
        'Dibi\\NotImplementedException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\NotNullConstraintViolationException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\NotSupportedException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\PcreException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\ProcedureException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'Dibi\\Reflection\\Column' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Reflection/Column.php',
        'Dibi\\Reflection\\Database' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Reflection/Database.php',
        'Dibi\\Reflection\\ForeignKey' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Reflection/ForeignKey.php',
        'Dibi\\Reflection\\Index' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Reflection/Index.php',
        'Dibi\\Reflection\\Result' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Reflection/Result.php',
        'Dibi\\Reflection\\Table' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Reflection/Table.php',
        'Dibi\\Reflector' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/interfaces.php',
        'Dibi\\Result' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Result.php',
        'Dibi\\ResultDriver' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/interfaces.php',
        'Dibi\\ResultIterator' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/ResultIterator.php',
        'Dibi\\Row' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Row.php',
        'Dibi\\Strict' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Strict.php',
        'Dibi\\Translator' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Translator.php',
        'Dibi\\Type' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/Type.php',
        'Dibi\\UniqueConstraintViolationException' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/exceptions.php',
        'dibi' => __DIR__ . '/..' . '/dibi/dibi/src/Dibi/dibi.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita6a2844bf8186bd1e1a16bc4a9239999::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita6a2844bf8186bd1e1a16bc4a9239999::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita6a2844bf8186bd1e1a16bc4a9239999::$classMap;

        }, null, ClassLoader::class);
    }
}