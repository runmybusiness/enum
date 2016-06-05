<?php

namespace RunMyBusiness\Enum;

use Closure;
use ReflectionClass;

/**
 * Class Enum.
 */
trait Enum
{
    /**
     * Get the code for a constant label.
     *
     * @param string $label
     *
     * @return mixed
     */
    public static function getCode($label)
    {
        $class = new ReflectionClass(get_called_class());
        $constants = $class->getConstants();

        return $constants[strtoupper($label)];
    }

    /**
     * Get the label for a constant code.
     *
     * @param mixed  $code
     * @param string $prefix
     * @param bool   $strip_text
     *
     * @return mixed
     */
    public static function getLabel($code, string $prefix = null, bool $strip_text = false) : string
    {
        $class = new ReflectionClass(get_called_class());
        $constants = $class->getConstants();

        if ($prefix) {
            foreach ($constants as $key => $val) {
                if (!starts_with($key, $prefix)) {
                    unset($constants[$key]);
                }
            }
        }

        $constants = array_flip($constants);

        return ($strip_text) ? str_replace($prefix, '', $constants[(int) $code]) : $constants[(int) $code];
    }

    /**
     * @param mixed  $code
     * @param string $prefix
     *
     * @return string
     */
    public static function getFriendlyLabel($code, string $prefix = null) : string
    {
        return ucwords(strtolower(str_replace('_', ' ', static::getLabel($code, $prefix, true))));
    }

    /**
     * Get the list of constants.
     *
     * @param string|null $prefix
     * @param bool        $strip_text
     * @param \Closure    $transformKey
     *
     * @return array
     */
    public static function getConstantList(string $prefix = null, bool $strip_text = true, Closure $transformKey = null) : array
    {
        $class = new ReflectionClass(get_called_class());
        $constants = $class->getConstants();

        $list = [];
        foreach ($constants as $key => $val) {
            if ($prefix && !starts_with($key, $prefix)) {
                unset($constants[$key]);
                continue;
            }

            if ($strip_text && $prefix) {
                $key = str_replace('_', ' ', str_replace($prefix, '', $key));
            }

            if ($transformKey) {
                $list[$val] = $transformKey($key);
            } else {
                $list[$val] = ucwords(strtolower($key));
            }
        }

        return $list;
    }

    /**
     * Get the codes the constants provide.
     *
     * @param null|string $prefix
     *
     * @return array
     */
    public static function getConstantCodes(string $prefix = null) : array
    {
        return array_keys(static::getConstantList($prefix));
    }
}
