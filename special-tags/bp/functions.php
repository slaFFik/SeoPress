<?php

/*
 * BuddyPress component functions
 */
function sp_get_bp_current_component(){
    global $bp;
    return $bp->current_component;
}

/*
 * BuddyPress group functions
 */
function sp_get_bp_group_name(){
    global $bp;
    if(!is_numeric($bp->groups->current_group->id))
        return false;
    $bp_group = new BP_Groups_Group( $bp->groups->current_group->id );
    return $bp_group->name;
}

function sp_get_bp_group_description(){
    global $bp;
    if(!is_numeric($bp->groups->current_group->id))
        return false;

    $bp_group = new BP_Groups_Group( $bp->groups->current_group->id );
    return $bp_group->description;
}


/*
 * BuddyPress user functions
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
 * BuddyPress activity functions
 */
function sp_get_bp_activity_content(){
    global $activities_template, $bp;

    bp_has_activities();

    foreach( $activities_template->activities AS $activity ){
        if( $activity->id == $bp->current_action )
            return $activity->content;
    }
}

function sp_get_bp_activity_author(){
    global $activities_template, $bp;

    bp_has_activities();

    foreach( $activities_template->activities AS $activity ){
        if( $activity->id == $bp->current_action )
            return $activity->display_name;
    }
}


/*
 * BuddyPress forum functions (not in groups)
 */
class SP_BP_FORUM_TOPIC{
    public function __construct(){
        bp_has_forum_topics();
    }

    private function get_forum_arr_pos(){
        global $bp, $forum_template;
        $topic_slug = $bp->action_variables[1];
        $topic_id   = bp_forums_get_topic_id_from_slug( $topic_slug );
        $forum_template->topic = bp_forums_get_topic_details( $topic_id );
        $array_pos  = false;

        if(empty($forum_template))
            return $array_pos;

        $i = 0;
        foreach($forum_template->topics as $topic){
            if( $topic_id == $forum_template->topics[$i]->topic_id ) {
                $array_pos = $i;
            }
            $i++;
        }

        return $array_pos;
    }

    private function get_first_post_id(){
        global $forum_template;

        $array_pos = $this->get_forum_arr_pos();
        if(is_numeric($array_pos))
            return $forum_template->topics[$array_pos]->topic_id;

        return false;
    }

    private function get_last_post_id(){
        global $forum_template;

        $array_pos = $this->get_forum_arr_pos();
        if(is_numeric($array_pos))
            return $forum_template->topics[$array_pos]->topic_last_post_id;

        return false;
    }

    public function get_title(){
        global $forum_template;

        $array_pos = $this->get_forum_arr_pos();
        if(is_numeric($array_pos))
            return $forum_template->topics[$array_pos]->topic_title;

        return false;
    }

    public function get_poster_name(){
        global $forum_template;

        $array_pos = $this->get_forum_arr_pos();
        if(is_numeric($array_pos))
            return $forum_template->topics[$array_pos]->topic_poster_name;

        return false;
    }

    public function get_last_poster_name(){
        global $forum_template;

        $array_pos = $this->get_forum_arr_pos();
        if(is_numeric($array_pos))
            return $forum_template->topics[$array_pos]->topic_last_poster_name;

        return false;
    }

    public function get_first_post_text(){
        global $bbdb, $forum_template;

        $post = $bbdb->get_row($bbdb->prepare(
                                "SELECT * FROM $bbdb->posts
                                WHERE post_id = %d",
                                $this->get_first_post_id() ) );

        if(!empty($post))
            return $post->post_text;

        return false;
    }

    public function get_last_post_text(){
        global $bbdb, $forum_template;
        $post = $bbdb->get_row( $bbdb->prepare( "SELECT * FROM $bbdb->posts WHERE post_id = %d", $this->get_last_post_id() ) );
        return $post->post_text;
    }

}
function sp_get_bp_forum_topic_title(){
    $topic = new SP_BP_FORUM_TOPIC();
    return $topic->get_title();
}
function sp_get_bp_forum_topic_poster_name(){
    $topic = new SP_BP_FORUM_TOPIC();
    return $topic->get_poster_name();
}
function sp_get_bp_forum_topic_last_poster_name(){
    $topic = new SP_BP_FORUM_TOPIC();
    return $topic->get_last_poster_name();
}
function sp_get_bp_forum_post_text(){
    $topic = new SP_BP_FORUM_TOPIC();
    return $topic->get_first_post_text();
}
function sp_get_bp_forum_last_post_text(){
    $topic = new SP_BP_FORUM_TOPIC();
    return $topic->get_last_post_text();
}

/*
 * BuddyPress universal functions
 */
function sp_get_bp_current_action(){
    global $bp;
    return $bp->current_action;
}

?>