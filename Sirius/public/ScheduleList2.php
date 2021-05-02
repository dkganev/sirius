<?php

namespace App\Entity;

use App\Repository\ScheduleListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class ScheduleList2
{
    
    /**
    * @var int
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id; //* @ORM\Column(type="integer")/** @Id @Column(type="integer") @GeneratedValue */
    private $onYear; //* @ORM\Column(type="integer")
    private $onDay; //* @ORM\Column(type="integer")
    private $onMonth; //* @ORM\Column(type="integer")
    private $onTitle;  //* @ORM\Column(type="string", length=255)

    public function getId(): ?int { return $this->id; }
    public function getОnYear(): ?int { return $this->onYear; }
    public function getОnDay(): ?int { return $this->оnDay; }
    public function getОnMonth(): ?int { return $this->onMonth; }
    public function getОnTitle(): ?string { return $this->onTitle; }

    public function setId(int $id): self { $this->id = $id; return $this; }
    public function setОnYear(int $onYear): self { $this->onYear = $onYear; return $this; }
    public function setОnDay(int $оnDay): self { $this->оnDay = $оnDay; return $this; }
    public function setОnMonth(int $onMonth): self { $this->onMonth = $onMonth; return $this; }
    public function setОnTitle(string $onTitle): self { $this->onTitle = $onTitle; return $this; }
    
    
}
