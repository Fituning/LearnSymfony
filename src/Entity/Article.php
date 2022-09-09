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
    #[Assert\NotBlank(message: "The article should have an author"), ORM\Column(type : "string")]
    private $author;
    /*#[Assert\NotBlank(message: "The article should have an author"), ORM\Column(type : "datetime", name : "date")]
    public $date;*/


    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

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
    public function getAuthor()
    {
        return $this->author;
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
}