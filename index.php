<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demo</title>
  </head>
  <body>
    <h1>Recommended Books</h1>

    <?php 
      $books = [
        [
          'title' => 'Do Androids Dream of Electric Sheep',
          'author' => 'Philip K. Dick',
          'purchaseUrl' => 'http://example.com'
        ],
        [
          'title' => 'Project Hail Mary',
          'author' => 'Andy Weir',
          'purchaseUrl' => 'http://example.com'
        ],
      ];
    ?>

    <ul>
      <?php foreach ($books as $book) : ?>
        <li>
          <a href="<?= $book['purchaseUrl'] ?>">
            <?= $book['title'] ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </body>
</html>
