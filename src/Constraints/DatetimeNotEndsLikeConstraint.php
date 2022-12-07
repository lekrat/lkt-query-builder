<?php

namespace Lkt\QueryBuilding\Constraints;

class DatetimeNotEndsLikeConstraint extends AbstractConstraint
{
    public function __toString(): string
    {
        $v = addslashes(stripslashes($this->value));
        return "{$this->column} NOT LIKE '%{$v}'";
    }
}