<?php

require_once __DIR__ . '/../vendor/autoload.php';
$cfg = require_once __DIR__ . '/../config/config.php';

$trans = new Translator(require_once __DIR__ . '/../config/messages.php');
$commentsRepo = new CommentsRepository( $cfg['comments_file'] );
$comments = $commentsRepo->read();

$comments[]  = new Comment(
    $_POST['author'],
    $_POST['comment']
);

$commentsRepo->save( $comments );

header( 'Location: index.php' );