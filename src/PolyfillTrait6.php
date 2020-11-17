<?php

/*
 * This file is part of PHPUnit Good Practices.
 *
 * (c) Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PHPUnitGoodPractices\Polyfill;

/**
 * @internal
 */
trait PolyfillTrait6
{
    public function expectException($exception)
    {
        if (\is_callable(['parent', 'expectException'])) {
            parent::expectException($exception);
        } else {
            $this->setExpectedException($exception);
        }
    }

    public function expectExceptionMessageMatches($regexp)
    {
        if (\is_callable(['parent', 'expectExceptionMessageMatches'])) {
            parent::expectExceptionMessageMatches($regexp);
        } elseif (\is_callable(['parent', 'setExpectedExceptionRegExp'])) {
            $this->setExpectedExceptionRegExp(\Exception::class, $regexp);
        } else {
            $this->expectExceptionMessageRegExp($regexp);
        }
    }

    public static function assertIsArray($actual, $message = '')
    {
        static::assertInternalType('array', $actual, $message);
    }

    public static function assertIsString($actual, $message = '')
    {
        static::assertInternalType('string', $actual, $message);
    }

    public static function assertIsBool($actual, $message = '')
    {
        static::assertInternalType('bool', $actual, $message);
    }

    public static function assertIsCallable($actual, $message = '')
    {
        static::assertInternalType('callable', $actual, $message);
    }

    public static function assertIsInt($actual, $message = '')
    {
        static::assertInternalType('int', $actual, $message);
    }

    public static function assertMatchesRegularExpression($pattern, $string, $message = '')
    {
        static::assertRegExp($pattern, $string, $message);
    }

    public static function assertStringContainsString($needle, $haystack, $message = '')
    {
        static::assertContains($needle, $haystack, $message);
    }

    public static function assertStringNotContainsString($needle, $haystack, $message = '')
    {
        static::assertNotContains($needle, $haystack, $message);
    }

    public static function assertFileDoesNotExist($filename, $message = '')
    {
        static::assertFileNotExists($filename, $message);
    }
}
