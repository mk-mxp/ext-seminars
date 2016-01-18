<?php
/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Test case.
 *
 * @package TYPO3
 * @subpackage tx_seminars
 *
 * @author Mario Rimann <typo3-coding@rimann.org>
 * @author Niels Pardon <mail@niels-pardon.de>
 */
class tx_seminars_Bag_EventTest extends Tx_Phpunit_TestCase {
	/**
	 * @var tx_seminars_Bag_Event
	 */
	private $fixture;

	/**
	 * @var Tx_Oelib_TestingFramework
	 */
	private $testingFramework;

	protected function setUp() {
		$this->testingFramework = new Tx_Oelib_TestingFramework('tx_seminars');

		$this->testingFramework->createRecord(
			'tx_seminars_seminars',
			array('title' => 'test event')
		);

		$this->fixture = new tx_seminars_Bag_Event('is_dummy_record=1');
	}

	protected function tearDown() {
		$this->testingFramework->cleanUp();

		tx_seminars_registrationmanager::purgeInstance();
	}


	///////////////////////////////////////////
	// Tests for the basic bag functionality.
	///////////////////////////////////////////

	public function testBagCanHaveAtLeastOneElement() {
		self::assertFalse(
			$this->fixture->isEmpty()
		);
	}
}