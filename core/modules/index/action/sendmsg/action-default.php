<?php

if(!empty($_POST)){
	print_r($_POST);
	$convid= 0;
	if($_POST["ref"]=="new"){
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
	}else if($_POST["ref"]=="conversation"){
		$convid=$_POST["conversation_id"];
	}

	$msg = new MessageData();
	$msg->user_id = $_SESSION["user_id"];
	$msg->conversation_id = $convid;
	$msg->content = $_POST["content"];
	$msg->add();
}

if($_POST["ref"]=="new"){
	Core::redir("./?view=conversations");
}else if($_POST["ref"]=="conversation"){
	Core::redir("./?view=conversation&id=".$convid);
}


?>