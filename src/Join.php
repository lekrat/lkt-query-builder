<?php

namespace Lkt\QueryBuilding;

class Join
{
    protected $direction = '';
    protected $table = '';
    protected $on = [];

    /**
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->table = $table;
    }

    /**
     * @param string $direction
     * @return $this
     */
    protected function setDirection(string $direction = 'left join'): Join
    {
        $this->direction = $direction;
        return $this;
    }


    /**
     * @param string $table
     * @return Join
     */
    public static function leftJoin(string $table): Join
    {
        return (new Join($table))->setDirection('left join');
    }


    /**
     * @param string $table
     * @return Join
     */
    public static function rightJoin(string $table): Join
    {
        return (new Join($table))->setDirection('right join');
    }

    /**
     * @param string $originTableColum
     * @param string $joinedTableColumn
     * @return $this
     */
    public function on(string $originTableColum, string $joinedTableColumn): self
    {
        $this->on[] = [$originTableColum, $joinedTableColumn];
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $direction = strtoupper($this->direction);

        $on = [];
        foreach ($this->on as $value) {
            $on[] = "{{---LKT_PARENT_TABLE---}}.{$value[0]} = {$this->table}.{$value[1]}";
        }
        $strOn = implode(' AND ', $on);
        if ($strOn !== '') {
            $strOn = "ON ({$strOn})";
        }
        return "{$direction} {$this->table} {$strOn}";
    }
}