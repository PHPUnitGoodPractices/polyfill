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
        if (\is_callable([parent::class, 'expectException'])) {
            parent::expectException($exception);
        } else {
            $this->setExpectedException($exception);
        }
    }

    public function expectExceptionMessageMatches($regexp)
    {
        if (\is_callable([parent::class, 'expectExceptionMessageMatches'])) {
            parent::expectExceptionMessageMatches($regexp);

            return;
        }

        // In some PHPUnit versions just setting an expectation for specific
        // expection message won't trigger exception handler. Therefore we need
        // to set the expected type, but trying to keep the type.
        if (\is_callable([parent::class, 'getExpectedException'])) {
            $expectedException = parent::getExpectedException(); // This is an @internal method.
        }

        if (null === $expectedException) {
            $expectedException = \Exception::class;
        }

        $this->expectException($expectedException);

        if (\is_callable([parent::class, 'expectExceptionMessageRegExp'])) {
            // Method available since Release 5.2.0
            $this->expectExceptionMessageRegExp($regexp);
        } else {
            $this->setExpectedExceptionRegExp($expectedException, $regexp);
        }
    }

    public static function assertIsArray($actual, $message = '')
    {
        if (\is_callable([parent::class, 'assertIsArray'])) {
            parent::assertIsArray($actual, $message);
        } else {
            static::assertInternalType('array', $actual, $message);
        }
    }

    public static function assertIsString($actual, $message = '')
    {
        if (\is_callable([parent::class, 'assertIsString'])) {
            parent::assertIsString($actual, $message);
        } else {
            static::assertInternalType('string', $actual, $message);
        }
    }

    public static function assertIsBool($actual, $message = '')
    {
        if (\is_callable([parent::class, 'assertIsBool'])) {
            parent::assertIsBool($actual, $message);
        } else {
            static::assertInternalType('bool', $actual, $message);
        }
    }

    public static function assertIsCallable($actual, $message = '')
    {
        if (\is_callable([parent::class, 'assertIsCallable'])) {
            parent::assertIsCallable($actual, $message);
        } else {
            static::assertInternalType('callable', $actual, $message);
        }
    }

    public static function assertIsInt($actual, $message = '')
    {
        if (\is_callable([parent::class, 'assertIsInt'])) {
            parent::assertIsInt($actual, $message);
        } else {
            static::assertInternalType('int', $actual, $message);
        }
    }

    public static function assertMatchesRegularExpression($pattern, $string, $message = '')
    {
        if (\is_callable([parent::class, 'assertMatchesRegularExpression'])) {
            parent::assertMatchesRegularExpression($pattern, $string, $message);
        } else {
            static::assertRegExp($pattern, $string, $message);
        }
    }

    public static function assertStringContainsString($needle, $haystack, $message = '')
    {
        if (\is_callable([parent::class, 'assertStringContainsString'])) {
            parent::assertStringContainsString($needle, $haystack, $message);
        } else {
            static::assertContains($needle, $haystack, $message);
        }
    }

    public static function assertStringNotContainsString($needle, $haystack, $message = '')
    {
        if (\is_callable([parent::class, 'assertStringNotContainsString'])) {
            parent::assertStringNotContainsString($needle, $haystack, $message);
        } else {
            static::assertNotContains($needle, $haystack, $message);
        }
    }

    public static function assertFileDoesNotExist($filename, $message = '')
    {
        if (\is_callable([parent::class, 'assertFileDoesNotExist'])) {
            parent::assertFileDoesNotExist($filename, $message);
        } else {
            static::assertFileNotExists($filename, $message);
        }
    }
}
