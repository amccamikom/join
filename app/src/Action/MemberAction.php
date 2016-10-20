<?php
namespace App\Action;

//use App\Datatables;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class MemberAction extends BaseAction
{

    public function home(Request $request, Response $response)
    {
        $this->view->render($response, 'admin.home');

        return $response;
    }

    public function getData(Request $request, Response $response)
    {
        $config = [
            'host'     => getenv('DB_HOST'),
            'port'     => '3306',
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASS'),
            'database' => getenv('DB_NAME')
        ];

        $dt = new Datatables(new MySQL($config));

        $dt->query("SELECT nim, nama, email, noHp, divisi, noReg, status FROM member");

        $dt->edit('aksi', function($row) {
            $editBtn = '<button type="button" class="btn btn-info btn-sm" data-nim="'.$row['nim'].'" data-status="'.$row['status'].'" data-reg="'.$row['noReg'].'" data-nama="'.$row['nama'].'" data-toggle="modal" data-target="#edit-member-modal"><i class="ion-edit"></i></button>';
            $deleteBtn = '<button type="button" class="btn btn-danger btn-sm" data-nim="'.$row['nim'].'"><i class="ion-trash-a"></i></button>';

            return "$editBtn $deleteBtn";
        });

        return $response->withJson($dt->generate(false));
    }

    public function editData(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $member = $this->db->get('member', '*', ['nim' => $data['nim']]);

        if (!$member) {
            return $response->withJson([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        $this->db->update('member', [
            'noReg'  => $data['noReg'],
            'status' => (int) $data['status']
        ], ['nim' => $data['nim']]);

        return $response->withJson([
            'status' => 'ok',
            'message' => 'Data member berhasil diupdate.'
        ]);
    }
}
