<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Interfaces;

use CityPantry\Interfaces\VendorsCollectionInterface;

interface VendorReaderInterface
{
    public function getVendors() : VendorsCollectionInterface;
}