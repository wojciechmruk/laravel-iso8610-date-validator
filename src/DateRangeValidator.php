<?php

namespace WojciechMruk\LaravelValidator;

use DateTime;

/**
 * Description:
 *
 * Validate if the date is not from the future or from the past
 *
 * @author Wojciech Mruk
 */
class DateRangeValidator
{

    /**
     * Check if provided date is not from the future
     *
     * @param $attribute // not used, but it must be here for the Laravel validation to work.
     * @param $value    // the real date
     * @param $parameters //not used, but it must be here for the Laravel validation to work
     * @param $validator //not used, but it must be here for the Laravel validation to work
     * @return type
     */
    public function notFromTheFuture($attribute, $value, $parameters, $validator)
    {

        return (new DateTime('now')) > (new DateTime($value));
    }

    /**
     * Check if provided date is from the future
     *
     * @param $attribute // not used, but it must be here for the Laravel validation to work.
     * @param $value    // the real date
     * @param $parameters //not used, but it must be here for the Laravel validation to work
     * @param $validator //not used, but it must be here for the Laravel validation to work
     * @return type
     */
    public function fromTheFuture($attribute, $value, $parameters, $validator)
    {

        return !$this->notFromTheFuture($attribute, $value, $parameters, $validator);
    }

    /**
     * Check if provided date is not from the past
     *
     * @param $attribute // not used, but it must be here for the Laravel validation to work.
     * @param $value    // the real date
     * @param $parameters //not used, but it must be here for the Laravel validation to work
     * @param $validator //not used, but it must be here for the Laravel validation to work
     * @return type
     */
    public function notFromThePast($attribute, $value, $parameters, $validator)
    {

        return (new DateTime('now')) <= (new DateTime($value));
    }

    /**
     * Check if provided date is from the past
     *
     * @param $attribute // not used, but it must be here for the Laravel validation to work.
     * @param $value    // the real date
     * @param $parameters //not used, but it must be here for the Laravel validation to work
     * @param $validator //not used, but it must be here for the Laravel validation to work
     * @return type
     */
    public function fromThePast($attribute, $value, $parameters, $validator)
    {

        return !$this->notFromThePast($attribute, $value, $parameters, $validator);
    }
}