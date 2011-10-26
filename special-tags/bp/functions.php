<?php

/*
* Buddypress component functions
*/
function sp_get_bp_current_component(){
	global $bp;
	return $bp->current_component;
}

/*
* Buddypress group functions
*/
function sp_get_bp_group_name(){
	global $bp;
	$bp_group = new BP_Groups_Group( $bp->groups->current_group->id );
	return $bp_group->name;
}

function sp_get_bp_group_description(){
	global $bp;
	$bp_group = new BP_Groups_Group( $bp->groups->current_group->id );
	return $bp_group->description;
}


/*
* Buddypress user functions
*/
function sp_get_bp_user_nicename(){
	global $bp;
	return $bp->displayed_user->userdata->user_nicename;
}
function sp_get_bp_user_registered(){
	global $bp;
	return $bp->displayed_user->userdata->user_registered;
}
function sp_get_bp_user_display_name(){
	global $bp;
	return $bp->displayed_user->userdata->display_name;
}
function sp_get_bp_user_fullname(){
	global $bp;
	return $bp->displayed_user->fullname;
}
/*
* Buddypress activity functions
*/
function sp_get_bp_activity_content(){
	global $activities_template, $bp;
	
	bp_has_activities();
	
	foreach( $activities_template->activities AS $activity ){
		if( $activity->id == $bp->current_action ) return $activity->content;
	}
}

function sp_get_bp_activity_author(){
	global $activities_template, $bp;
	
	bp_has_activities();
	// echo "AT: ";
	// print_r_html( $activities_template );
	
	foreach( $activities_template->activities AS $activity ){
		if( $activity->id == $bp->current_action ) return $activity->display_name;
	}
}


/*
* Buddypress forum functions
*/
class sp_bp_forum_topic{
	public function __construct(){
		bp_has_forum_topics();
	}
	
	private function get_forum_arr_pos(){
		
		global $bp, $forum_template;	
		
		$topic_slug = $bp->action_variables[1];
		$topic_id = bp_forums_get_topic_id_from_slug( $topic_slug );
		
		for( $i=0; $i <= count( $forum_template->topics ) ; $i++ ){
			if( $topic_id == $forum_template->topics[$i]->topic_id ) { 
				$array_pos = $i;      
			}
		}
		
		return $array_pos;		
	}
	
	private function get_first_post_id(){
		global $forum_template;	
		return $forum_template->topics[$this->get_forum_arr_pos()]->topic_id;
	}
	
	private function get_last_post_id(){
		global $forum_template;	
		return $forum_template->topics[$this->get_forum_arr_pos()]->topic_last_post_id;
	}
	
	public function get_title(){
		global $forum_template;	
		return $forum_template->topics[$this->get_forum_arr_pos()]->topic_title;		
	}
	
	public function get_poster_name(){
		global $forum_template;	
		return $forum_template->topics[$this->get_forum_arr_pos()]->topic_poster_name;		
	}
	
	public function get_last_poster_name(){
		global $forum_template;	
		return $forum_template->topics[$this->get_forum_arr_pos()]->topic_last_poster_name;		
	}
	
	public function get_first_post_text(){
		global $bbdb, $forum_template;	
		$post = $bbdb->get_row( $bbdb->prepare( "SELECT * FROM $bbdb->posts WHERE post_id = %d", $this->get_first_post_id() ) );			
		return $post->post_text;
	}
	
	public function get_last_post_text(){
		global $bbdb, $forum_template;	
		$post = $bbdb->get_row( $bbdb->prepare( "SELECT * FROM $bbdb->posts WHERE post_id = %d", $this->get_last_post_id() ) );			
		return $post->post_text;		
	}
	
}
function sp_get_bp_forum_topic_title(){
	$topic = new sp_bp_forum_topic();
	return $topic->get_title();
}
function sp_get_bp_forum_topic_poster_name(){
	$topic = new sp_bp_forum_topic();
	return $topic->get_poster_name();
}
function sp_get_bp_forum_topic_last_poster_name(){
	$topic = new sp_bp_forum_topic();
	return $topic->get_last_poster_name();
}
function sp_get_bp_forum_post_text(){
	$topic = new sp_bp_forum_topic();
	return $topic->get_first_post_text();
}
function sp_get_bp_forum_last_post_text(){
	$topic = new sp_bp_forum_topic();
	return $topic->get_last_post_text();
}

/*
* Buddypress universal functions
*/
function sp_get_bp_current_action(){
	global $bp;
	return $bp->current_action;
}

?>