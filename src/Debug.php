<?php

namespace Militer\devCore;

class Debug

{
    private static $server_arr = [
        "DOCUMENT_ROOT",
        "REQUEST_SCHEME",
        "SERVER_NAME",
        "HTTP_HOST",
        "HTTP_USER_AGENT",
        "PHP_SELF",
        "SCRIPT_NAME",
        "SCRIPT_FILENAME",
        "REQUEST_METHOD",
        "REDIRECT_URL",
        "REQUEST_URI",
        "QUERY_STRING",
    ];

    public static function whoAmI($file)
    {
        echo '<br>Я файл <strong>' . basename($file) . '</strong> подключился из папки <strong>' . dirname($file) . '</strong><br>';
    }

    public static function newClassInstance($class)
    {
        echo '<br>Cоздан объект класса <strong>' . $class . '</strong><br>';
    }

    public static function showRelPath($file)
    {
        $absolute_path = dirname($file);
        $relative_path = str_replace(_ROOT_, '', $absolute_path);
        echo '<br>Относительный путь: ' . $relative_path . '<br>';
    }

    private static function pre($func, $obj = null)
    {
        echo '<br><pre>';
        \call_user_func($func, $obj);
        echo '<br>';
        debug_print_backtrace();
        echo '</pre><br>';
    }

    public static function vd($obj)
    {
        self::pre('var_dump', $obj);
    }

    public static function print($obj)
    {
        self::pre('print_r', $obj);
    }

    public static function server()
    {
        echo '<br><table>';
        foreach (self::$server_arr as $value) {
            echo "<tr><td>\$_SERVER[$value]</td><td> ==> </td><td>$_SERVER[$value]</td></tr>";
        }
        echo '</table><br>';
        // \debug_print_backtrace();
    }
}
