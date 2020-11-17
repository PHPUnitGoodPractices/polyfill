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
        $this->fail();
    }
}
