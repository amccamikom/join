<?php
namespace App\Action;

use App\Datatables;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class MemberAction extends BaseAction
{

    public function home(Request $request, Response $response)
    {
        $this->view->render($response, 'admin.home');

        return $response;
    }

    public function getData(Request $request, Response $response)
    {
        $sql_creds = [
            'user' => getenv('DB_USER'),
            'pass' => getenv('DB_PASS'),
            'db'   => getenv('DB_NAME'),
            'host' => getenv('DB_HOST')
        ];

        $columns = [
            ['db' => 'nim', 'dt' => 'nim'],
            ['db' => 'alamat', 'dt' => 'alamat'],
            ['db' => 'asal_sekolah', 'dt' => 'asal_sekolah'],
            ['db' => 'divisi', 'dt' => 'divisi'],
            ['db' => 'email', 'dt' => 'email'],
            ['db' => 'nama', 'dt' => 'nama'],
            ['db' => 'noHp', 'dt' => 'noHp'],
            ['db' => 'noReg', 'dt' => 'noReg'],
            ['db' => 'status', 'dt' => 'status'],
        ];

        //$data = Datatables::simple($request->getParsedBody(), $sql_creds, 'member', 'nim', $columns);
        $data = Datatables::get($this->db, $request->getParsedBody());

        return $response->withJson($data);
    }
}
