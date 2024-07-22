<?php

trait Logger
{
    public function log(string $message)
    {
        echo "Log: $message" . PHP_EOL;
    }
}

trait FileLogger
{
    public function log(string $message)
    {
        echo "File Log: $message" . PHP_EOL;
    }
}

class Application
{
    use Logger, FileLogger {
        // Resolve method conflict using 'insteadof'
        FileLogger::log insteadof Logger;
        // Alias the Logger trait's log method
        Logger::log as logToConsole;
    }
}

$app = new Application();

// Using the resolved log method
$app->log("This will log to file.");

// Using the aliased log method
$app->logToConsole("This will log to console.");

// Real-world example with a humorous twist
trait ErrorHandler
{
    public function logError(string $error)
    {
        echo "Error: $error" . PHP_EOL;
    }
}

trait Debugger
{
    public function logError(string $error)
    {
        echo "Debug Error: $error" . PHP_EOL;
    }
}

class DebugApplication
{
    use ErrorHandler, Debugger {
        Debugger::logError insteadof ErrorHandler;
        ErrorHandler::logError as logGeneralError;
    }
}

$debugApp = new DebugApplication();

// Using the resolved logError method
$debugApp->logError("This is a debug error.");

// Using the aliased logError method
$debugApp->logGeneralError("This is a general error.");

// Adding some humor to lighten up the debugging session
echo "Debugging: Where you figure out why your solution didn't work and why your initial solution was actually correct.";

?>