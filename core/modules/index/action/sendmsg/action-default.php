<?php

if(!empty($_POST)){
	print_r($_POST);
	$convid= 0;
	$conv = ConversationData::getConversation($_SESSION["user_id"],$_POST["receptor_id"]);
	if($conv==null){
		$c = new ConversationData();
		$c->sender_id = $_SESSION["user_id"];
		$c->receptor_id = $_POST["receptor_id"];
		$cx=$c->add();
		$convid = $cx[1];
	}else{
		$convid = $conv->id;
	}

	$msg = new MessageData();
	$msg->user_id = $_SESSION["user_id"];
	$msg->conversation_id = $convid;
	$msg->content = $_POST["content"];
	$msg->add();
}

?>