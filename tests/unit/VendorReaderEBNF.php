<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\VendorReaderEBNF;

class VendorReaderEBNFTest extends TestCase
{
    private $vendorReaderEBNF;

    CONST TEST_FILENAME = "example-input.txt";

    CONST EXPECTED_NUMBER_OF_VENDORS = 4;

    /**
     * This fixture is used to setup the object that are used in the unit tests. We will test with an investor starting with 0
     *
     * @method void setUp()
     * @access protected
     * @return void
     */

    protected function setUp(): void
    {
        $this->vendorReaderEBNF = new VendorReaderEBNF( self::TEST_FILENAME , $this->createMock( VendorsCollectionInterface::class ) );
    }

    /**
     * We will test here that the item class can construct
     *
     * @method void testVendorCanConstruct()
     * @access public
     * @return void
     */

    public function testVendorReaderCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\VendorReaderEBNF', $this->vendorReaderEBNF);
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetName()
     * @access public
     * @return void
     */

    public function testCanGetVendorsCollection() : void
    {
        $allVendors = $this->getVendors();

        $this->assertInstanceOf( 'CityPantry\Interfaces\VendorsCollectionInterface' , $allVendors );
        $this->assertEquals( self::EXPECTED_NUMBER_OF_VENDORS , count($allVendors->getVendors() ) );
    }
}