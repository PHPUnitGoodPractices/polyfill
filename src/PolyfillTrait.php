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

if (version_compare(\PHPUnit\Runner\Version::id(), '7.0.0') < 0) {
    trait PolyfillTrait
    {
        use PolyfillTrait6;
    }
} elseif (version_compare(\PHPUnit\Runner\Version::id(), '10.0.0') < 0) {
    trait PolyfillTrait
    {
        use PolyfillTrait7;
    }
} else {
    trait PolyfillTrait
    {
    }
}
