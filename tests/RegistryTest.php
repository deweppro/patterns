<?php

namespace Dewep\Tests;

use Dewep\Patterns\Registry;
use PHPUnit\Framework\TestCase;

class RegistryTest extends TestCase
{
    public function testTest()
    {
        ExampleOneRegistry::reset();
        ExampleTwoRegistry::reset();

        self::assertFalse(ExampleOneRegistry::has('a'));
        self::assertFalse(ExampleTwoRegistry::has('a'));

        self::assertFalse(ExampleOneRegistry::exist('a', 1));
        self::assertFalse(ExampleTwoRegistry::exist('a', 2));

        self::assertTrue(ExampleOneRegistry::exist('a', 1));
        self::assertTrue(ExampleTwoRegistry::exist('a', 2));

        self::assertTrue(ExampleOneRegistry::has('a'));
        self::assertTrue(ExampleTwoRegistry::has('a'));

        self::assertEquals(ExampleOneRegistry::get('a'), 1);
        self::assertEquals(ExampleTwoRegistry::get('a'), 2);

        self::assertNotEquals(
            ExampleOneRegistry::get('a'),
            ExampleTwoRegistry::get('a')
        );

        ExampleOneRegistry::set('a', 2);
        ExampleTwoRegistry::set('a', 1);

        self::assertNotEquals(ExampleOneRegistry::get('a'), 1);
        self::assertNotEquals(ExampleTwoRegistry::get('a'), 2);

        ExampleOneRegistry::remove('a');
        ExampleTwoRegistry::remove('a');

        self::assertFalse(ExampleOneRegistry::has('a'));
        self::assertFalse(ExampleTwoRegistry::has('a'));

        self::assertEmpty(ExampleOneRegistry::all());
        self::assertEmpty(ExampleTwoRegistry::all());

        ExampleTwoRegistry::set('a', 1);

        self::assertEmpty(ExampleOneRegistry::all());
        self::assertNotEmpty(ExampleTwoRegistry::all());

        ExampleTwoRegistry::reset();

        self::assertEmpty(ExampleTwoRegistry::all());
    }
}

class ExampleOneRegistry extends Registry
{

}

class ExampleTwoRegistry extends Registry
{

}
