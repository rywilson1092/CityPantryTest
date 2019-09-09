<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Interfaces;

use CityPantry\Interfaces\ItemsCollectionInterface;

interface VendorInterface
{
    public function getName() : string;
    public function getPostcode() : string;
    public function getMaxCovers() : int;
    public function getItems() : ItemsCollectionInterface;
}