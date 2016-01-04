<?php
/**
* @author evilnapsis
* @brief Descripcion
**/

if(Session::exists("user_id") && !empty($_POST)){
/*
$image = null;
$image_id = 0;
$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/users/$_SESSION[user_id]/images/";
            	$handle->Process($url);
 // $handle->file_dst_name;
            	$image=new ImageData();
            	$image->src=$handle->file_dst_name;
            	$image->level_id = $_POST["level_id"];
            	$image->user_id = $_SESSION["user_id"];
            	$image_id = $image->add();
    		}
*/
    $post_id = 0;
    if($_POST["content"]!=""){
	$post = new PostData();
	$post->content = $_POST["content"];
	$post->level_id = $_POST["level_id"];
	$post->author_ref_id = $_SESSION["user_id"];
	$post->receptor_type_id = 2;
	$post->receptor_ref_id = $_POST["receptor_ref_id"];
	$post_id= $post->add();
/*
	if($handle->uploaded){
		$pi = new PostImageData();
		$pi->post_id = $post_id[1];
		$pi->image_id = $image_id[1];
		$pi->add();
	}*/
	}
	Core::redir("./?view=home");
}
?>