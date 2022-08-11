<?php

namespace App\Entity;

use App\Repository\ClientFreightRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientFreightRepository::class)
 * @ORM\Table(name="client_freight")
 */
class ClientFreight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $from_postcode;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $to_postcode;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $from_weight;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $to_weight;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cost;

    public function __construct(
        $from_postcode, $to_postcode,
        $from_weight, $to_weight, $cost
    ) {
        $this->from_postcode = $from_postcode;
        $this->to_postcode = $to_postcode;
        $this->from_weight = $from_weight;
        $this->to_weight = $to_weight;
        $this->cost = $cost;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromPostcode(): ?string
    {
        return $this->from_postcode;
    }

    public function getToPostcode(): ?string
    {
        return $this->to_postcode;
    }

    public function getFromWeight()
    {
        return $this->from_weight;
    }

    public function getToWeight()
    {
        return $this->to_weight;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setFromPostcode(string $from_postcode): self
    {
        $this->from_postcode = $from_postcode;
        return $this;
    }

    public function setToPostcode(string $to_postcode): self
    {
        $this->to_postcode = $to_postcode;
        return $this;
    }

    public function setFromWeight($from_weight): self
    {
        $this->from_weight = $from_weight;
        return $this;
    }

    public function setToWeight($to_weight): self
    {
        $this->to_weight = $to_weight;
        return $this;
    }

    public function setCost($cost): self
    {
        $this->cost = $cost;
        return $this;
    }
}
