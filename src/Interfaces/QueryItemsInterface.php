<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Interfaces;

use CityPantry\Interfaces\VendorsCollectionInterface;
use CityPantry\Interfaces\ItemsCollectionInterface;

interface QueryItemsInterface
{
    public function getItems( VendorsCollectionInterface $vendors ) : ItemsCollectionInterface; 
}