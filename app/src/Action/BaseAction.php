<?php
namespace App\Action;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class BaseAction
{
    protected $db;
    protected $logger;
    protected $view;

    public function __construct(ContainerInterface $ci)
    {
        $this->db = $ci->get('db');
        $this->logger = $ci->get('logger');
        $this->view = $ci->get('view');
    }
}
