<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Interfaces;

use CityPantry\Interfaces\AllergiesCollectionInterface;

interface ItemInterface
{
    public function getName() : string;
    public function getAllergies() : AllergiesCollectionInterface;
    public function getAdvanceTime() : string;
}