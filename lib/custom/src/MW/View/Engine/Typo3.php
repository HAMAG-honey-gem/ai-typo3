<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017
 * @package MW
 * @subpackage View
 */


namespace Aimeos\MW\View\Engine;


/**
 * TYPO3 view engine implementation
 *
 * @package MW
 * @subpackage View
 */
class Typo3 implements Iface
{
	private $objectManager;


	/**
	 * Initializes the view object
	 *
	 * @param \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager TYPO3 object manager
	 */
	public function __construct( \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager )
	{
		$this->objectManager = $objectManager;
	}


	/**
	 * Renders the output based on the given template file name and the key/value pairs
	 *
	 * @param \Aimeos\MW\View\Iface $view View object
	 * @param string $filename File name of the view template
	 * @param array $values Associative list of key/value pairs
	 * @return string Output generated by the template
	 * @throws \Aimeos\MW\View\Exception If the template isn't found
	 */
	public function render( \Aimeos\MW\View\Iface $view, $filename, array $values )
	{
		$fluid = $this->objectManager->get( 'TYPO3\\CMS\\Fluid\\View\\StandaloneView' );

		$fluid->setTemplatePathAndFilename( $filename );
		$fluid->assignMultiple( $values );

		return $fluid->render();
	}
}
