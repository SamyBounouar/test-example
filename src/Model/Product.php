<?php

namespace App\Model;

/**
 * Class Product
 * @package App\Model
 */
class Product
{
    /**
     * @var string
     */
    private $id = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $type = '';

    /**
     * @var array
     */
    private $suppliers = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Product
     */
    public function setId(string $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Product
     */
    public function setType(string $type): Product
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function getSuppliers(): array
    {
        return $this->suppliers;
    }

    /**
     * @param array $suppliers
     * @return Product
     */
    public function setSuppliers(array $suppliers): Product
    {
        $this->suppliers = $suppliers;
        return $this;
    }

    /**
     * @param Supplier $supplier
     */
    public function addSupplier(Supplier $supplier)
    {
        $this->suppliers[] = $supplier;
    }
}
