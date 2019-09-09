<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Interfaces;

use CityPantry\Interfaces\ItemInterface;

interface ItemsCollectionInterface
{
    public function getItems() : array;
}