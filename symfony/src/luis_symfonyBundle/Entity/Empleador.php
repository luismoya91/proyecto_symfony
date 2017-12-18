<?php

namespace luis_symfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Empleador
 *
 * @ORM\Table(name="empleador")
 * @ORM\Entity(repositoryClass="luis_symfonyBundle\Repository\EmpleadorRepository")
 */
class Empleador
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
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechanac", type="date")
     */
    private $fechanac;
	
	/**
     * @var int
     *
     * @ORM\Column(name="empleadon", type="integer")
     */
    private $empleadon;
	
	/**
	 * @var ArrayCollection $empleados
	 *
	 * @ORM\OneToMany(targetEntity="Empleado", mappedBy="empleador")
	 */
	private $empleados;

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
     * @return Empleador
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
     * @return Empleador
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
     * @return Empleador
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
     * @return Empleador
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Empleador
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set fechanac
     *
     * @param \DateTime $fechanac
     *
     * @return Empleador
     */
    public function setFechanac($fechanac)
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    /**
     * Get fechanac
     *
     * @return \DateTime
     */
    public function getFechanac()
    {
        return $this->fechanac;
    }
	
	 /**
     * Set empleadon
     *
     * @param integer $empleadon
     *
     * @return Empleador
     */
    public function setEmpleadon($empleadon)
    {
        $this->empleadon = $empleadon;

        return $this;
    }
	
	/**
     * Get empleadon
     *
     * @return int
     */
    public function getEmpleadon()
    {
        return $this->empleadon;
    }
	
	/**
     * Set empleados
     *
     * @param integer $empleados
     *
     * @return Empleador
     */
    public function addEmpleados(Empleado $empleados)
    {
        $empleados->setEmpleador($this);

        //return $this;
    }
	
	/**
     * Get empleados
     *
     * @return ArrayCollection $empleados
     */
    public function getEmpleados()
    {
        return $this->empleados;
    }
	
	/**
     * Generates the magic method
     * 
	 * @return string
     */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->nombre;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

