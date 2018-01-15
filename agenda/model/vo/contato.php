<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/01/2018
 * Time: 12:22
 */

namespace app\model\vo;


class Contato {

    private $ID;
    private $Nome;
    private $Telefone;
    private $Email;

    /**
     * @return mixed
     */
    public function getID() {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID): void {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getNome() {
        return $this->Nome;
    }

    /**
     * @param mixed $Nome
     */
    public function setNome($Nome): void {
        $this->Nome = $Nome;
    }

    /**
     * @return mixed
     */
    public function getTelefone() {
        return $this->Telefone;
    }

    /**
     * @param mixed $Telefone
     */
    public function setTelefone($Telefone): void {
        $this->Telefone = $Telefone;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email): void {
        $this->Email = $Email;
    }

}