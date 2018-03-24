<?php

namespace App\DataFixtures;


use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getCarData() as [$brand, $model, $helm]) {
            $car = new Car();
            $car->setBrand($brand);
            $car->setModel($model);
            $car->setHelm($helm);
            $manager->persist($car);
        }
        $manager->flush();
    }

    private function getCarData()
    {
        return [
            ["Toyota", "Corolla", Car::HELM_RIGHT],
            ["Toyota", "Prius", Car::HELM_RIGHT],
            ["Nissan", "Juke", Car::HELM_LEFT],
            ["Audi", "TT RS Coupe", Car::HELM_RIGHT],
            ["Audi", "TT RS Roadster", Car::HELM_RIGHT],
            ["Audi", "TTS Roadster quattro", Car::HELM_RIGHT],
            ["BMW", "428i", Car::HELM_LEFT],
            ["BMW", "435i xDrive Купе", Car::HELM_LEFT],
            ["BMW", "435i xDrive Гран Купе", Car::HELM_LEFT],
            ["BMW", "435i ", Car::HELM_LEFT],
            ["Hyundai", "Genesis Luxury", Car::HELM_LEFT],
            ["Hyundai", "Genesis Sport", Car::HELM_LEFT],
            ["Hyundai", "Genesis G90", Car::HELM_LEFT],
            ["Hyundai", "Equus Luxury", Car::HELM_LEFT],
            ["Infiniti", "QX60 2.5 HEV Elegance ", Car::HELM_LEFT],
            ["Infiniti", "Q70 5.6 Sport", Car::HELM_LEFT],
        ];
    }
}