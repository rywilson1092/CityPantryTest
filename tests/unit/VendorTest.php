<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\Vendor;

use CityPantry\Interfaces\ItemsCollectionInterface;

class VendorTest extends TestCase
{
    private $vendor;
    private $ItemsCollectionMock;

    CONST TEST_NAME = "Test Item";
    CONST TEST_POSTCODE = "E1W3WD";
    CONST TEST_MAX_COVERS = 12;

    protected function setUp(): void
    {
        $this->itemsCollectionMock = $this->createMock( ItemsCollectionInterface::class );
        $this->vendor = new Vendor( self::TEST_NAME , self::TEST_POSTCODE , self::TEST_MAX_COVERS , $this->itemsCollectionMock );
    }

    public function testVendorCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Vendor', $this->vendor);
    }

    public function testCanGetName() : void
    {
        $this->assertEquals( self::TEST_NAME , $this->vendor->getName() );
    }

    public function testCanGetPostCode() : void
    {
        $this->assertEquals( self::TEST_POSTCODE , $this->vendor->getPostCode() );
    }

    public function testCanGetMaxCovers() : void
    {
        $this->assertEquals( self::TEST_MAX_COVERS , $this->vendor->getMaxCovers() );
    }

    public function testCanGetItems() : void
    {
        $this->assertEquals( $this->itemsCollectionMock , $this->vendor->getItems() );
    }
}