<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Interfaces;

interface AllergiesCollectionInterface
{
    public function getAllergies() : array;
}