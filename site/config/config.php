<?php

return [
    'languages' => true,
    'date.handler'  => 'intl',

    'sylvainjule.footnotes.wrapper'  => 'aside',

    'bnomei.pageviewcounter.ignore-panel-users' => false,

    'mauricerenck.indieConnector.sqlitePath' => 'content/.databases/',
    'mauricerenck.indieConnector.queue.enabled' => false,
    'mauricerenck.indieConnector.stats.enabled' => true,
    'mauricerenck.indieConnector.send.enabled' => true,
    'mauricerenck.indieConnector.send.markDeleted' => true,
    'mauricerenck.indieConnector.receive.enabled' => true,
    'mauricerenck.indieConnector.mastodon.enabled' => true,
    'mauricerenck.indieConnector.mastodon.instance-url' => 'https://social.treehouse.systems',
    'mauricerenck.indieConnector.post.prefereLanguage' => 'en',
    'mauricerenck.indieConnector.post.textfields' => ['title'],

    'mauricerenck.komments.moderation.autoPublish' => ['mail@tinko.dev'],

    "mauricerenck.ogimage.width" => 1200,
    "mauricerenck.ogimage.height" => 628,
    "mauricerenck.ogimage.field" => 'ogImage',
    "mauricerenck.ogimage.image.template" => 'assets/ogImageTemplate.png',
    "mauricerenck.ogimage.font.path" => 'assets/fonts/DepartureMono-Regular.otf',
    "mauricerenck.ogimage.font.color" => [25, 25, 25],
    "mauricerenck.ogimage.font.size" => 55,
    "mauricerenck.ogimage.font.lineheight" => 1.4 ,
    "mauricerenck.ogimage.heroImage.field" => 'hero',
    "mauricerenck.ogimage.heroImage.cropsize" => [460, 460],
    "mauricerenck.ogimage.heroImage.position" => [740, 0],
    "mauricerenck.ogimage.heroImage.fallbackColor" => [251, 249, 232],
    "mauricerenck.ogimage.title.field" => 'title',
    "mauricerenck.ogimage.title.position" => [50, 88],
    "mauricerenck.ogimage.title.charactersPerLine" => 14,







    'routes' => [
        [
            'pattern' => 'feed',
            'method' => 'GET',
            'action'  => function () {
                $options = [
                    'datefield' => 'created',
//                    'dateformat' => 'r',
                    'description' => 'Feed of Tinko\'s Notes',
                    'feedurl' => site()->url() . '/feed/',
                    'link' => site()->url(),
//                    'mime' => null,
//                    'modified' => time(),
                    'snippet' => 'feed/rss', // 'feed/json', 'feed/atom'
                    'sort' => true,
                    'textfield' => 'text',
                    'title' => 'Feed',
                    'titlefield' => 'title',
                    'url' => site()->url(),
                    'urlfield' => 'url',
                ];
                return feed(fn() => page('notes')->children()->listed()->flip()->limit(10), $options);
            }
        ],
    ],
];
