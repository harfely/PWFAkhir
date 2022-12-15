<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsatuan extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'satid';
    protected $allowedFields    = [
        'satid', 'satnama'
    ];
        public function cariData($carisatuan){
        return $this->table('satuan')->like('satnama', $carisatuan);
    }
    
}