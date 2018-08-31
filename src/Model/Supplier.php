<?php

namespace App\Model;

class Supplier
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Supplier
     */
    public function setName(string $name): Supplier
    {
        $this->name = $name;
        return $this;
    }


}