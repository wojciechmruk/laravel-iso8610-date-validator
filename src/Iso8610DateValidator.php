<?php

namespace WojciechMruk\LaravelValidator;

/**
 * Description:
 *
 * Validate if the date is not from the future or from the past
 *
 * @author Wojciech Mruk
 */
class Iso8610DateValidator
{

    /**
     *
     * @param $attribute // not used, but it must be here for the Laravel validation to work.
     * @param $value    // the real date
     * @param $parameters //not used, but it must be here for the Laravel validation to work
     * @param $validator //not used, but it must be here for the Laravel validation to work
     * @return bool
     */
    public function validate($attribute, $value, $parameters, $validator)
    {
        $regex = '/^([\+-]?\d{4}(?!\d{2}\b))((-?)((0[1-9]|1[0-2])(\3([12]\d|0[1-9]|3[01]))?'
            . '|W([0-4]\d|5[0-2])(-?[1-7])?|(00[1-9]|0[1-9]\d|[12]\d{2}|'
            . '3([0-5]\d|6[1-6])))([T\s]((([01]\d|2[0-3])((:?)[0-5]\d)?|24\:?00)'
            . '([\.,]\d+(?!:))?)?(\17[0-5]\d([\.,]\d+)?)?([zZ]|'
            . '([\+-])([01]\d|2[0-3]):?([0-5]\d)?)?)?)?$/';

        return preg_match($regex, $value) ? true : false;
    }
}