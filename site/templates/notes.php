
<?php snippet('header') ?>

<main class="main">

  <h1><?= $page->title() ?></h1>
  <nav class="notes">
    <ul>
      <?php foreach ($page->children()->listed() as $note): ?>
      <li>
        <a href="<?= $note->url() ?>">
          <?= $note->title() ?>
        </a>
      </li>
      <?php endforeach ?>
    </ul>

</main>

<?php snippet('footer') ?>

