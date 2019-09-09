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

    /**
     * This fixture is used to setup the object that are used in the unit tests. We will test with an investor starting with 0
     *
     * @method void setUp()
     * @access protected
     * @return void
    */

    protected function setUp(): void
    {
        $this->itemsCollectionMock = $this->createMock( ItemsCollectionInterface::class );
        $this->vendor = new Vendor( self::TEST_NAME , self::TEST_POSTCODE , self::TEST_MAX_COVERS , $this->itemsCollectionMock );
    }

    /**
     * We will test here that the item class can construct
     *
     * @method void testVendorCanConstruct()
     * @access public
     * @return void
     */

    public function testVendorCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Vendor', $this->vendor);
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetName()
     * @access public
     * @return void
     */

    public function testCanGetName() : void
    {
        $this->assertEquals( self::TEST_NAME , $this->vendor->getName() );
    }

     /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetPostCode()
     * @access public
     * @return void
     */

    public function testCanGetPostCode() : void
    {
        $this->assertEquals( self::TEST_POSTCODE , $this->vendor->getPostCode() );
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetMaxCovers()
     * @access public
     * @return void
     */

    public function testCanGetMaxCovers() : void
    {
        $this->assertEquals( self::TEST_MAX_COVERS , $this->vendor->getMaxCovers() );
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetItems()
     * @access public
     * @return void
     */

    public function testCanGetItems() : void
    {
        $this->assertEquals( $this->itemsCollectionMock , $this->vendor->getItems() );
    }
}