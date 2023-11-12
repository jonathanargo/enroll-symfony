<?php

namespace App\Entity;

use App\Repository\ClassModelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassModelRepository::class)]
class ClassModel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $time = null;

    #[ORM\ManyToOne(inversedBy: 'classes')]
    private ?Teacher $teacher_id = null;

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

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function getTeacherId(): ?Teacher
    {
        return $this->teacher_id;
    }

    public function setTeacherId(Teacher $teacher_id): static
    {
        $this->teacher_id = $teacher_id;

        return $this;
    }
}
