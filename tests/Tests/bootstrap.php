<?php
	require __DIR__ . '/../../vendor/autoload.php';
	
	if (!class_exists('Tester\Assert')) {
		echo "Install Nette Tester using `composer update --dev`\n";
		exit(1);
	}
	
	define('HOST', 'htaccess-tests.l');
	#define('PORT', 8000);
	
	$res = copy(__DIR__ . '/../../src/.htaccess', __DIR__ . '/../DocumentRoot/.htaccess');
	
	if($res === FALSE)
	{
		exit(3);
	}
	
	function id($val) {
		return $val;
	}
	
	function subdomain($subdomain = NULL, $file = NULL, $scheme = 'http')
	{
		$port = '';
		
		if(defined(PORT) && is_int(PORT))
		{
			$port = ':' . PORT;
		}
		
		if(is_string($subdomain))
		{
			$subdomain .= '.';
		}
		
		return "http://$subdomain" . HOST . "$port/$file";
	}
	
	function securedSubdomain($subdomain = NULL, $file = NULL)
	{
		return subdomain($subdomain, $file, 'https');
	}
	
	$configurator = new Nette\Config\Configurator;
	$configurator->setDebugMode(FALSE);
	$configurator->setTempDirectory(__DIR__ . '/../temp');
	$configurator->createRobotLoader()
#		->addDirectory(__DIR__ . '/../app')
		->register();
	
	
	$configurator->onCompile[] = function ($configurator, $compiler) {
		$compiler->addExtension('curl', new Kdyby\Curl\DI\CurlExtension);
	};
	
	$configurator->addConfig(__DIR__ . '/../setup/config.neon', Nette\Config\Configurator::NONE);
	
#	$configurator->addConfig(__DIR__ . '/../app/config/config.local.neon');
	return $configurator->createContainer();

