<?php

class Formate{
    function dateFormate($date){
        return date("H:i l M d Y ",  strtotime($date));
    }
    function postShorten($post,$limit=50){
        $post=$post."";
        $post=  substr($post, 0,$limit);
        $post=  substr($post, 0,  strrpos($post, " "));
        $post=$post."........";
        return $post;
    }
}

?>

