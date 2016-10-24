<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ExportAction extends BaseAction
{

    public function export(Request $request, Response $response)
    {
        $excel = new \PHPExcel;
        $writer = \PHPExcel_IOFactory::createWriter($excel, "Excel2007");
        $sheet = $excel->getActiveSheet();
        $sheet->getCell('A1')->setValue('NIM');
        $sheet->getCell('B1')->setValue('Nama');
        $sheet->getCell('C1')->setValue('Email');
        $sheet->getCell('D1')->setValue('No. HP');
        $sheet->getCell('E1')->setValue('Divisi');
        $sheet->getCell('F1')->setValue('No. Reg');
        $sheet->getCell('G1')->setValue('Status');

        $members = $this->db->select('member', '*');
        $data= [];

        foreach ($members as $member) {
            $data[] = [
                $member['nim'],
                $member['nama'],
                $member['email'],
                (string) $member['noHp'],
                $member['divisi'],
                $member['noReg'],
                $member['status']
            ];
        }

        $sheet->fromArray($data, NULL, 'A2');

        $filename = 'member_'.date('d-m-Y');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
