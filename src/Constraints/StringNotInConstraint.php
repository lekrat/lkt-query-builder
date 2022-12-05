<?php

namespace Lkt\QueryBuilding\Constraints;

class StringNotInConstraint extends AbstractConstraint
{
    public function __toString(): string
    {
        if (count($this->value) === 0) {
            return '';
        }
        $values = array_map(function($v){ return addslashes(stripslashes($v));}, $this->value);
        $value = "('".implode("','", $values)."')";

        return "{$this->column} NOT IN {$value}";
    }
}