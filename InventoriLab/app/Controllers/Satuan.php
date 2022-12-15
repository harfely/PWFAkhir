<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelsatuan;

class Satuan extends BaseController
{
    public function __construct(){
        $this->satuan = new Modelsatuan();
    }
    
    public function index()
    {
        return view('satuan/viewsatuan');
        
        $tombolcari = $this->request->getPost('tombolcari');
        if (isset($tombolcari)) {
            $carisatuan = $this->request->getPost('cari');
            session()->set('cari_satuan', $carisatuan);
            redirect()->to('/satuan/index');
        }else{
            $carisatuan = session()->get('cari_satuan');
        }
        
        $dataSatuan = $carisatuan ? $this->satuan->cariData($carisatuan)->paginate(5, 'satuan') : $this->satuan->paginate(5, 'satuan');
        
        $nohalaman = $this->request->getVar('page_satuan') ? $this->request->getVar('page_satuan') : 1;
        $data = [
            'tampildata' => $dataSatuan,
            'pager' => $this->satuan->pager,
            'nohalaman' => $nohalaman,
            'cari' => $carisatuan
        ];
       return view('satuan/viewkategori', $data);
    }

    public function formtambah(){
        return view('satuan/formtambah');
    }
    public function simpandata(){
        $namasatuan = $this->request->getVar('namasatuan');

        $validation = \Config\Services::validation();

        $valid = $this-> validate([
            'namasatuan' => [
                'rules' => 'required',
                'label' => 'Nama Satuan',
                'error' =>[
                    'required' => '{field} tidakboleh kosong'
                ]
                ]
        ]);

        if(!$valid){
            $pesan = [
                'errorNamaSatuan' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/formtambah');
        }else{
            $this->satuan->insert([
                'satnama' => $namasatuan
            ]);

            
            $pesan = [
                'sukses' => ' <div class="alert alert-success">Data Satuan berhasil ditambah</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');
        }
    }

    public function formedit($id) {
        $rowData = $this->satuan->find($id);
        if ($rowData) {
            $data = [
                'id' => $id,
                'nama' => $rowData['satnama']
            ];

            return view('satuan/formedit', $data);
        }else {
            exit('Data tidak ditemukan');
        }
    }

    public function updatedata(){
        $idsatuan = $this->request->getVar('idsatuan');
        $namasatuan = $this->request->getVar('namasatuan');

        $validation = \Config\Services::validation();

        $valid = $this-> validate([
            'namasatuan' => [
                'rules' => 'required',
                'label' => 'Nama Satuan',
                'error' =>[
                    'required' => '{field} tidakboleh kosong'
                ]
                ]
        ]);

        if(!$valid){
            $pesan = [
                'errorNamaSatuan' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/formedit/'.$idsatuan);
        }else{
            $this->satuan->update($idsatuan, [
                'satnama' => $namasatuan
            ]);

            
            $pesan = [
                'sukses' => ' <div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
Data berhasil di update!
</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');
        }
    }


    public function hapus($rowData) {
                $rowData = $this->satuan->find($rowData);
        
        if ($rowData) {
             $this->satuan->delete($rowData);
             
            $pesan = [
            'sukses' => ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
            Data berhasil di udihapus.
            </div>'
            ];
            
            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');
             
        }else {
            exit('Data tidak ditemukan');
        }
    }
}