<?php

require_once __DIR__ . '/../vendor/autoload.php';
$cfg = require_once __DIR__ . '/../config/config.php';

$trans = new MessageBag(require_once __DIR__ . '/../config/messages.php');
$commentsSerializer = new CommentsJsonSerializer();
$commentsRepo = new CommentsRepository( $cfg['comments_file'], $commentsSerializer );
$comments = $commentsRepo->read();

$comments[]  = new Comment(
    $_POST['author'],
    $_POST['comment']
);

$commentsRepo->save( $comments );

header( 'Location: index.php' );