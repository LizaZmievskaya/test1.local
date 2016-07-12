<?php
namespace Liza\MyLogger
{
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    class MyLogger
    {
        public function fun()
        {
            $logger = new Logger('my_logger');
            $logger->pushHandler(new StreamHandler(__DIR__.'/my_app.log', Logger::INFO));
            $logger->addInfo('My logger is now ready');

//            echo "Hello";
        }
    }
}