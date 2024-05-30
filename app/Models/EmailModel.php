<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table = 'email';
    
    protected $allowedFields = ['email', 'subject', 'message']; // Fields that can be inserted


    public function getEmails($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}