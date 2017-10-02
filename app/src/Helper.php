<?php
namespace App;

use Interop\Container\ContainerInterface;

/**
*
*/
class Helper
{
    protected $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function base_url($path='')
    {
        return rtrim($this->ci->settings['base_url'], '/').$path;
    }

    public function route($route='')
    {
        return $this->ci->router->pathFor($route);
    }

    public function currentUser()
    {
        if (!$_SESSION['authenticated']) {
            return null;
        }

        $user = $this->ci->db->get('admin', ['id', 'email'], ['id' => $_SESSION['admin_id']]);

        return $user;
    }
}
