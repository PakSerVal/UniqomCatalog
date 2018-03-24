<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    //Количество автомобилей на странице
    const NUM_ITEMS = 10;

    const HELM_LEFT = 'Левый руль';
    const HELM_RIGHT = 'Правый руль';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $helm;

    public function getId()
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getHelm(): ?string
    {
        return $this->helm;
    }

    public function setHelm($helm): self
    {
        if (!in_array($helm, array(self::HELM_LEFT, self::HELM_RIGHT))) {
            throw new \InvalidArgumentException("Invalid value");
        }
        $this->helm = $helm;
        return $this;
    }
}
