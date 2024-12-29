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
          "purchaseUrl" => "http://example.com"
        ],
        [
          "name" => "Project Hail Mary",
          "author" => "Andy Weir",
          "purchaseUrl" => "http://example.com"
        ]
      ];
    ?>
    <ul>
      <?php foreach($books as $book) : ?>
          <li>
            <a href="<?= $book['purchaseUrl'] ?>">
              <?= $book['name'] ?>
            </a>
          </li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>