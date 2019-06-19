<?php

// src/Product.php

namespace Entity;

/**
 * @Entity @Table(name="products")
 **/
Class Product {

    /**
     * @Id
     * @Column(type="integer")
     * @GenerateValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $name;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
