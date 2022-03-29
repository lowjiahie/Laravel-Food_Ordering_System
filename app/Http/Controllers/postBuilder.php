<?php
namespace App\Http\Controllers;

class postBuilder {
     public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        // Some code handling specific conditions and 
        // delegating to helper functions 

        $type = 'Basic';
        $this->wheres[] = compact(
            'type', 'column', 'operator', 'value', 'boolean'
        );
        if (! $value instanceof Expression) {
            $this->addBinding($value, 'where');
        }
        return $this;
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->{$this->unions ? 'unionOrders' : 'orders'}[] = [
            'column' => $column,
            'direction' => strtolower($direction) == 'asc' ? 'asc' : 'desc',
        ];
        return $this;
    }

    public function limit($value)
    {
        $property = $this->unions ? 'unionLimit' : 'limit';
        if ($value >= 0) {
            $this->$property = $value;
        }
        return $this;
    }
}
