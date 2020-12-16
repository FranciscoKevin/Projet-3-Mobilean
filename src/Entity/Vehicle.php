<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehicleRepository::class)
 */
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private ?string $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $fiscalPower;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $actualPower;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $tankCapacityCNG;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $consumptionCNG;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $tankCapacityFuel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $consumptionFuel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $autonomy;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $rearVolume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->fiscalPower;
    }

    public function setFiscalPower(?int $fiscalPower): self
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    public function getActualPower(): ?int
    {
        return $this->actualPower;
    }

    public function setActualPower(?int $actualPower): self
    {
        $this->actualPower = $actualPower;

        return $this;
    }

    public function getTankCapacityCNG(): ?int
    {
        return $this->tankCapacityCNG;
    }

    public function setTankCapacityCNG(?int $tankCapacityCNG): self
    {
        $this->tankCapacityCNG = $tankCapacityCNG;

        return $this;
    }

    public function getConsumptionCNG(): ?int
    {
        return $this->consumptionCNG;
    }

    public function setConsumptionCNG(?int $consumptionCNG): self
    {
        $this->consumptionCNG = $consumptionCNG;

        return $this;
    }

    public function getTankCapacityFuel(): ?int
    {
        return $this->tankCapacityFuel;
    }

    public function setTankCapacityFuel(?int $tankCapacityFuel): self
    {
        $this->tankCapacityFuel = $tankCapacityFuel;

        return $this;
    }

    public function getConsumptionFuel(): ?int
    {
        return $this->consumptionFuel;
    }

    public function setConsumptionFuel(?int $consumptionFuel): self
    {
        $this->consumptionFuel = $consumptionFuel;

        return $this;
    }

    public function getAutonomy(): ?int
    {
        return $this->autonomy;
    }

    public function setAutonomy(?int $autonomy): self
    {
        $this->autonomy = $autonomy;

        return $this;
    }

    public function getRearVolume(): ?int
    {
        return $this->rearVolume;
    }

    public function setRearVolume(?int $rearVolume): self
    {
        $this->rearVolume = $rearVolume;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
