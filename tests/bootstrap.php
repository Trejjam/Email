<?php

require dirname(__DIR__) . '/vendor/autoload.php';

if (!class_exists('Tester\Assert')) {
	echo "Install Nette Tester using `composer update --dev`\n";
	exit(1);
}

Tester\Environment::setup();

$configurator = new Nette\Configurator;
$configurator->setDebugMode(!FALSE);
Tracy\Debugger::$logDirectory = __DIR__ . '/../log';
//$configurator->enableDebugger(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
			 ->addDirectory(__DIR__ . '/../src')
			 ->addDirectory(__DIR__ . '/app')
			 ->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');
return $configurator->createContainer();
