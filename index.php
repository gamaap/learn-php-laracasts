<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Demo</title>
  </head>
  <body>
    <h1>Recommended Books</h1>
    <?php 
      $books = [
        [
          "name" => "Do Androids Dream of Electric Sheep",
          "author" => "Philip K. Dick",
          "releaseYear" => 1968,
          "purchaseUrl" => "http://example.com"
        ],
        [
          "name" => "Project Hail Mary",
          "author" => "Andy Weir",
          "releaseYear" => 2021,
          "purchaseUrl" => "http://example.com"
        ],
        [
          "name" => "The Martian",
          "author" => "Andy Weir",
          "releaseYear" => 2011,
          "purchaseUrl" => "http://example.com"
        ]
      ];

      function filter($items, $fn) {
        $filteredItems = [];

        foreach($items as $item) {
          if($fn($item)) {
            $filteredItems[] = $item;
          }
        }
        
        return $filteredItems;
      }

      $filteredBooks = filter($books, function($book) {
        return $book['releaseYear'] < 2000;
      });

      // Using PHP built-in function
      $filteredBooks = array_filter($books, function($book) {
        return $book['releaseYear'] < 2000;
      });
    ?>
    <ul>
      <?php foreach($filteredBooks as $book) : ?>
        <li>
          <a href="<?= $book['purchaseUrl'] ?>">
            <?= $book['name'] ?> (<?= $book['releaseYear'] ?>)
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>