<?php

use PHPUnit\Framework\TestCase;
use WojciechMruk\LaravelValidator\Iso8610DateValidator;


class Iso8610DateValidatorTest extends TestCase
{

    /**
     *
     * @test
     */
    function validate()
    {
        $validator = new Iso8610DateValidator();

        //invalid
        $this->assertFalse($validator->validate('', '2018/12', '', ''));
        $this->assertFalse($validator->validate('', '2018-15', '', ''));
        $this->assertFalse($validator->validate('', '01/05/2018', '', ''));

        //valid
        $this->assertTrue($validator->validate('', '2018', '', ''));
        $this->assertTrue($validator->validate('', '2018-07', '', ''));
        $this->assertTrue($validator->validate('', '2018-07-31', '', ''));
        $this->assertTrue($validator->validate('', '2018-07-31 10', '', ''));
        $this->assertTrue($validator->validate('', '2018-07-31T10', '', ''));
        $this->assertTrue($validator->validate('', '2018-07-31T10:00', '', ''));
        $this->assertTrue($validator->validate('', '2018-07-31T10:00:00', '', ''));
        $this->assertTrue($validator->validate('', '2018-07-31T10:53:00+05:00', '', ''));
        $this->assertTrue($validator->validate('', '2018-07-31T10:20:30.45+01:00', '', ''));
    }
}