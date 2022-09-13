<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use function PHPUnit\Framework\stringEndsWith;


#[ORM\Entity(), ORM\Table(name : "blog__article")]
class Article
{
    #[ORM\Id(), ORM\GeneratedValue(strategy : "AUTO"), ORM\Column(type : "integer")]
    public ?int $id =null;

    #[Assert\Length(min : 2, max : 50, minMessage : "Title is too short", maxMessage : "Title is too long"), ORM\Column(type : "string")]
    private mixed $title;
    #[Assert\NotBlank(message: "Article can't be empty"), ORM\Column(type : "text")]
    private mixed $content;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: "articles")]
    private Collection $authors ;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    /*#[Assert\NotBlank(message: "The article should have an author"), ORM\Column(type : "datetime", name : "date")]
    public $date;*/

    public function __construct() {
        $this->authors = new ArrayCollection();
    }

    public function __toString(){
        $names = null;

        foreach ($this->authors as $name ){
            $names = $names . $name;
        }
        return (string) $this->title . " | by : " . $names;
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

    /**
     * @return Collection<int, Author>
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(Article $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors->add($author);
            $author->setAuthors($this);
        }

        return $this;
    }

    public function removeAuthor(Article $author): self
    {
        if ($this->authors->removeElement($author)) {
            // set the owning side to null (unless already changed)
            if ($author->getAuthors() === $this) {
                $author->setAuthors(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}