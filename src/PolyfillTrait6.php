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
        if (\is_callable(['parent', 'assertIsArray'])) {
            parent::assertIsArray($actual, $message);
        } else {
            static::assertInternalType('array', $actual, $message);
        }
    }

    public static function assertIsString($actual, $message = '')
    {
        if (\is_callable(['parent', 'assertIsString'])) {
            parent::assertIsString($actual, $message);
        } else {
            static::assertInternalType('string', $actual, $message);
        }
    }

    public static function assertIsBool($actual, $message = '')
    {
        if (\is_callable(['parent', 'assertIsBool'])) {
            parent::assertIsBool($actual, $message);
        } else {
            static::assertInternalType('bool', $actual, $message);
        }
    }

    public static function assertIsCallable($actual, $message = '')
    {
        if (\is_callable(['parent', 'assertIsCallable'])) {
            parent::assertIsCallable($actual, $message);
        } else {
            static::assertInternalType('callable', $actual, $message);
        }
    }

    public static function assertIsInt($actual, $message = '')
    {
        if (\is_callable(['parent', 'assertIsInt'])) {
            parent::assertIsInt($actual, $message);
        } else {
            static::assertInternalType('int', $actual, $message);
        }
    }

    public static function assertMatchesRegularExpression($pattern, $string, $message = '')
    {
        if (\is_callable(['parent', 'assertMatchesRegularExpression'])) {
            parent::assertMatchesRegularExpression($pattern, $string, $message);
        } else {
            static::assertRegExp($pattern, $string, $message);
        }
    }

    public static function assertStringContainsString($needle, $haystack, $message = '')
    {
        if (\is_callable(['parent', 'assertStringContainsString'])) {
            parent::assertStringContainsString($needle, $haystack, $message);
        } else {
            static::assertContains($needle, $haystack, $message);
        }
    }

    public static function assertStringNotContainsString($needle, $haystack, $message = '')
    {
        if (\is_callable(['parent', 'assertStringNotContainsString'])) {
            parent::assertStringNotContainsString($needle, $haystack, $message);
        } else {
            static::assertNotContains($needle, $haystack, $message);
        }
    }

    public static function assertFileDoesNotExist($filename, $message = '')
    {
        if (\is_callable(['parent', 'assertFileDoesNotExist'])) {
            parent::assertFileDoesNotExist($filename, $message);
        } else {
            static::assertFileNotExists($filename, $message);
        }
    }
}
