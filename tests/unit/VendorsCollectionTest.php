<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\Collections\VendorsCollection;
use CityPantry\Interfaces\VendorInterface;

class VendorsCollectionsTest extends TestCase
{
    
    private $vendorsCollection;
    private $vendorMocksArray = array();
    
    CONST NUMBER_OF_VENDOR_MOCKS = 3;

    protected function setUp(): void
    {
        
        for( $i = 0; $i < self::NUMBER_OF_VENDOR_MOCKS; $i++ ){
            array_push($this->vendorMocksArray , $this->createMock( VendorInterface::class ) );
        }

        $this->vendorsCollection = new VendorsCollection( ...$this->vendorMocksArray );
    }

    public function testVendorsCollectionCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Collections\VendorsCollection', $this->vendorsCollection);
    }

    public function testCanGetVendorsFromCollection() : void
    {
        $this->assertEquals( $this->vendorMocksArray , $this->vendorsCollection->getVendors());
    }
}