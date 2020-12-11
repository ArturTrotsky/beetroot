<?php

/*Сделайте класс Worker, который наследует от класса User и вносит дополнительное private поле salary (зарплата),
а также методы public getSalary и setSalary.*/

class Worker extends User
{
    private $salary;

    /**
     * @return mixed
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }
}