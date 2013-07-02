<?php
use Tester\Assert,
	Kdyby\Curl\Request,
	Nette\Utils\Json;
	
require __DIR__ .'/bootstrap.php';


Assert::throws(function() {
	$request = new Request(subdomain('bad-subdomain'));
	$response = $request->get();
}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

Assert::throws(function() {
	$request = new Request(subdomain('bad-subdomain', 'index.html'));
	$response = $request->get();
}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

Assert::throws(function() {
	$request = new Request(subdomain('bad-subdomain', 'file-file.html'));
	$response = $request->get();
}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



Assert::throws(function() {
	$request = new Request(subdomain('www.bad-subdomain'));
	$response = $request->get();
}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

Assert::throws(function() {
	$request = new Request(subdomain('www.bad-subdomain', 'file-file.html'));
	$response = $request->get();
}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



Assert::throws(function() {
	$request = new Request(subdomain('bad.bad-subdomain'));
	$response = $request->get();
}, 'Kdyby\Curl\BadStatusException', '404 Not Found');



Assert::throws(function() {
	$request = new Request(subdomain('www.bad.bad-subdomain'));
	$response = $request->get();
}, 'Kdyby\Curl\BadStatusException', '404 Not Found');

