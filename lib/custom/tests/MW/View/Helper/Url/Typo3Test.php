<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2014
 */


/**
 * Test class for MW_View_Helper_Url_Typo3.
 */
class MW_View_Helper_Url_Typo3Test extends MW_Unittest_Testcase
{
	private $_view;


	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @access protected
	 */
	protected function setUp()
	{
		$this->_view = new MW_View_Default();
	}


	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @access protected
	 */
	protected function tearDown()
	{
		unset( $this->_view );
	}


	public function testTransform()
	{
		$mock = $this->getMockBuilder( 'Tx_Extbase_MVC_Web_Routing_UriBuilder' )
			->setMethods( array( 'uriFor') )->getMock();

		$mock->expects( $this->once() )->method( 'uriFor' )
			->with( $this->equalTo( null ), $this->equalTo( array( 'site' => 'unittest' ) ) );

		$fixed = array( 'site' => 'unittest' );
		$object = new MW_View_Helper_Url_Typo3( $this->_view, $mock, $fixed );

		$this->assertEquals( '', $object->transform() );
	}


	public function testTransformAbsolute()
	{
		$mock = $this->getMockBuilder( 'Tx_Extbase_MVC_Web_Routing_UriBuilder' )
			->setMethods( array( 'setCreateAbsoluteUri') )->getMock();

		$mock->expects( $this->once() )->method( 'setCreateAbsoluteUri' )
			->with( $this->equalTo( true ) )->will( $this->returnValue( $mock ) );

		$object = new MW_View_Helper_Url_Typo3( $this->_view, $mock, array() );

		$config = array( 'absoluteUri' => 1 );
		$this->assertEquals( '', $object->transform( null, null, null, array(), array(), $config ) );
	}


	public function testTransformNocache()
	{
		$mock = $this->getMockBuilder( 'Tx_Extbase_MVC_Web_Routing_UriBuilder' )
			->setMethods( array( 'setNoCache') )->getMock();

		$mock->expects( $this->once() )->method( 'setNoCache' )
			->with( $this->equalTo( true ) )->will( $this->returnValue( $mock ) );

		$object = new MW_View_Helper_Url_Typo3( $this->_view, $mock, array() );

		$config = array( 'nocache' => 1 );
		$this->assertEquals( '', $object->transform( null, null, null, array(), array(), $config ) );
	}


	public function testTransformChash()
	{
		$mock = $this->getMockBuilder( 'Tx_Extbase_MVC_Web_Routing_UriBuilder' )
			->setMethods( array( 'setUseCacheHash') )->getMock();

		$mock->expects( $this->once() )->method( 'setUseCacheHash' )
			->with( $this->equalTo( true ) )->will( $this->returnValue( $mock ) );

		$object = new MW_View_Helper_Url_Typo3( $this->_view, $mock, array() );

		$config = array( 'chash' => 1 );
		$this->assertEquals( '', $object->transform( null, null, null, array(), array(), $config ) );
	}


	public function testTransformType()
	{
		$mock = $this->getMockBuilder( 'Tx_Extbase_MVC_Web_Routing_UriBuilder' )
			->setMethods( array( 'setTargetPageType') )->getMock();

		$mock->expects( $this->once() )->method( 'setTargetPageType' )
			->with( $this->equalTo( 123 ) )->will( $this->returnValue( $mock ) );

		$object = new MW_View_Helper_Url_Typo3( $this->_view, $mock, array() );

		$config = array( 'type' => 123 );
		$this->assertEquals( '', $object->transform( null, null, null, array(), array(), $config ) );
	}


	public function testTransformFormat()
	{
		$mock = $this->getMockBuilder( 'Tx_Extbase_MVC_Web_Routing_UriBuilder' )
			->setMethods( array( 'setFormat') )->getMock();

		$mock->expects( $this->once() )->method( 'setFormat' )
			->with( $this->equalTo( 'xml' ) )->will( $this->returnValue( $mock ) );

		$object = new MW_View_Helper_Url_Typo3( $this->_view, $mock, array() );

		$config = array( 'format' => 'xml' );
		$this->assertEquals( '', $object->transform( null, null, null, array(), array(), $config ) );
	}


	public function testTransformEID()
	{
		$mock = $this->getMockBuilder( 'Tx_Extbase_MVC_Web_Routing_UriBuilder' )
			->setMethods( array( 'setArguments') )->getMock();

		$mock->expects( $this->once() )->method( 'setArguments' )
			->with( $this->equalTo( array( 'eID' => 123 ) ) )->will( $this->returnValue( $mock ) );

		$object = new MW_View_Helper_Url_Typo3( $this->_view, $mock, array() );

		$config = array( 'eID' => 123 );
		$this->assertEquals( '', $object->transform( null, null, null, array(), array(), $config ) );
	}


	public function testTransformParams()
	{
		$mock = $this->getMockBuilder( 'Tx_Extbase_MVC_Web_Routing_UriBuilder' )
			->setMethods( array( 'uriFor') )->getMock();

		$mock->expects( $this->once() )->method( 'uriFor' )
			->with( $this->equalTo( null ), $this->equalTo( array( 'test' => 'my_value', 'site' => 'unittest' ) ) );

		$object = new MW_View_Helper_Url_Typo3( $this->_view, $mock, array( 'site' => 'unittest' ) );

		$params = array( 'test' => 'my/value' );
		$this->assertEquals( '', $object->transform( null, null, null, $params ) );
	}
}



class Tx_Extbase_MVC_Web_Routing_UriBuilder
{
	/**
	 * @param string|null $action
	 * @param string $controller
	 */
	public function uriFor( $action, array $params, $controller )
	{
		return '';
	}

	public function reset()
	{
		return $this;
	}

	/**
	 * @param string|null $target
	 */
	public function setTargetPageUid( $target )
	{
		return $this;
	}

	/**
	 * @param integer $pageType
	 */
	public function setTargetPageType( $pageType )
	{
		return $this;
	}

	/**
	 * @param boolean $absoluteUri
	 */
	public function setCreateAbsoluteUri( $absoluteUri )
	{
		return $this;
	}

	public function setArguments( $additional )
	{
		return $this;
	}

	/**
	 * @param boolean $chash
	 */
	public function setUseCacheHash( $chash )
	{
		return $this;
	}

	/**
	 * @param boolean $nocache
	 */
	public function setNoCache( $nocache )
	{
		return $this;
	}

	public function setFormat( $format )
	{
		return $this;
	}

	public function setSection( $trailing )
	{
		return $this;
	}
}
