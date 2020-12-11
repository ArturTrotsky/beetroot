<?php

/*Сделайте класс Student, который наследует от класса User и вносит дополнительные private поля стипендия,
курс, а также геттеры и сеттеры для них.*/

class Student extends User
{
    private $scholarship;

    /**
     * @return mixed
     */
    public function getScholarship()
    {
        return $this->scholarship;
    }

    /**
     * @param mixed $scholarship
     */
    public function setScholarship($scholarship): void
    {
        $this->scholarship = $scholarship;
    }
}