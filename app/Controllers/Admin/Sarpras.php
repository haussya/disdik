<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaktorModel;
use App\Models\SarprasModel;
use App\Models\SarprasSekolahModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sarpras extends BaseController
{
  protected $sarpras, $sarpras_sekolah;

  public function __construct()
  {
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
      $sarpras = $this->sarpras_sekolah->getSarprasExcel();


      $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('A1', 'Sekolah')
          ->setCellValue('B1','Slug');

      $column = 2;

      foreach ($sarpras as $row) {
          $spreadsheet->setActiveSheetIndex(0)
              ->setCellValue('A' . $column, $row['nama_sekolah'])
              ->setCellValue('B' . $column, $row['slug']);
            
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
