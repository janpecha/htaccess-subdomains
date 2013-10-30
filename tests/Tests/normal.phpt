<?php
use Tester\Assert,
	Kdyby\Curl\Request,
	Nette\Utils\Json;
	
require __DIR__ .'/bootstrap.php';

foreach (array('subdomain', 'securedSubdomain') as $func) {
	// domain.com => www.domain.com
	$request = new Request($func(NULL));
	$request->setCertificationVerify(FALSE);
	$response = $request->get();
	Assert::same(200, (int) $response->headers['Status-Code']);
	Assert::same('[www] index.html', trim($response->response));



	// www.domain.com
	$request = new Request($func('www'));
	$request->setCertificationVerify(FALSE);
	$response = $request->get();
	Assert::same(200, (int) $response->headers['Status-Code']);
	Assert::same('[www] index.html', trim($response->response));


	// forum.domain.com
	$request = new Request($func('forum'));
	$request->setCertificationVerify(FALSE);
	$response = $request->get();
	Assert::same(200, (int) $response->headers['Status-Code']);
	Assert::same('[forum] index.html', trim($response->response));


	// www.forum.domain.com => forum.domain.com
	$request = new Request($func('www.forum'));
	$request->setCertificationVerify(FALSE);
	$response = $request->get();
	Assert::same(200, (int) $response->headers['Status-Code']);
	Assert::same('[forum] index.html', trim($response->response));



	// archive.forum.domain.com
	$request = new Request($func('archive.forum'));
	$request->setCertificationVerify(FALSE);
	$response = $request->get();
	Assert::same(200, (int) $response->headers['Status-Code']);
	Assert::same('[archive.forum] index.html', trim($response->response));


	// www.archive.forum.domain.com => archive.forum.domain.com
	$request = new Request($func('www.archive.forum'));
	$request->setCertificationVerify(FALSE);
	$response = $request->get();
	Assert::same(200, (int) $response->headers['Status-Code']);
	Assert::same('[archive.forum] index.html', trim($response->response));
}

