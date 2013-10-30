<?php
use Tester\Assert,
	Kdyby\Curl\Request,
	Nette\Utils\Json;
	
require __DIR__ .'/bootstrap.php';

foreach (array('subdomain', 'securedSubdomain') as $func) {
	Assert::throws(function() use ($func) {
		$request = new Request($func('bad-subdomain'));
		$request->setCertificationVerify(FALSE);
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

	Assert::throws(function() use ($func) {
		$request = new Request($func('bad-subdomain', 'index.html'));
		$request->setCertificationVerify(FALSE);
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

	Assert::throws(function() use ($func) {
		$request = new Request($func('bad-subdomain', 'file-file.html'));
		$request->setCertificationVerify(FALSE);
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



	Assert::throws(function() use ($func) {
		$request = new Request($func('www.bad-subdomain'));
		$request->setCertificationVerify(FALSE);
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

	Assert::throws(function() use ($func) {
		$request = new Request($func('www.bad-subdomain', 'file-file.html'));
		$request->setCertificationVerify(FALSE);
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



	Assert::throws(function() use ($func) {
		$request = new Request($func('bad.bad-subdomain'));
		$request->setCertificationVerify(FALSE);
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



	Assert::throws(function() use ($func) {
		$request = new Request($func('www.bad.bad-subdomain'));
		$request->setCertificationVerify(FALSE);
		$response = $request->get();
	}, 'Kdyby\Curl\BadStatusException', '404 Not Found');
}

