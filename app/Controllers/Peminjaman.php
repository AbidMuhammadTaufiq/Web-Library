<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BukuModel;
use App\Models\CopyModel;
use \Myth\Auth\Models\UserModel;
use CodeIgniter\Validation\Rules;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Peminjaman extends BaseController
{
    protected $peminjamanModel;
    protected $bukuModel;
    protected $copyModel;
    protected $userModel;
    protected $db, $builder;
    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->bukuModel = new BukuModel();
        $this->copyModel = new CopyModel();
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Peminjaman',
            'peminjaman' => $this->peminjamanModel->getPeminjaman()
        ];

        return view('admin/peminjaman/peminjamanIndex', $data);
    }

    public function rekap()
    {
        $data = [
            'title' => 'Rekap Daftar Peminjaman',
            'peminjaman' => $this->peminjamanModel->getPeminjamanRekap()
        ];

        return view('admin/peminjaman/peminjamanRekap', $data);
    }

    public function export()
    {
        $filename = "peminjaman-" . date('d-m-y') . ".xlsx";
        $peminjaman = $this->peminjamanModel->getPeminjamanRekap();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No.');
        $sheet->setCellValue('B1', 'Judul Buku');
        $sheet->setCellValue('C1', 'Eksemplar');
        $sheet->setCellValue('D1', 'Peminjam');
        $sheet->setCellValue('E1', 'Instansi');
        $sheet->setCellValue('F1', 'Tanggal Pinjam');
        $sheet->setCellValue('G1', 'Due Date');

        $coloumn = 2;
        foreach ($peminjaman as $p) {
            $sheet->setCellValue('A' . $coloumn, ($coloumn - 1));
            $sheet->setCellValue('B' . $coloumn, $p['judul_buku']);
            $sheet->setCellValue('C' . $coloumn, $p['eksemplar']);
            $sheet->setCellValue('D' . $coloumn, $p['fullname']);
            $sheet->setCellValue('E' . $coloumn, $p['instansi']);
            $sheet->setCellValue('F' . $coloumn, $p['tanggal_pinjam']);
            $sheet->setCellValue('G' . $coloumn, $p['tanggal_kembali']);
            $coloumn++;
        }

        //Bold Coloumn
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A1:G1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('yellow');

        //Border Coloumns
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
            ]
        ];
        $sheet->getStyle('A1:G1' . ($coloumn - 1))->applyFromArray($styleArray);

        //Autosize Coloum
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function create()
    {
        $this->builder->select('users.id as userid, username, email, fullname, instansi, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups_users.group_id !=', '1');
        $query = $this->builder->get();

        // session();
        $data = [
            'title' => 'Add | Peminjaman',
            'buku' => $this->bukuModel->getBuku(),
            // 'copy' => $this->copyModel->getCopy(),
            'copy' => $this->copyModel
                ->join('judul', 'judul.id_judul = copy.id_judul')
                ->orderBy('judul_buku', 'ASC')->findAll(),
            'user' => $query->getResult(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/peminjaman/peminjamanTambah', $data);
    }

    public function save()
    {
        $this->peminjamanModel->save([
            'id_copy' => $this->request->getVar('id_copy'),
            'id' => $this->request->getVar('id'),
            'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
            'tanggal_kembali' => $this->request->getVar('tanggal_kembali')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');

        return redirect()->to('/Peminjaman/index');
    }

    public function delete($id_peminjaman)
    {
        $this->peminjamanModel->delete($id_peminjaman);

        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');

        return redirect()->to('/Peminjaman/index');
    }

    public function edit($id_peminjaman)
    {
        $this->builder->select('users.id as userid, username, email, fullname, instansi, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups_users.group_id !=', '1');
        $query = $this->builder->get();

        $data = [
            'title' => 'Edit | Peminjaman',
            'validation' => \Config\Services::validation(),
            'peminjaman' => $this->peminjamanModel->find($id_peminjaman),
            'copy' => $this->copyModel->getCopy(),
            'user' => $query->getResult(),
        ];
        return view('admin/peminjaman/peminjamanEdit', $data);
    }

    public function update($id_peminjaman)
    {
        $this->peminjamanModel->save([
            'id_peminjaman' => $id_peminjaman,
            'id_copy' => $this->request->getVar('id_copy'),
            'id' => $this->request->getVar('id'),
            'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
            'tanggal_kembali' => $this->request->getVar('tanggal_kembali')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');

        return redirect()->to('/Peminjaman/index');
    }
}
