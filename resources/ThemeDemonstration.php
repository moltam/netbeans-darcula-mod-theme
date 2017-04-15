<?php

/**
 * Theme demonstration.
 */
class Theme
{
    const SOME_CONST = 42;

    private $fooBar = 'foo';
    private static $fooBaz = 'baz';

    /**
     * @return string
     */
    public static function staticMethod()
    {
        return Baz::someMethod();
    }

    /**
     * @param string $param Some argument description
     * @param bool $bool [optional]
     *
     * @return string The transformed input
     */
    public function objectMethod(string $param, bool $bool = false): string
    {
        if (true === $bool) {
            return 'true';
        }

        $replaces = [
            'static' => self::staticMethod(),
            'static2' => self::$fooBaz,
            'attr' => $this->fooBar,
            'hex' => 0x12345,
            'const' => self::SOME_CONST,
            'const2' => Baz::COME_SONT,
        ];

        return strtr(mb_strtolower($param), $replaces);
    }
}
