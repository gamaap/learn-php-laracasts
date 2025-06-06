<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $_SESSION['user']['user_id']);

if ($note['user_id'] !== $_SESSION['user']['user_id']) {
  abort(Response::FORBIDDEN);
}

view('notes/show.view.php', [
  'heading' => 'Note',
  'note' => $note
]);