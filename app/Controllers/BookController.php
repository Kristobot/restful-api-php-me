<?php

namespace App\Controllers;

use App\Models\Book;

class BookController
{
  public function index()
  {
    return Book::all();
  }

  public function store()
  {
    $data = json_decode(file_get_contents('php://input'), true);

    if(!empty($data)){

      return Book::create([
        'title' => $data['name'],
        'author_id' => $data['author_id'],
        'publish_year' => $data['year']
      ]);

    }

    return json_encode(['Error' => 'Datos faltantes']);
  }
}