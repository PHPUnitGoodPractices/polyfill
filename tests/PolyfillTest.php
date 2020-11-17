<?php

/*
 * This file is part of PHPUnit Good Practices.
 *
 * (c) Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PHPUnitGoodPractices\Tests\Polyfill;

use PHPUnit\Framework\TestCase;
use PHPUnitGoodPractices\Polyfill\PolyfillTrait;

class PolyfillTest extends TestCase
{
    use PolyfillTrait;

    public function testExpectException()
    {
        $this->expectException(\RuntimeException::class);

        throw new \RuntimeException();
    }

    public function testExpectExceptionMessageMatches()
    {
        $this->expectExceptionMessageMatches('/example/');

        throw new \RuntimeException('example');
    }

    public function testAssertIsArray()
    {
        $this->assertIsArray([]);
    }

    public function testAssertIsString()
    {
        $this->assertIsString('');
    }

    public function testAssertIsBool()
    {
        $this->assertIsBool(true);
    }

    public function testAssertIsCallable()
    {
        $this->assertIsCallable([$this, 'testAssertIsCallable']);
    }

    public function testAssertIsInt()
    {
        $this->assertIsInt(1);
    }

    public function testAssertMatchesRegularExpression()
    {
        $this->assertMatchesRegularExpression('/\d/', '123');
    }

    public function testAssertStringContainsString()
    {
        $this->assertStringContainsString('test', 'testing');
    }

    public function testAssertStringNotContainsString()
    {
        $this->assertStringNotContainsString('foobar', 'testing');
    }

    public function testAssertFileDoesNotExist()
    {
        $this->assertFileDoesNotExist('invalid');
    }
}
