<!DOCTYPE html>

<?php if($page->translation()->exists()): ?>
<html lang="<?= kirby()->currentlanguage()->code() ?>">
<?php else: ?>
<html lang="<?= kirby()->defaultLanguage()->code() ?>">
<?php endif ?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $site->title() ?>/<?= $page->title() ?></title>
    <base href="<?= $page->url() ?>">
    <?= css("assets/css/style.css")?>
    <?php snippet('favicon') ?>
  </head>

<body>
  <header class="header">
    <a class="logo" href="<?= $site->url() ?>"><?= $site->title() ?></a>
    <nav class="menu">
      <ul>
        <?php foreach ($site->children()->listed() as $item): ?>
        <li><a href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
        <?php endforeach ?>
      </ul>
    </nav>
  </header>




