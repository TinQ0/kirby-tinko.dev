<!DOCTYPE html>

<?php if($page->translation()->exists()): ?>
<html lang="<?= kirby()->currentlanguage()->code() ?>">
<?php else: ?>
<html lang="<?= kirby()->defaultLanguage()->code() ?>">
<?php endif ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="view-transition" content="same-origin">
    <title><?= $site->title() ?>/<?= $page->title() ?></title>
    <base href="<?= $page->url() ?>">
    <?= css("assets/css/style.css")?>
    <?php snippet('favicon') ?>
    <?php snippet('webmention-endpoint'); ?>
    <meta property="og:title" content="<?= $page->title(); ?>">
    <meta property="og:url" content="<?= $page->url(); ?>">
    <meta property="og:image" content="<?= $page->url(); ?>/og-image">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <?php echo css(['/media/plugins/mauricerenck/komments/komments.css']); ?>
</head>

<body>
    <header>
        <nav class="menu menu-top">
            <ul>
                <li>
                    <a href="<?= $site->url() ?>">
                        <span class="label" style="background: #b51219;">Home</span>
                    </a>
                </li>
                <?php foreach ($site->children()->listed() as $item): ?>
                    <li>
                        <a <?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>">
                            <span class="label"><?= $item->title() ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
        <nav class="menu menu-bottom">
            <ul>
                <li>
                    <a href="<?= $site->url() ?>">
                        <span class="label" style="background: #b51219;">Home</span>
                    </a>
                </li>
                <?php foreach ($site->children()->listed() as $item): ?>
                    <li>
                        <a <?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>">
                            <span class="label"><?= $item->title() ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>







