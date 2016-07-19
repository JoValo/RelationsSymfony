<?php

namespace DsBundle\Entity;

/**
 * Domicilio
 */
class Domicilio
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $calle;

    /**
     * @var string
     */
    private $colonia;

    /**
     * @var string
     */
    private $entidad;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set calle
     *
     * @param string $calle
     *
     * @return Domicilio
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     *
     * @return Domicilio
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set entidad
     *
     * @param string $entidad
     *
     * @return Domicilio
     */
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * Get entidad
     *
     * @return string
     */
    public function getEntidad()
    {
        return $this->entidad;
    }
}
