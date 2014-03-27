<?php
namespace Evo\Service;

class Calculate
{
    public function sumNatural($number)
    {
        $result = 0;

        for ($i = 0; $i < $number; $i++) {
            if ($this->isNatural($i) && ($this->isMultiple($i, 5) || $this->isMultiple($i, 3))) {
                $result += $i;
            }
        }

        return $result;
    }

    private function isNatural($number)
    {
        return ceil($number) - floor($number) == 0;
    }

    private function isMultiple($number, $multiple)
    {
        return $number % $multiple == 0;
    }
}
