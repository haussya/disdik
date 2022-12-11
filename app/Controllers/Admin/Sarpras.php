<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaktorModel;
use App\Models\SarprasModel;
use App\Models\SarprasSekolahModel;
use App\Models\SekolahModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sarpras extends BaseController
{
  protected $sarpras, $sarpras_sekolah, $sekolah;

  public function __construct()
  {
    $this->sekolah = new SekolahModel();
    $this->sarpras = new SarprasModel();
    $this->sarpras_sekolah = new SarprasSekolahModel();
  }

  public function index()
  {
    return view('admin/sarpras', [
      'title'    => 'Data Sarpras',
      'sarpras'  => $this->sarpras->findAll()
    ]);
  }

  public function create()
  {
    if (!$this->validate('sarpras')) {
      session()->setFlashdata('error', 'Slug telah digunakan');
      return redirect()->to('admin/sarpras');
    }

    $this->sarpras->insert([
      'nama_sarpras' => $this->request->getPost('nama_sarpras'),
      'slug' => $this->request->getPost('slug')
    ]);

    session()->setFlashdata('pesan', 'Sarpras berhasil dibuat');
    return redirect()->to('admin/sarpras');
  }

  public function delete($id)
  {
    $sarpras = $this->sarpras->find($id);

    if (!$sarpras) {
      session()->setFlashdata('error', 'Sarpras tidak ditemukan');
      return redirect()->to('admin/sarpras');
    }

    $this->sarpras->delete($sarpras['id_sarpras']);

    session()->setFlashdata('pesan', 'Sarpras berhasil dihapus');
    session()->setFlashdata('pesanindex', 'Data berubah segera print');
    return redirect()->to('admin/sarpras');
  }


  public function export()
  {
    $spreadsheet = new Spreadsheet();
    $sekolah = $this->sekolah->findAll();
    $sarpras = $this->sarpras->findAll();

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'nama_sp')
      ->setCellValue('B1', 'jenjang')
      ->setCellValue('C1', 'status_sekolah');

    $words = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    $slugs = [];
    for ($i = 0; $i < count($sarpras); $i++) {
      $row = $i + 4;
      $letter = '';
      $kontol = floor($row / 26) - 1;
      if ($kontol >= 0) $letter .= $words[$kontol];
      $letter .= $words[($row % 26) - 1];

      $slugs[] = $sarpras[$i]['slug'];

      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue($letter . '1', $sarpras[$i]['slug']);
    }

    $column = 2;
    foreach ($sekolah as $school) {
      $sarpras_sekolah = $this->sarpras_sekolah->getBySekolah($school['id_sekolah']);

      $sekolah_sarpras = [];

      foreach ($sarpras as $row) {
        $sekolah_sarpras[$row['slug']] = 0;
      }

      foreach ($sarpras_sekolah as $row) {
        $sekolah_sarpras[$row['slug']] = $row['jumlah'];
      }

      $data_sarpras = [];
      foreach ($sarpras as $row) {
        $data_sarpras[$row['slug']] = intval($sekolah_sarpras[$row['slug']]);
      }

      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $school['nama_sekolah'])
        ->setCellValue('B' . $column, $school['jenjang'])
        ->setCellValue('C' . $column, $school['status']);

      for ($i = 0; $i < count($slugs); $i++) {
        $row = $i + 4;
        $letter = '';
        $kontol = floor($row / 26) - 1;
        if ($kontol >= 0) $letter .= $words[$kontol];
        $letter .= $words[($row % 26) - 1];

        $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue($letter . $column, $data_sarpras[$slugs[$i]]);
      }

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
