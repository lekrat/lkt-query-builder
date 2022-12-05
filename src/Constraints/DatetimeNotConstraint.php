<?php

namespace Lkt\QueryBuilding\Constraints;

class DatetimeNotConstraint extends AbstractConstraint
{
    public function __toString(): string
    {
        $column = $this->column;
        $value = $this->value;

        $v = addslashes(stripslashes($value));
        return "{$column} != '{$v}'";
    }
}