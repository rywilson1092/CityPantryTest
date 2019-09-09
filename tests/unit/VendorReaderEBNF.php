<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\VendorReaderEBNF;

class VendorReaderEBNFTest extends TestCase
{
    private $vendorReaderEBNF;

    CONST TEST_FILENAME = "example-input.txt";

    CONST EXPECTED_NUMBER_OF_VENDORS = 4;

    protected function setUp(): void
    {
        $this->vendorReaderEBNF = new VendorReaderEBNF( self::TEST_FILENAME , $this->createMock( VendorsCollectionInterface::class ) );
    }

    public function testVendorReaderCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\VendorReaderEBNF', $this->vendorReaderEBNF);
    }

    public function testCanGetVendorsCollection() : void
    {
        $allVendors = $this->getVendors();

        $this->assertInstanceOf( 'CityPantry\Interfaces\VendorsCollectionInterface' , $allVendors );
        $this->assertEquals( self::EXPECTED_NUMBER_OF_VENDORS , count($allVendors->getVendors() ) );
    }
}