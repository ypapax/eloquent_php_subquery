<?php

namespace LineLogger;

use Logger;
use LoggerConfigurator;
use LoggerHierarchy;
use LoggerAppenderConsole;
use LoggerLayoutPattern;

class Log
{
	public static function get()
	{
		Logger::configure([], new AppLogConfigurator); // use the specified configuration
		$log = Logger::getLogger("general");
		return $log;
	}
}

class AppLogConfigurator implements LoggerConfigurator

{

	public function configure(LoggerHierarchy $hierarchy, $input = null)

	{

// Note that %n inserts a newline.

		$layout = new LoggerLayoutPattern();

		$layout->setConversionPattern("%date{Y-m-d h:i:s} - %file:%line - %msg%n");

		$layout->activateOptions();


		$consoleAppender = new LoggerAppenderConsole();

		$consoleAppender->setLayout($layout);

		$consoleAppender->activateOptions();


		$rootLogger = $hierarchy->getRootLogger();

		$rootLogger->addAppender($consoleAppender);

	}

}
