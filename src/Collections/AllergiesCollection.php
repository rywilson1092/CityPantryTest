<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Collections;

use CityPantry\Interfaces\AllergiesCollectionInterface;

final class AllergiesCollection implements AllergiesCollectionInterface
{
    private $allergies = array();

    public function __construct( string ...$allergies ){
        $this->allergies = $allergies;
    }

    public function getAllergies() : array {
        return $this->allergies;
    }
}