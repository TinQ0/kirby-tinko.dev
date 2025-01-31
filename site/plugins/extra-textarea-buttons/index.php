<?php
Kirby::plugin('tinko/extra-textarea-buttons', [
    'hooks' => [
        'kirbytags:before' => function($text, $data, $options) {
            // `==highlighted text==`
            return preg_replace('/==(?=\S)(.+?)(?<=\S)==/', '<mark>$1</mark>', $text);
        },
    ],
]);
