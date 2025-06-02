<?php 

$books = [
  [
    'title' => 'Do Androids Dream of Electric Sheep',
    'author' => 'Philip K. Dick',
    'releaseYear' => 1968,
    'purchaseUrl' => 'http://example.com'
  ],
  [
    'title' => 'Project Hail Mary',
    'author' => 'Andy Weir',
    'releaseYear' => 2021,
    'purchaseUrl' => 'http://example.com'
  ],
  [
    'title' => 'The Martian',
    'author' => 'Andy Weir',
    'releaseYear' => 2011,
    'purchaseUrl' => 'http://example.com'
  ],
];

$filteredBooks = array_filter($books, function($book) {
  return $book['author'] === 'Andy Weir';
});

require 'index.view.php';