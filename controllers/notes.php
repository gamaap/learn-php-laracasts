<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "My Notes";

$currentUser = $db->query("SELECT id FROM users WHERE name = 'John'")->fetch();

$notes = $db->query("SELECT * FROM notes WHERE user_id = " . $currentUser['id'])->fetchAll();

require 'views/notes.view.php';