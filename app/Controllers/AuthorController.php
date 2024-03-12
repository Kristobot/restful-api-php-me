<?php

namespace App\Controllers;

use App\Models\Author;

class AuthorController
{
  public function index()
  {
    return Author::all();
  }

  public function store()
  {
    $data = json_decode(file_get_contents('php://input'), true);

    if(!empty($data)){

      return Author::create([
        'name' => $data['name'],
        'last_name' => $data['last_name'],
        'id_district' => $data['id_district'],
        'email_address' => $data['email']
      ]);

    }

    return json_encode(['Error' => 'Datos faltantes']);
    
  }

  public function show($id){
    return Author::find($id);
  }
}