<?php

require_once __DIR__.'/../vendor/autoload.php';
$cfg = require_once __DIR__.'/../config/config.php';

$trans = new Translator( require_once __DIR__.'/../config/messages.php' );
$commentsRepo = new CommentsRepository( $cfg['comments_file'] );
$comments = $commentsRepo->read();
?>
<html>
<body>
<div id="existingComments">
    <table>
        <thead>
            <tr>
                <th><?php echo $trans->translate('date_label'); ?></th>
                <th><?php echo $trans->translate('author_label'); ?></th>
                <th><?php echo $trans->translate('comment_label'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ( $comments as $comment ): ?>
            <tr>
                <td><?php echo $comment->getDate()->format('d-m-Y'); ?></td>
                <td><?php echo $comment->getAuthor(); ?></td>
                <td><?php echo $comment->getContents(); ?></td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>
<div id="newComment">
    <form action="addComment.php" method="post">
        <label for="author"><?php echo $trans->translate('author_label'); ?></label>
        <input type="text" id="author" name="author" placeholder="<?php echo $trans->translate('input_author'); ?>"/>
        <label for="comment"><?php echo $trans->translate('comment_label'); ?></label>
        <input type="text" id="comment" name="comment" placeholder="<?php echo $trans->translate('input_comment'); ?>"/>
        <input type="submit" value="<?php echo $trans->translate('submit'); ?>"/>
    </form>
</div>
</body>
</html>