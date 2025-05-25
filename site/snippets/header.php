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
    <link rel="icon" href="/assets/favicon/favicon.ico" sizes="32x32">
    <link rel="icon" href="/assets/favicon/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/assets/favicon/favicon.png">
    <?= css("https://cdn.simplecss.org/simple.min.css")?>
    <?php snippet('webmention-endpoint'); ?>
    <meta property="og:title" content="<?= $page->title(); ?>">
    <meta property="og:url" content="<?= $page->url(); ?>">
    <meta property="og:image" content="<?= $page->url(); ?>/og-image">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <?php echo css(['/media/plugins/mauricerenck/komments/komments.css']); ?>
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




