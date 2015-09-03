<?php
$comments = CommentData::getAllByTR($_POST["t"],$_POST["r"]);
?>
<?php if(count($comments)>0):?>
<hr>
<div style="background:#f0f0f0;">
<ul class="media-list">
<?php foreach($comments as $comment):?>
  <li class="media">
    <div class="media-body" style="font-size:14px;">
      <p class="media-heading"><b><?php echo $comment->getUser()->getFullname(); ?></b></p>
      <p><?php echo $comment->content; ?></p>
      <hr style="margin:0;border-top: 1px #e5e5e5 solid;">
    </div>
  </li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
