<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table      = 'contact';
    protected $primaryKey = 'id_contact';
    // protected $returnType = "object";
    // protected $useTimestamps = true;
    protected $allowedFields = ['name_contact', 'hp', 'jabatan', 'profil'];
}
