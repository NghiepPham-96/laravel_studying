<?php
namespace App\Services;


class CustomValidator extends \Illuminate\Validation\Validator
{
    public function validateCustomAfterOrEqual($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'custom_after_or_equal');

        // $param = $this->getValue($parameters[0]);

        $keys = $this->getExplicitKeys($attribute);

        $_parameters = $this->replaceAsterisksInParameters($parameters, $keys);

        // return $this->validateAfterOrEqual($attribute, $value, $parameters);

        return $this->compareDates($attribute, $value, $_parameters, '>=');
    }



    protected function replaceCustomAfterOrEqual($message, $attribute, $rule, $parameters)
    {
        $keys = $this->getExplicitKeys($attribute);
        $_parameters = $this->replaceAsterisksInParameters($parameters, $keys);

        return str_replace([':date', ':name_of_date'], [$this->getValue($_parameters[0]), $this->getDisplayableAttribute($parameters[0])], $message);
    }
}