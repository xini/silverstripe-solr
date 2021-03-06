<?php
/**
 * Copyright (c) 2007-2009, Conduit Internet Technologies, Inc.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *  - Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *  - Neither the name of Conduit Internet Technologies, Inc. nor the names of
 *    its contributors may be used to endorse or promote products derived from
 *    this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @copyright Copyright 2007-2009 Conduit Internet Technologies, Inc. (http://conduit-it.com)
 * @license New BSD (http://solr-php-client.googlecode.com/svn/trunk/COPYING)
 *
 * @package Apache
 * @subpackage Solr
 * @author Donovan Jimenez <djimenez@conduit-it.com>
 */

/**
 * Test Suite for all Apache_Solr package classes and sub sub packages
 */
class Apache_Solr_TestAll extends PHPUnit_Framework_TestSuite
{
	/**
	 * Create the test suite instance
	 *
	 * @return PHPUnit_Framework_TestSuite
	 */
	public static function suite()
	{
		// create test suite
		$suite = new Apache_Solr_TestAll('Run all PHP Solr Client tests');

		// individual test cases under Apache/Solr
		$suite->addTestSuite('Apache_Solr_DocumentTest');
		$suite->addTestSuite('Apache_Solr_ResponseTest');
		//$suite->addTestSuite('Apache_Solr_ServiceTest');

		// test suites under Apache/Solr/Service
		//$suite->addTest(Apache_Solr_Service_TestAll::suite());

		return $suite;
	}
}
