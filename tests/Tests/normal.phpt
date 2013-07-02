<?php
use Tester\Assert,
	Kdyby\Curl\Request,
	Nette\Utils\Json;
	
require __DIR__ .'/bootstrap.php';

// domain.com => www.domain.com
$request = new Request(subdomain(NULL));
$response = $request->get();
Assert::same(200, (int) $response->headers['Status-Code']);
Assert::same('[www] index.html', trim($response->response));



// www.domain.com
$request = new Request(subdomain('www'));
$response = $request->get();
Assert::same(200, (int) $response->headers['Status-Code']);
Assert::same('[www] index.html', trim($response->response));


// forum.domain.com
$request = new Request(subdomain('forum'));
$response = $request->get();
Assert::same(200, (int) $response->headers['Status-Code']);
Assert::same('[forum] index.html', trim($response->response));


// www.forum.domain.com => forum.domain.com
$request = new Request(subdomain('www.forum'));
$response = $request->get();
Assert::same(200, (int) $response->headers['Status-Code']);
Assert::same('[forum] index.html', trim($response->response));



// archive.forum.domain.com
$request = new Request(subdomain('archive.forum'));
$response = $request->get();
Assert::same(200, (int) $response->headers['Status-Code']);
Assert::same('[archive.forum] index.html', trim($response->response));


// www.archive.forum.domain.com => archive.forum.domain.com
$request = new Request(subdomain('www.archive.forum'));
$response = $request->get();
Assert::same(200, (int) $response->headers['Status-Code']);
Assert::same('[archive.forum] index.html', trim($response->response));

