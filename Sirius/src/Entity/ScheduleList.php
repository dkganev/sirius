<?php

namespace App\Entity;

use App\Repository\ScheduleListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScheduleListRepository::class)
 */
class ScheduleList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $onYear;

    /**
     * @ORM\Column(type="integer")
     */
    private $onDay;

    /**
     * @ORM\Column(type="integer")
     */
    private $onMonth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $onTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    public function getId(): ?int { return $this->id; }
    
    public function getOnYear(): ?int { return $this->onYear; }
    public function setOnYear(int $onYear): self { $this->onYear = $onYear; return $this; }

    public function getOnDay(): ?int { return $this->onDay; }
    public function setOnDay(int $onDay): self { $this->onDay = $onDay; return $this; }

    public function getOnMonth(): ?int { return $this->onMonth; }
    public function setOnMonth(int $onMonth): self { $this->onMonth = $onMonth; return $this; }
    
    public function getOnTitle(): ?string { return $this->onTitle; }
    public function setOnTitle(string $onTitle): self { $this->onTitle = $onTitle; return $this; }
    
    public function getFirstName(): ?string { return $this->first_name; }
    public function setFirstName(string $first_name): self { $this->first_name = $onTitle; return $this; }
    
    public function getLastName(): ?string { return $this->last_name; }
    public function setLastName(string $last_name): self { $this->last_name = $last_name; return $this; }
    
    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }
    
    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(string $phone): self { $this->phone = $phone; return $this; }
    
}
