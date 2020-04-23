<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_picture;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $path_picture;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PictureEffect", mappedBy="picture")
     */
    private $picture_effects;

    public function __construct()
    {
        $this->picture_effects = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePicture(): ?string
    {
        return $this->name_picture;
    }

    public function getPathPicture(): ?string
    {
        return $this->path_picture;
    }

    public function setNamePicture(string $name_picture): self
    {
        $this->name_picture = $name_picture;

        return $this;
    }

    public function setPathPicture(string $path_picture): self
    {
        $this->path_picture = $path_picture;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createAt): self
    {
        $this->createdAt = $createAt;

        return $this;
    }

    /**
     * @return Collection|PictureEffect[]
     */
    public function getPictureEffects(): Collection
    {
        return $this->picture_effects;
    }

    public function addPictureEffect(PictureEffect $pictureEffect): self
    {
        if (!$this->picture_effects->contains($pictureEffect)) {
            $this->picture_effects[] = $pictureEffect;
            $pictureEffect->setPicture($this);
        }

        return $this;
    }

    public function removePictureEffect(PictureEffect $pictureEffect): self
    {
        if ($this->picture_effects->contains($pictureEffect)) {
            $this->picture_effects->removeElement($pictureEffect);
            // set the owning side to null (unless already changed)
            if ($pictureEffect->getPicture() === $this) {
                $pictureEffect->setPicture(null);
            }
        }

        return $this;
    }


}
