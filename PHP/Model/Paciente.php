<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/26/2017
 * Time: 11:15 PM
 */

class Paciente
{
    public $id;
    public $paciente;
    public $raza;
    public $peso;
    public $edad;
    public $sexo;
    public $dueno;
    public $telefono;
    public $alergias;

    public function __construct($id,$paciente,$raza,$peso,$edad,$sexo,$dueno,$telefono,$alergias) {
        $this->paciente=$paciente;
        $this->raza=$raza;
        $this->peso=$peso;
        $this->edad=$edad;
        $this->sexo=$sexo;
        $this->dueno=$dueno;
        $this->telefono= $telefono;
        $this->alergias= $alergias;
        $this->id=$id;
    }
}