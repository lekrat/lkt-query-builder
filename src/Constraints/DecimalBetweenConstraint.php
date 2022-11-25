<?php

namespace Lkt\QueryBuilding\Constraints;

class DecimalBetweenConstraint extends AbstractConstraint
{
    public function __toString(): string
    {
        if (count($this->value) < 2) {
            return '';
        }
        $values = array_map(function($v){ return addslashes(stripslashes((float)$v));}, $this->value);

        return "{$this->column} BETWEEN '{$values[0]}' AND '{$values[1]}'";
    }
}