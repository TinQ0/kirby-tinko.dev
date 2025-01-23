<?php snippet('header') ?>

<main class="main">

  <h1><?= $page->title() ?></h1>
  <article>
    <?= $page->text()->footnotes() ?>
  </article>
</main>

<?php snippet('footer') ?>

