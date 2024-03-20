<?php

namespace App\Entity;

use App\Repository\ThreadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThreadRepository::class)]
class Thread
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'threads')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'threads')]
    private ?Category $category = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\OneToMany(targetEntity: ThreadPosts::class, mappedBy: 'thread')]
    private Collection $threadPosts;

    public function __construct()
    {
        $this->threadPosts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Collection<int, ThreadPosts>
     */
    public function getThreadPosts(): Collection
    {
        return $this->threadPosts;
    }

    public function addThreadPost(ThreadPosts $threadPost): static
    {
        if (!$this->threadPosts->contains($threadPost)) {
            $this->threadPosts->add($threadPost);
            $threadPost->setThread($this);
        }

        return $this;
    }

    public function removeThreadPost(ThreadPosts $threadPost): static
    {
        if ($this->threadPosts->removeElement($threadPost)) {
            // set the owning side to null (unless already changed)
            if ($threadPost->getThread() === $this) {
                $threadPost->setThread(null);
            }
        }

        return $this;
    }
}
