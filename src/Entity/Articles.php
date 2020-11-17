<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string")
     */
    private $datepublication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $media;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDatepublication(): ?string
    {
        return $this->datepublication;
    }

    public function setDatepublication(string $datepublication): self
    {
        $this->datepublication = $datepublication;

        return $this;
    }

    public function getMedia(): ?string
    {
        return $this->media;
    }

    public function setMedia(string $media): self
    {
        $this->media = $media;

        return $this;
    }
}
