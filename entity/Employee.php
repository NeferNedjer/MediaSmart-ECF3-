<?php

class Employee {

    private $id_employee;
    private $name;
    private $first_name;
    private $password;

    public function __construct(array $datas) {
        $this->hydrate($datas);
    }

    public function hydrate(array $datas) {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getId_employee() {
       return $this->id_employee;
    }

    public function getName() {
       return $this->name;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function getPassword() {
       return $this->password;
    }

    //SETTERS
    public function setId_employee(int $id_employee) {
        $this->id_employee = $id_employee;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setFirst_name(string $first_name) {
        $this->first_name = $first_name;
    }
    
    public function setPassword(string $password) {
        $this->password = $password;
    }

}