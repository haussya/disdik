<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeasiswaModel;
use App\Models\DomisiliModel;
use App\Models\FaktorModel;
use App\Models\KeteranganModel;
use App\Models\SekolahModel;
use App\Models\SiswaModel;
use App\Models\StatusModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends BaseController
{
    protected $siswa, $sekolah, $keterangan, $status, $beasiswa, $faktor, $domisili;

    public function __construct()
    {
        $this->siswa = new SiswaModel();
        $this->sekolah = new SekolahModel();
        $this->keterangan = new KeteranganModel();
        $this->status = new StatusModel();
        $this->beasiswa = new BeasiswaModel();
        $this->faktor = new FaktorModel();
        $this->domisili = new DomisiliModel();
    }

    public function index()
    {
        $siswa = $this->siswa->join('domisili', 'domisili.id_domisili=siswa.id_domisili')
            ->join('status', 'status.id_status=siswa.id_status')
            ->join('sekolah', 'sekolah.id_sekolah=siswa.id_sekolah')
            ->select('nisn,nama,nama_sekolah,nama_domisili,nama_status')
            ->groupBy('nisn');

        if ($this->request->getGet('status')) {
            $siswa->where('siswa.id_status', $this->request->getGet('status'));
        }

        if ($this->request->getGet('sekolah')) {
            $siswa->where('siswa.id_sekolah', $this->request->getGet('sekolah'));
        }

        return view('admin/siswa_index', [
            'title' => 'Data Siswa',
            'siswa' => $siswa->findAll(),
            'sekolah' => $this->sekolah->findAll(),
            'status' => $this->status->findAll(),
        ]);
    }

    public function ltm()
    {
        return view('admin/siswa_doltm', [
            'title' => 'Data Siswa LTM',
            'siswa' => $this->siswa->getSiswaLTM(),
            'faktor' => $this->faktor->findAll(),
        ]);
    }

    public function beasiswa()
    {
        return view('admin/siswa_beasiswa', [
            'title' => 'Data Siswa LTM',
            'siswa' => $this->siswa->getSiswaBeasiswa(),
        ]);
    }

    public function create()
    {
        return view('admin/siswa_tambah', [
            'title' => 'Tambah Siswa',
            'sekolah' => $this->sekolah->findAll(),
            'status' => $this->status->findAll(),
            'faktor' => $this->faktor->findAll(),
            'domisili' => $this->domisili->findAll(),
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function edit($id)
    {
        $siswa = $this->siswa->getSiswa($id);

        if (!$siswa) {
            session()->setFlashdata('error', 'Siswa tidak ditemukan');
            return redirect()->to('admin/siswa');
        }
        $riwayat = $this->siswa->getSiswaNISN($siswa['nisn']);

        

        return view('admin/siswa_edit', [
            'title' => 'Tambah Siswa',
            'siswa' => $siswa,
            'keterangan' => $this->keterangan->getBySiswa($id),
            'beasiswa' => $this->beasiswa->getBySiswa($id),
            'sekolah' => $this->sekolah->findAll(),
            'status' => $this->status->findAll(),
            'faktor' => $this->faktor->findAll(),
            'domisili' => $this->domisili->findAll(),
            'riwayat' => $riwayat,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function save()
    {
        if (!$this->validate('siswa')) {
            return redirect()->back()->withInput();
        }

        $siswa = [
            'nama' => $this->request->getPost('nama'),
            'nisn' => $this->request->getPost('nisn'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'tingkat' => $this->request->getPost('tingkat'),
            'alamat' => $this->request->getPost('alamat'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'id_domisili' => $this->request->getPost('domisili'),
            'id_status' => $this->request->getPost('status'),
            'id_sekolah' => $this->request->getPost('sekolah'),
            'modified_at' => date('Y/m/d')
        ];

        if ($siswa['id_status'] != 1 && $siswa['id_status'] != 2) {
            if (!$this->validate('siswa_status')) {
                return redirect()->back()->withInput();
            }

            $keterangan = [
                'alasan_tidak_melanjutkan' => $this->request->getPost('alasan_tidak_melanjutkan'),
                'rencana_melanjutkan' => $this->request->getPost('rencana_melanjutkan'),
                'id_faktor' => $this->request->getPost('faktor'),
            ];
        }

        if ($this->request->getPost('beasiswa') == 'ya') {
            if (!$this->validate('siswa_beasiswa')) {
                return redirect()->back()->withInput();
            }

            $beasiswa = [
                'nama_beasiswa' => $this->request->getPost('nama_beasiswa'),
                'besaran' => $this->request->getPost('besaran'),
            ];
        }

        $id = $this->siswa->insert($siswa, true);

        if ($siswa['id_status'] != 1 && $siswa['id_status'] != 2) {
            $keterangan['id_siswa'] = $id;
            $this->keterangan->insert($keterangan);
        }

        if ($this->request->getPost('beasiswa') == 'ya') {
            $beasiswa['id_siswa'] = $id;
            $this->beasiswa->insert($beasiswa);
        }

    
        session()->setFlashdata('pesan', 'Siswa berhasil ditambahkan');
        return redirect()->to('admin/siswa');
    }

    public function update($id)
    {
        $siswa = $this->siswa->find($id);

        if (!$siswa) {
            session()->setFlashdata('error', 'Siswa tidak ditemukan');
            return redirect()->to('admin/siswa');
        }

        if (!$this->validate('siswa')) {
            return redirect()->back()->withInput();
        }

        $siswa['nama'] = $this->request->getPost('nama');
        $siswa['nisn'] = $this->request->getPost('nisn');
        $siswa['jenis_kelamin'] = $this->request->getPost('jenis_kelamin');
        $siswa['tanggal_lahir'] = $this->request->getPost('tanggal_lahir');
        $siswa['tingkat'] = $this->request->getPost('tingkat');
        $siswa['alamat'] = $this->request->getPost('alamat');
        $siswa['nama_ibu'] = $this->request->getPost('nama_ibu');
        $siswa['id_domisili'] = $this->request->getPost('domisili');
        $siswa['id_status'] = $this->request->getPost('status');
        $siswa['id_sekolah'] = $this->request->getPost('sekolah');

        $this->siswa->update($id, $siswa);
        $this->keterangan->where('id_siswa', $id)->delete();
        $this->beasiswa->where('id_siswa', $id)->delete();

        if ($siswa['id_status'] != 1) {
            if (!$this->validate('siswa_status')) {
                return redirect()->back()->withInput();
            }

            $keterangan = [
                'id_siswa' => $id,
                'alasan_tidak_melanjutkan' => $this->request->getPost('alasan_tidak_melanjutkan'),
                'rencana_melanjutkan' => $this->request->getPost('rencana_melanjutkan'),
                'id_faktor' => $this->request->getPost('faktor'),
            ];

            $this->keterangan->insert($keterangan);
        }

        if ($this->request->getPost('beasiswa') == 'ya') {
            if (!$this->validate('siswa_beasiswa')) {
                return redirect()->back()->withInput();
            }

            $beasiswa = [
                'id_siswa' => $id,
                'nama_beasiswa' => $this->request->getPost('nama_beasiswa'),
                'besaran' => $this->request->getPost('besaran'),
            ];

            $this->beasiswa->insert($beasiswa);
        }



        session()->setFlashdata('pesan', 'Siswa berhasil diubah');
        return redirect()->to('admin/siswa');
    }

    public function delete($id)
    {
        $siswa = $this->siswa->find($id);

        if (!$siswa) {
            session()->setFlashdata('error', 'Siswa tidak ditemukan');
            return redirect()->to('admin/siswa');
        }

        $this->keterangan->where('id_siswa', $id)->delete();
        $this->beasiswa->where('id_siswa', $id)->delete();
        $this->siswa->delete($id);

        session()->setFlashdata('pesan', 'Suswa berhasil dihapus');
        return redirect()->to('admin/siswa');
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $siswa = $this->siswa->getSiswaExcel();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Sekolah')
            ->setCellValue('B1', 'Nisn')
            ->setCellValue('C1', 'Nama')
            ->setCellValue('D1', 'Domisili')
            ->setCellValue('E1', 'Status')
            ->setCellValue('F1', 'Tanggal Lahir')
            ->setCellValue('G1', 'Kelamin')
            ->setCellValue('H1', 'Ibu Kandung')
            ->setCellValue('I1', 'Tingkat')
            ->setCellValue('J1', 'Alamat')
            ->setCellValue('K1', 'Rencana Melanjutkan')
            ->setCellValue('L1', 'Faktor')
            ->setCellValue('M1', 'Nama Beasiswa')
            ->setCellValue('N1', 'Besaran');

        $column = 2;

        foreach ($siswa as $row) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $row['nama_sekolah'])
                ->setCellValue('B' . $column, $row['nisn'])
                ->setCellValue('C' . $column, $row['nama'])
                ->setCellValue('D' . $column, $row['nama_domisili'])
                ->setCellValue('E' . $column, $row['nama_status'])
                ->setCellValue('F' . $column, $row['tanggal_lahir'])
                ->setCellValue('G' . $column, $row['jenis_kelamin'])
                ->setCellValue('H' . $column, $row['nama_ibu'])
                ->setCellValue('I' . $column, $row['tingkat'])
                ->setCellValue('J' . $column, $row['alamat'])
                ->setCellValue('K' . $column, $row['rencana_melanjutkan'])
                ->setCellValue('L' . $column, $row['nama_faktor'])
                ->setCellValue('M' . $column, $row['nama_beasiswa'])
                ->setCellValue('N' . $column, $row['besaran']);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-Siswa';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
