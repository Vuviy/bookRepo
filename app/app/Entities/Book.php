<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\ManyToMany(targetEntity="Author", inversedBy="books", fetch="EAGER", cascade={"persist"})
     * @ORM\JoinTable(name="author_book")
     */
    private $authors;

    /**
     * @ORM\ManyToOne(targetEntity="Publisher", inversedBy="books", fetch="EAGER",  cascade={"persist"})
     * @ORM\JoinColumn(name="publisher_id", referencedColumnName="id")
     */
    private $publisher;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $updated_at = null;


    public function __construct(
        /**
         * @ORM\Column(type="string")
         */
        public string $title,
        /**
         * @ORM\Column(type="datetime")
         */
        public ?\DateTime $created_at = null,
    )
    {
        $this->authors = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUpdatedAt(): \DateTime|null
    {
        return $this->updated_at;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function addAuthor(Author $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors[] = $author;
            $author->addBook($this);
        }

        return $this;
    }

    public function removeAuthor(Author $author): self
    {
        if ($this->authors->contains($author)) {
            $this->authors->removeElement($author);
        }
        return $this;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setPublisher(Publisher|null $publisher): self
    {
        $this->publisher = $publisher;
        return $this;
    }
}
