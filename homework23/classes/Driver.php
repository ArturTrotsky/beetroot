<?php

/*Сделайте класс Driver (Водитель), который будет наследоваться от класса Worker из предыдущей задачи.
Этот метод должен вносить следующие private поля: водительский стаж, категория вождения (A, B, C).*/

class Driver extends Worker
{
    private $experience;
    private $category;
}