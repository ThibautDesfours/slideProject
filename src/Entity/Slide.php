<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SlideRepository")
 */
class Slide
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title_slide;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $removedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PictureEffect", mappedBy="slide")
     */
    private $picture_effects;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleSlide(): ?string
    {
        return $this->title_slide;
    }

    public function setTitleSlide(?string $title_slide): self
    {
        $this->title_slide = $title_slide;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRemovedAt(): ?\DateTimeInterface
    {
        return $this->removedAt;
    }

    public function setRemovedAt(?\DateTimeInterface $removedAt): self
    {
        $this->removedAt = $removedAt;

        return $this;
    }

    public function getPictureEffects(): ?PictureEffect
    {
        return $this->picture_effects;
    }

    public function setPictureEffects(?PictureEffect $picture_effects): self
    {
        $this->picture_effects = $picture_effects;

        return $this;
    }
}
