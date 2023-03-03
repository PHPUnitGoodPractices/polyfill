<?php

/*
 * This file is part of PHPUnit Good Practices.
 *
 * (c) Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

foreach ([
    'PHPUnit_Framework_Error_Warning' => 'PHPUnit\Framework\Error\Warning',
    'PHPUnit_Framework_ExpectationFailedException' => 'PHPUnit\Framework\ExpectationFailedException',
    'PHPUnit_Framework_TestCase' => 'PHPUnit\Framework\TestCase',
    'PHPUnit_Runner_Version' => 'PHPUnit\Runner\Version',
] as $new => $old) {
    if (!class_exists($new) && class_exists($old)) {
        class_alias($old, $new);
    }
}
