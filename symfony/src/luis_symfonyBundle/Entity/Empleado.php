<?php

namespace luis_symfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado
 *
 * @ORM\Table(name="empleado")
 * @ORM\Entity(repositoryClass="luis_symfonyBundle\Repository\EmpleadoRepository")
 */
class Empleado
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="cedula", type="integer", unique=true)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=255)
     */
    private $sexo;

    /**
     * @var int
     *
     * @ORM\Column(name="telefono", type="integer")
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoContrato", type="string", length=255)
     */
    private $tipoContrato;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Empleador",inversedBy="empleados")
	 * @ORM\JoinColumn(name="empleador_ced",referencedColumnName="id")
	 */
	private $empleador;	

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Empleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set cedula
     *
     * @param integer $cedula
     *
     * @return Empleado
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return int
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Empleado
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Empleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return int
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set tipoContrato
     *
     * @param string $tipoContrato
     *
     * @return Empleado
     */
    public function setTipoContrato($tipoContrato)
    {
        $this->tipoContrato = $tipoContrato;

        return $this;
    }

    /**
     * Get tipoContrato
     *
     * @return string
     */
    public function getTipoContrato()
    {
        return $this->tipoContrato;
    }
	
	/**
     * Set empleador
     *
     * @param int $empleador
     *
     * @return Empleado
     */
    public function setEmpleador($empleador)
    {
        $this->empleador = $empleador;

        return $this;
    }
	
	/**
     * Get empleador
     *
     * @return int
     */
    public function getEmpleador()
    {
        return $this->empleador;
    }
	
	/**
     * Generates the magic method
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->id;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

