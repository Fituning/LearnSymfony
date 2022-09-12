<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(), ORM\Table(name : "blog__article")]
class Article
{
    #[ORM\Id(), ORM\GeneratedValue(strategy : "AUTO"), ORM\Column(type : "integer")]
    public ?int $id =null;

    #[Assert\Length(min : 2, max : 50, minMessage : "Title is too short", maxMessage : "Title is too long"), ORM\Column(type : "string")]
    private $title;
    #[Assert\NotBlank(message: "Article can't be empty"), ORM\Column(type : "text")]
    private $content;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'article')]
    private ?Author $author = null;

    /*#[Assert\NotBlank(message: "The article should have an author"), ORM\Column(type : "datetime", name : "date")]
    public $date;*/


    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }
}