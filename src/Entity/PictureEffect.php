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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $start_effect;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $end_effect;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Picture", inversedBy="picture_effects")
     */
    private $picture;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Slide", mappedBy="picture_effects")
     */
    private $slide;

    public function __construct()
    {
        $this->slide = new ArrayCollection();
    }

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

    public function getStartEffect(): ?string
    {
        return $this->start_effect;
    }

    public function setStartEffect(?string $start_effect): self
    {
        $this->start_effect = $start_effect;

        return $this;
    }

    public function getEndEffect(): ?string
    {
        return $this->end_effect;
    }

    public function setEndEffect(?string $end_effect): self
    {
        $this->end_effect = $end_effect;

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

    /**
     * @return Collection|Slide[]
     */
    public function getSlide(): Collection
    {
        return $this->slide;
    }

    public function addSlide(Slide $slide): self
    {
        if (!$this->slide->contains($slide)) {
            $this->slide[] = $slide;
            $slide->setPictureEffects($this);
        }

        return $this;
    }

    public function removeSlide(Slide $slide): self
    {
        if ($this->slide->contains($slide)) {
            $this->slide->removeElement($slide);
            // set the owning side to null (unless already changed)
            if ($slide->getPictureEffects() === $this) {
                $slide->setPictureEffects(null);
            }
        }

        return $this;
    }
}
