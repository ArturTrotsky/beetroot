<?php

/*Сделайте класс User, в котором будут следующие protected поля - name (имя), age (возраст),
public методы setName, getName, setAge, getAge.*/

class User
{
    protected $name;
    protected $age;

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getAge(): int
    {
        return $this->age;
    }
}