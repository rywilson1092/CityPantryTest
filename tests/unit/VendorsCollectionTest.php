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

    /**
     * This fixture is used to setup the object that are used in the unit tests. We will test with an investor starting with 0
     *
     * @method void setUp()
     * @access protected
     * @return void
     */

    protected function setUp(): void
    {
        
        for( $i = 0; $i < self::NUMBER_OF_VENDOR_MOCKS; $i++ ){
            array_push($this->vendorMocksArray , $this->createMock( VendorInterface::class ) );
        }

        $this->vendorsCollection = new VendorsCollection( ...$this->vendorMocksArray );
    }

    /**
     * We will test here that the vendors collection class can construct
     *
     * @method void testVendorsCollectionCanConstruct()
     * @access public
     * @return void
     */

    public function testVendorsCollectionCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Collections\VendorsCollection', $this->vendorsCollection);
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetVendorsFromCollection()
     * @access public
     * @return void
     */

    public function testCanGetVendorsFromCollection() : void
    {
        $this->assertEquals( $this->vendorMocksArray , $this->vendorsCollection->getVendors());
    }
}