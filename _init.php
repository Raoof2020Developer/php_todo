    <?php

    use App\App;
    use App\Database\DBConnection;
    use App\Database\QueryBuilder;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/php-error.log'); // Log errors to a file
    
    require 'vendor/autoload.php';

    App::set('config', require 'config.php');

    $log = new Logger('PHP_BASICS');
    $log->pushHandler(new StreamHandler('queries.log', Logger::INFO));

    QueryBuilder::make(
        DBConnection::make(App::get('config')['database']),
        $log
    );
