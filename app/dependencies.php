<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Medoo
$container['db'] = function ($c) {
    $db = new medoo([
        'database_type' => 'mysql',
        'database_name' => getenv('DB_NAME'),
        'server'        => getenv('DB_HOST'),
        'username'      => getenv('DB_USER'),
        'password'      => getenv('DB_PASS'),
        'charset'       => 'utf8'
    ]);

    return $db;
};

// Twig
$container['view'] = function ($c) {
    $view = new \Slim\Views\Blade(
        $c['settings']['view']['template_path'],
        $c['settings']['view']['cache_path'],
        null,
        [
            'flash' => $c->get('flash'),
            'helper' => $c->get('helper')
        ]
    );

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// CSRF protection
$container['csrf'] = function ($c) {
    return new Slim\Csrf\Guard;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container['helper'] = function ($c) {
    return new App\Helper($c);
};

$container[App\Middlewares\AuthMiddleware::class] = function ($c) {
    return new App\Middlewares\AuthMiddleware($c);
};

$container[App\Middlewares\RedirectIfAuthedMiddleware::class] = function ($c) {
    return new App\Middlewares\RedirectIfAuthedMiddleware($c);
};

$container[App\Middlewares\CheckRegisteredMiddleware::class] = function ($c) {
    return new App\Middlewares\CheckRegisteredMiddleware($c);
};

// $container[App\Action\HomeAction::class] = function ($c) {
//     return new App\Action\HomeAction($c->get('view'), $c->get('logger'));
// };

// $container['errorHandler'] = function ($c) {
//     return function ($request, $response, $exception) use ($c) {
//         return $c['response']->withStatus(500)
//                              ->withHeader('Content-Type', 'text/html')
//                              ->write('Something went wrong!');
//     };
// };
