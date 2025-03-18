<?php snippet('header') ?>

<main class="main">

  <h1><?= $page->title() ?></h1>
  <article>
    <?= $page->text()->footnotes() ?>
  </article>

    <?php snippet('komments/kommentform'); ?>
    <?php snippet('komments/list/comments'); ?>
    <?php snippet('komments/list/likes'); ?>

</main>

<?php snippet('footer') ?>

