<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
      
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="mb-5">
      <a href="/notes" class="text-blue-500 hover:underline">Go Back</a>
    </p>
    <p>
      <?= htmlspecialchars($note['body']) ?>
    </p>

    <div class="mt-6 flex items-center justify-start gap-x-3">
      <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
      <form action="/note" method="POST">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <input type="hidden" name="_method" value="DELETE">
        <button class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
      </form>
    </div>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>