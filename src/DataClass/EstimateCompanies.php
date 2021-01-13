<?php

namespace App\DataClass;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Class for EstimateCompaniesType
 */
class EstimateCompanies
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=255)
     */
    private string $businessName;

    /**
     * @Assert\Regex(pattern="/^[0-9]+$/")
     * @Assert\Length(min=9, max=9)
     */
    private string $numberSIREN = '';

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=255)
     */
    private string $fullName;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=255)
     */
    private string $jobTitle;

    /**
     * @Assert\NotBlank()
     */
    private string $telephone;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private string $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=255)
     */
    private string $address;

    /**
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/^[0-9]+$/")
     * @Assert\Length(min=5, max=5)
     */
    private string $zipCode;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=1, max=255)
     */
    private string $city;

    /**
     * @Assert\Type(type="bool")
     */
    private bool $isConnectedToGas;

    /**
     * @Assert\NotBlank()
     * @Assert\Positive()
     */
    private int $numberOfVehicles;

    /**
     * @Assert\NotBlank()
     * @Assert\Count(min=1, max=3)
     * @Assert\Collection(
     *      fields={
     *          "0"=@Assert\Choice({"commercialVehicles", "tourismVehicles", "heavyTrucks"}),
     *          "1"=@Assert\Choice({"tourismVehicles", "commercialVehicles", "heavyTrucks"}),
     *          "2"=@Assert\Choice({"tourismVehicles", "commercialVehicles", "heavyTrucks"})
     *      },
     *      allowMissingFields = true
     * )
     * @var string[]
     */
    private array $typeOfVehicles;

    /**
     * @Assert\NotBlank()
     * @Assert\Positive()
     */
    private int $averageDistance;

    /**
     * @Assert\Length(max=2000)
     */
    private ?string $message = null;

    /**
     * @Assert\Date()
     */
    private DateTime $submitDate;

    private string $type;

    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    public function setBusinessName(string $businessName): self
    {
        $this->businessName = $businessName;

        return $this;
    }

    public function getNumberSIREN(): ?string
    {
        return $this->numberSIREN;
    }

    public function setNumberSIREN(string $numberSIREN): self
    {
        $this->numberSIREN = $numberSIREN;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getIsConnectedToGas(): ?bool
    {
        return $this->isConnectedToGas;
    }

    public function setIsConnectedToGas(bool $isConnectedToGas): self
    {
        $this->isConnectedToGas = $isConnectedToGas;

        return $this;
    }

    public function getNumberOfVehicles(): ?int
    {
        return $this->numberOfVehicles;
    }

    public function setNumberOfVehicles(int $numberOfVehicles): self
    {
        $this->numberOfVehicles = $numberOfVehicles;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getTypeOfVehicles(): ?array
    {
        return $this->typeOfVehicles;
    }

    /**
     * @param array{string} $typeOfVehicles
     */
    public function setTypeOfVehicles(array $typeOfVehicles): self
    {
        $this->typeOfVehicles = $typeOfVehicles;

        return $this;
    }

    public function getAverageDistance(): ?int
    {
        return $this->averageDistance;
    }

    public function setAverageDistance(int $averageDistance): self
    {
        $this->averageDistance = $averageDistance;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSubmitDate(): ?DateTime
    {
        return $this->submitDate;
    }

    public function setSubmitDate(DateTime $submitDate): self
    {
        $this->submitDate = $submitDate;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
