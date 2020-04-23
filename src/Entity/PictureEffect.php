<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureEffectRepository")
 */
class PictureEffect
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $length_effect;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $x_start;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $y_start;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $w_start;

     /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $h_start;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $x_end;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $y_end;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $w_end;

     /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $h_end;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Picture", inversedBy="picture_effects")
     */
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Slide", inversedBy="picture_effects")
     */
    private $slide;

    public function __construct(){}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLengthEffect(): ?float
    {
        return $this->length_effect;
    }

    public function setLengthEffect(?float $length_effect): self
    {
        $this->length_effect = $length_effect;

        return $this;
    }

    public function getXStart(): ?float
    {
        return $this->x_start;
    }

    public function getYStart(): ?float
    {
        return $this->y_start;
    }

    public function getWStart(): ?float
    {
        return $this->w_start;
    }

    public function getHStart(): ?float
    {
        return $this->h_start;
    }

    public function getXEnd(): ?float
    {
        return $this->x_end;
    }

    public function getYEnd(): ?float
    {
        return $this->y_end;
    }

    public function getWEnd(): ?float
    {
        return $this->w_end;
    }

    public function getHEnd(): ?float
    {
        return $this->h_end;
    }

    public function setXStart(?float $x_start): self
    {
        $this->x_start = $x_start;

        return $this;
    }

    public function setYStart(?float $y_start): self
    {
        $this->y_start = $y_start;

        return $this;
    }

    public function setWStart(?float $w_start): self
    {
        $this->w_start = $w_start;

        return $this;
    }

    public function setHStart(?float $h_start): self
    {
        $this->h_start = $h_start;

        return $this;
    }

    public function setXEnd(?float $x_end): self
    {
        $this->x_end = $x_end;

        return $this;
    }

    public function setYEnd(?float $y_end): self
    {
        $this->y_end = $y_end;

        return $this;
    }

    public function setWEnd(?float $w_end): self
    {
        $this->w_end = $w_end;

        return $this;
    }

    public function setHEnd(?float $h_end): self
    {
        $this->h_end = $h_end;

        return $this;
    }

    public function getPicture(): ?Picture
    {
        return $this->picture;
    }

    public function setPicture(?Picture $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSlide(): Collection
    {
        return $this->slide;
    }

    public function setSlide(?Slide $slide): self
    {
        $this->slide = $slide;

        return $this;
    }
}
