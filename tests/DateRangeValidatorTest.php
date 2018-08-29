<?php

use PHPUnit\Framework\TestCase;
use WojciechMruk\LaravelValidator\DateRangeValidator;

class DateRangeValidatorTest extends TestCase
{

    /**
     *
     * @test
     */
    function notFromTheFuture()
    {
        $validator = new DateRangeValidator();
        $this->assertTrue($validator->notFromTheFuture('', '2018-07-31', '', ''));
        $this->assertFalse($validator->notFromTheFuture('', '2058-07-31', '', ''));
    }

    /**
     *
     * @test
     */
    function fromTheFuture()
    {
        $validator = new DateRangeValidator();
        $this->assertTrue($validator->fromTheFuture('', '2058-07-31', '', ''));
        $this->assertFalse($validator->fromTheFuture('', '2018-07-31', '', ''));
    }

    /**
     *
     * @test
     */
    function notFromThePast()
    {
        $validator = new DateRangeValidator();
        $this->assertFalse($validator->notFromThePast('', '2018-07-31', '', ''));
        $this->assertTrue($validator->notFromThePast('', '2058-07-31', '', ''));
    }

    /**
     *
     * @test
     */
    function fromThePast()
    {
        $validator = new DateRangeValidator();
        $this->assertFalse($validator->fromThePast('', '2058-07-31', '', ''));
        $this->assertTrue($validator->fromThePast('', '2018-07-31', '', ''));
    }
}