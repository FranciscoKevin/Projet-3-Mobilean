<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=VehicleRepository::class)
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank()
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Assert\Choice({"Utilitaire", "Particulier"})
     */
    private string $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive()
     */
    private ?int $fiscalPower;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive()
     */
    private ?int $actualPower;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive()
     */
    private ?int $tankCapacityCNG;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive()
     */
    private ?int $consumptionCNG;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive()
     */
    private ?int $tankCapacityFuel;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive()
     */
    private ?int $consumptionFuel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive()
     */
    private ?int $autonomy;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive()
     */
    private ?int $rearVolume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $photo = "";

    /**
     * @Vich\UploadableField(mapping="vehicle_photo", fileNameProperty="photo")
     */
    private ?File $vehiclePhoto = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private DateTime $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
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

    public function getVehiclePhoto(): ?File
    {
        return $this->vehiclePhoto;
    }

    public function setVehiclePhoto(File $vehiclePhoto = null): self
    {
        $this->vehiclePhoto = $vehiclePhoto;
        if ($vehiclePhoto) {
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
