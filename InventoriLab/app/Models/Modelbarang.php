<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbarang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'brgkode';
    protected $allowedFields    = [
        'brgkode', 'brgnama', 'brgkatid', 'brgsatid', 'brgharga', 'brggambar', 'brgstok'
    ];

    public function tampildata(){
        return $this->table('barang')->join('kategori', 'brgkatid=katid')->join('satuan', 'brgsatid=satid');
        
    }

    public function tampildata_cari($cari){
        return $this->table('barang')->join('kategori', 'brgkatid=katid')->join('satuan', 'brgsatid=satid')->orlike('brgkode',$cari)->orlike('brgnama',$cari)->orlike('katnama',$cari);

        //select * from barang join........where brgok ike %%l or..
    }

}