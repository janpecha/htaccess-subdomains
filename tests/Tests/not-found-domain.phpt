<?php
use Tester\Assert,
	Kdyby\Curl\Request,
	Nette\Utils\Json;
	
require __DIR__ .'/bootstrap.php';

foreach (array('subdomain', 'securedSubdomain') as $func) {
	Assert::throws(function() {
		$request = new Request($func('bad-subdomain'));
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

	Assert::throws(function() {
		$request = new Request($func('bad-subdomain', 'index.html'));
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

	Assert::throws(function() {
		$request = new Request($func('bad-subdomain', 'file-file.html'));
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



	Assert::throws(function() {
		$request = new Request($func('www.bad-subdomain'));
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

	Assert::throws(function() {
		$request = new Request($func('www.bad-subdomain', 'file-file.html'));
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



	Assert::throws(function() {
		$request = new Request($func('bad.bad-subdomain'));
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



	Assert::throws(function() {
		$request = new Request($func('www.bad.bad-subdomain'));
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');
}

