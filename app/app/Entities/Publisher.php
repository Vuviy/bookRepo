<?php


namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 */
class Publisher
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $updated_at = null;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="publisher", fetch="EAGER", cascade={"persist"})
     */
    private $books;


    public function __construct(
        /**
         * @ORM\Column(type="string")
         */
        public string $name,
        /**
         * @ORM\Column(type="datetime")
         */
        public ?\DateTime $created_at = null,
    )
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setPublisher($this);
        }
        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            $book->setPublisher(null);
        }
        return $this;
    }
}
