<?php
$comments = CommentData::getAllByTR($_POST["t"],$_POST["r"]);
?>
<?php if(count($comments)>0):?>
<hr>
<ul class="media-list">
<?php foreach($comments as $comment):?>
  <li class="media">
    <div class="media-body">
      <p class="media-heading"><b><?php echo $comment->getUser()->getFullname(); ?></b></p>
      <p><?php echo $comment->content; ?></p>
    </div>
  </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
