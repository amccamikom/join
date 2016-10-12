<?php
namespace App\Middlewares;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
*
*/
class AuthMiddleware
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    function __invoke(Request $request, Response $response, $next)
    {
        if (!isset($_SESSION['authenticated'])) {
            return $response->withStatus(401)->withHeader('Location', $this->container->router->pathFor('admin.login'));
        }

        return $next($request, $response);
    }
}
