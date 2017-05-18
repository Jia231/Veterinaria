<?php
/**
 * Created by PhpStorm.
 * User: Jia Ming Liou
 * Date: 3/26/2017
 * Time: 11:15 PM
 */

class Cita
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
    public $fecha;
    public $parasito;
    public $tratamiento;
    public $diagnostico;
    public $hora;

    public function __construct($id,$paciente,$raza,$peso,$edad,$sexo,$dueno,$telefono,$alergias,$fecha,$parasito,$tratamiento,$diagnostico,$hora) {
        $this->paciente=$paciente;
        $this->raza=$raza;
        $this->peso=$peso;
        $this->edad=$edad;
        $this->sexo=$sexo;
        $this->dueno=$dueno;
        $this->telefono= $telefono;
        $this->alergias= $alergias;
        $this->parasito= $parasito;
        $this->fecha=$fecha;
        $this->tratamiento=$tratamiento;
        $this->id=$id;
        $this-> diagnostico = $diagnostico;
        $this-> hora = $hora;
    }
}