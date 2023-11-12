<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $subject = null;

    #[ORM\Column]
    private ?bool $has_tenure = null;

    #[ORM\OneToMany(mappedBy: 'teacher_id', targetEntity: ClassModel::class)]
    private Collection $classes;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function isHasTenure(): ?bool
    {
        return $this->has_tenure;
    }

    public function setHasTenure(bool $has_tenure): static
    {
        $this->has_tenure = $has_tenure;

        return $this;
    }

    /**
     * @return Collection<int, ClassModel>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(ClassModel $class): static
    {
        if (!$this->classes->contains($class)) {
            $this->classes->add($class);
            $class->setTeacherId($this);
        }

        return $this;
    }

    /** Teacher is non-nullable on class, so this is probably unnecessary */
    // public function removeClass(ClassModel $class): static
    // {
    //     if ($this->classes->removeElement($class)) {
    //         // set the owning side to null (unless already changed)
    //         if ($class->getTeacherId() === $this) {
    //             $class->setTeacherId(null);
    //         }
    //     }

    //     return $this;
    // }
}
