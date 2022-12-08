<?php

namespace App\Controllers;

use App\Models\ComicsModel;
use App\Models\RekomendasiModel;
use App\Models\BukuModel;
use App\Models\GenreModel;
use App\Models\PeminjamanModel;
use App\Models\ResensiModel;
use App\Models\CopyModel;
use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\Constraint\Count;

class Pages extends BaseController
{
    protected $comicsModel;
    protected $rekomendasiModel;
    protected $bukuModel;
    protected $genreModel;
    protected $peminjamanModel;
    protected $resensiModel;
    protected $copyModel;
    public function __construct()
    {
        $this->comicsModel = new ComicsModel();
        $this->rekomendasiModel = new RekomendasiModel();
        $this->bukuModel = new BukuModel();
        $this->genreModel = new GenreModel();
        $this->peminjamanModel = new PeminjamanModel();
        $this->resensiModel = new ResensiModel();
        $this->copyModel = new CopyModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home | Perpustakaan',
            'rekomendasi' => $this->rekomendasiModel->getRekomendasi()
        ];
        return view('pages/home', $data);
    }

    public function bukuindex()
    {
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $buku = $this->bukuModel->search($keyword);
        } else {
            $buku = $this->bukuModel
                ->select('judul.*, genre.nama_genre, penerbit.nama_penerbit')
                ->join('genre', 'genre.id_genre=judul.id_genre')
                ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit');

            if ($genreId = $this->request->getGet('id_genre')) {
                $buku = $buku->where('genre.id_genre', $genreId);
            }
        }

        $data = [
            'title' => 'Buku | Perpustakaan',
            'genre' => $this->genreModel->findAll(),
            'buku' => $buku->paginate(10, 'buku'),
            // 'buku' => $this->bukuModel->paginate(10),
            'pager' => $this->bukuModel->pager,
            'currentPage' => $currentPage,
        ];
        return view('pages/bukuindex', $data);
    }

    public function bukuDetail($id_judul)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->bukuModel
                ->join('genre', 'genre.id_genre=judul.id_genre')
                ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
                ->find($id_judul),
            'copy' => $this->copyModel
                ->join('judul', 'judul.id_judul=copy.id_judul')
                ->select('eksemplar')
                ->where('judul.id_judul =', $id_judul)
                ->countAllResults(),
            'peminjaman' => $this->peminjamanModel
                ->join('users', 'users.id=peminjaman.id')
                ->join('copy', 'copy.id_copy=peminjaman.id_copy')
                ->join('judul', 'judul.id_judul=copy.id_judul')
                ->select('*')
                ->where('judul.id_judul', $id_judul)
                ->where('peminjaman.deleted_at', null)
                ->get()->getResultArray(),
            'resensi' => $this->resensiModel
                ->join('users', 'users.id=resensi.id')
                ->join('judul', 'judul.id_judul=resensi.id_judul')
                ->select('*')
                ->where('judul.id_judul', $id_judul)
                ->get()->getResultArray(),
            'tersedia' => $this->peminjamanModel
                ->join('users', 'users.id=peminjaman.id')
                ->join('copy', 'copy.id_copy=peminjaman.id_copy')
                ->join('judul', 'judul.id_judul=copy.id_judul')
                ->select('*')
                ->where('judul.id_judul ', $id_judul)
                ->countAllResults()
        ];

        return view('pages/bukudetail', $data);
    }

    public function peminjamanIndex()
    {
        $data = [
            'title' => 'Peminjamann | Perpustakaan',
            'peminjaman' => $this->peminjamanModel->getPeminjaman()
        ];

        return view('pages/peminjamanindex', $data);
    }

    public function resensiIndex()
    {
        $data = [
            'title' => 'Resensi | Perpustakaan',
            'resensi' => $this->resensiModel->getResensi()
        ];

        return view('pages/resensiindex', $data);
    }

    public function resensiDetail($id_resensi)
    {
        $data = [
            'title' => 'Daftar Resensi',
            'resensi' => $this->resensiModel
                ->join('users', 'users.id=resensi.id')
                ->join('judul', 'judul.id_judul=resensi.id_judul')
                ->join('genre', 'genre.id_genre=judul.id_genre')
                ->join('penerbit', 'penerbit.id_penerbit=judul.id_penerbit')
                ->find($id_resensi)
        ];

        return view('pages/resensidetail', $data);
    }
}
