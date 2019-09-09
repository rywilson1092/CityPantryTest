<?php

declare(strict_types=1);
namespace CityPantry;

use CityPantry\Interfaces\ItemInterface;
use CityPantry\Interfaces\AllergiesCollectionInterface;

final class Item implements ItemInterface
{
    private $name;
    private $advanceTime;
    private $allergies;
    
    public function __construct( string $name, string $advanceTime , AllergiesCollectionInterface $allergies ){
        $this->setName($name);
        $this->setAdvanceTime($advanceTime);
        $this->setAllergies($allergies);
    }

    public function getName() : string {
        return $this->name;
    }

    private function setName( string $name ){
        $this->name = $name;
    }

    public function getAdvanceTime() : string {
        return $this->advanceTime;
    }

    private function setAdvanceTime( string $advanceTime ){
        $this->advanceTime = $advanceTime;
    }

    private function setAllergies( AllergiesCollectionInterface $allergies){
        $this->allergies = $allergies;
    }

    public function getAllergies() : AllergiesCollectionInterface {
        return $this->allergies;
    }
}