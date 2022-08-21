<?php

declare(strict_types=1);

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
trait PolyfillTrait7
{
    public function expectException(string $exception): void
    {
        if (\is_callable([parent::class, 'expectException'])) {
            parent::expectException($exception);
        } else {
            $this->setExpectedException($exception);
        }
    }

    public function expectExceptionMessageMatches(string $regexp): void
    {
        if (\is_callable([parent::class, 'expectExceptionMessageMatches'])) {
            parent::expectExceptionMessageMatches($regexp);
        } else {
            $this->expectExceptionMessageRegExp($regexp);
        }
    }

    public static function assertMatchesRegularExpression(string $pattern, string $string, string $message = ''): void
    {
        if (\is_callable([parent::class, 'assertMatchesRegularExpression'])) {
            parent::assertMatchesRegularExpression($pattern, $string, $message);
        } else {
            static::assertRegExp($pattern, $string, $message);
        }
    }

    public static function assertFileDoesNotExist(string $filename, string $message = ''): void
    {
        if (\is_callable([parent::class, 'assertFileDoesNotExist'])) {
            parent::assertFileDoesNotExist($filename, $message);
        } else {
            static::assertFileNotExists($filename, $message);
        }
    }
}
