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
  <?= css("assets/css/oldstylesheet.css")?>
  <?php snippet('favicon') ?>
  <?php snippet('webmention-endpoint'); ?>
</head>

<body onload="typeWriter();">

  <header class="header">
    <nav class="menu">
      <ul>
        <?php foreach ($site->children()->listed() as $item): ?>
          <li><a href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
        <?php endforeach ?>
      </ul>
    </nav>
  </header>

  <h1 id="demo" class="line-1 anim-typewriter" contenteditable="true"></h1>

  <script>
    let i = 0;
    let txt = "Hey!\u00A0I'm\u00A0Tinko\u00A0Vialard.";
    let speed = 200;

    function typeWriter() {
      if (i < txt.length) {
        document.getElementById("demo").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
      }
    }
  </script>

  <footer class="end">
    <hr width="75%">
    <p>
      &copy; <?= date('Y') ?> <?= $site->title() ?><br><br>
      Built with <a href="https://getkirby.com">Kirby</a>
      Hosted on <a href="https://uberspace.de/">Asteroids</a>
    </p>
  </footer>
</body>
</html>
