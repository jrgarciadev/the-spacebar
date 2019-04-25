<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $published_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="integer")
     */
    private $heart_count = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image_filename;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagePath() 
    {
        return 'images/'.$this->getImageFilename();
    }

    public function incrementHeartCount(): self
    {
        $this->heart_count = $this->heart_count + 1;
        return $this;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->published_at;
    }

    public function setPublishedAt(?\DateTimeInterface $published_at): self
    {
        $this->published_at = $published_at;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getHeartCount(): ?int
    {
        return $this->heart_count;
    }

    public function setHeartCount(int $heart_count): self
    {
        $this->heart_count = $heart_count;

        return $this;
    }

    public function getImageFilename(): ?string
    {
        return $this->image_filename;
    }

    public function setImageFilename(?string $image_filename): self
    {
        $this->image_filename = $image_filename;

        return $this;
    }
}
