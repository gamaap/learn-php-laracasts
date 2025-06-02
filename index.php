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

      function filter($items, $fn)
      {
        $filteredItems = [];

        foreach ($items as $item) {
          if ($fn($item)) {
            $filteredItems[] = $item;
          }
        }

        return $filteredItems;
      }

      $filteredBooks = array_filter($books, function($book) {
        return $book['author'] === 'Andy Weir';
      });
    ?>

    <ul>
      <?php foreach ($filteredBooks as $book) : ?>
        <li>
          <a href="<?= $book['purchaseUrl'] ?>">
            <?= $book['title'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </body>
</html>
