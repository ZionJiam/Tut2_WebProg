<?php

namespace App\Controllers;

use App\Models\EmailModel;

class Email extends BaseController
{
    public function index()
    {
        $model = new EmailModel();

        $data = [
            'email_list' => $model->getEmails(),
            'title'     => 'Email List',
        ];

        return view('templates/header', $data)
            . view('email/index')
            . view('templates/footer');
    }

    public function newemail()
    {   
        helper('form');

        return view('templates/header', ['title' => 'Create New Email'])
            . view('email/create')
            . view('templates/footer');
    }

    public function create()
    {   
        helper('form');

        $rules = [
            'email' => 'required|max_length[255]|valid_email',
            'subject' => 'required|max_length[255]',
            'message' => 'required'
        ];

        if (! $this->validate($rules)) {
            // Validation fails, return to the form with errors
            return redirect()->to('/email/create')->withInput()->with('validation', $this->validator);
        }

        // Validation passes, proceed to insert data into the database
        $model = new EmailModel();

        $model->insert([
            'email' => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
        ]);

        // Redirect to the email list page
        return redirect()->to('/email')->with('success', 'Email created successfully');
    }
}
