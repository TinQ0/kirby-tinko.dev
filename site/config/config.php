<?php

return [
    'debug' => true,
    'languages' => true,
    'date.handler'  => 'intl',

    'sylvainjule.footnotes.wrapper'  => 'aside',

    'mauricerenck.indieConnector.sqlitePath' => 'content/.sqlite/',
    'mauricerenck.indieConnector.stats.enabled' => true,
    'mauricerenck.indieConnector.mastodon.enabled' => true,
    'mauricerenck.indieConnector.mastodon.bearer' => 'RZeiCGJzN4EHouA3PhyNYXX21_9A7cOnjxCSqFLhTVc',
    'mauricerenck.indieConnector.mastodon.instance-url' => 'https://social.treehouse.systems',
    'mauricerenck.indieConnector.post.prefereLanguage' => 'en',
    'mauricerenck.indieConnector.post.textfields' => ['title'],
    'mauricerenck.indieConnector.post.imagefield' => 'postImage',

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
