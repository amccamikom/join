<?php
namespace App\Action;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BaseAction
{
    protected $csrf;
    protected $db;
    protected $flash;
    protected $logger;
    protected $router;
    protected $view;

    public function __construct(ContainerInterface $ci)
    {
        $this->csrf   = $ci->get('csrf');
        $this->db     = $ci->get('db');
        $this->flash  = $ci->get('flash');
        $this->logger = $ci->get('logger');
        $this->router = $ci->get('router');
        $this->view   = $ci->get('view');
    }
}
