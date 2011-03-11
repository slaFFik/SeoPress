<?php
/*
Based on HeadSpace from: John Godley - http://urbangiraffe.com/
Modified for BuddyPress and WPMU by: Sven Lehnert - http://sven-lehnert.de/
============================================================================================================
This software is provided "as is" and any express or implied warranties, including, but not limited to, the
implied warranties of merchantibility and fitness for a particular purpose are disclaimed. In no event shall
the copyright owner or contributors be liable for any direct, indirect, incidental, special, exemplary, or
consequential damages (including, but not limited to, procurement of substitute goods or services; loss of
use, data, or profits; or business interruption) however caused and on any theory of liability, whether in
contract, strict liability, or tort (including negligence or otherwise) arising in any way out of the use of
this software, even if advised of the possibility of such damage.

For full license details see license.txt
============================================================================================================ */

class SFB_Special_Tags
{
	function replace($value, $post) {
		if ( is_array( $value ) || is_object( $value ) )
			return $value;

    global $wp_query, $wp_locale, $bp, $forum_template, $array_pos;
	$current_component = $bp->active_components[$bp->current_component];
	if (!isset($current_component)){
	$current_component = $bp->current_component;
	}
    $current = 'current_'.substr($current_component,0,-1); 
    $replace_with = '';
		
		// We can only replace inline post tags when given a post
		if (is_object ($post)) {
			$userData = get_userdata ($post->post_author);

			$tags = '';
			if (function_exists ('the_tags')) {
				if (is_tag ())
					$tags = single_tag_title (false, '');
				else
				{
					$items = get_the_tags ($post->ID);
					if ($items) {
						foreach ($items AS $tag)
							$tags[] = $tag->name;
						
						$tags = implode (', ', $tags);
					}
				}
			}

			if (is_day ())
				$date = get_the_time('F jS, Y');
			else if (is_month ())
				$date = get_the_time('F, Y');
			else if (is_year ())
				$date = get_the_time('Y');
			else
				$date = $post->post_date;
			
			$replace_with = array
			(
				$date,
			  $post->post_title,
			  $post->post_modified,
			  $post->ID,
			  $userData->display_name,
			  $post->post_author,
				$tags,
				$_SERVER['REQUEST_URI']
			);		
		}
		else if (is_author ()) {
			global $posts;
			$userData = get_userdata ($posts[0]->post_author);
			$replace_with = array ('', '', '', '', $userData->display_name, $posts[0]->post_author);
		}
		else if (is_archive ()) {
			$m        = get_query_var ('m');
			$year     = get_query_var ('year');
			$monthnum = get_query_var('monthnum');
			$day      = get_query_var('day');
			$date     = '';

			// If there's a month
			if (!empty ($m)) {
				$my_year  = substr($m, 0, 4);
				$my_month = $wp_locale->get_month(substr($m, 4, 2));
				$my_day   = intval(substr($m, 6, 2));
				$date     = "$my_year" . ($my_month ? "$sep $my_month" : "") . ($my_day ? "$sep $my_day" : "");
			}
		
			if (!empty ($year)) {
				if ( !empty($monthnum) )
					$date .= " $sep " . $wp_locale->get_month($monthnum);
				if ( !empty($day) )
					$date .= " $sep " . zeroise($day, 2);
					
				$date .= ' '.$year;
			}
			
			$replace_with = array
			(
				$date,
				'',
				'',
				'',
				'',
				'',
				'',
				$_SERVER['REQUEST_URI']
			);
		}
		else if (function_exists ('is_tag') && is_tag ())
			$replace_with = array ('', '', '', '', '', '', single_tag_title('', false));

		$search_for = array
		(
			"%%date%%",
			"%%title%%",
			"%%modified%%",
			"%%id%%",
			"%%name%%",
			"%%userid%%",
			'%%tag%%',
			'%%url%%'
		);
		
		// Replace post values
		$value = str_replace ($search_for, $replace_with, $value);

		// Replace static values
		$value = str_replace ('%%searchphrase%%', isset ($wp_query->query_vars['s']) ? strip_tags ($wp_query->query_vars['s']) : '', $value);
		$value = str_replace ('%%currentdate%%', date (get_option ('date_format')), $value);
		$value = str_replace ('%%currenttime%%', date (get_option ('time_format')), $value);
		$value = str_replace ('%%currentyear%%', date ('Y'), $value);

		$value = str_replace ('%%sitename%%', get_bloginfo ('blogname'), $value);
	
		if (is_object ($wp_locale))
			$value = str_replace ('%%currentmonth%%', $wp_locale->get_month(date ('n')), $value);
		else
			$value = str_replace ('%%currentmonth%%', date ('F'), $value);
		
		// These need extra work so we only do it if necessary
		if (strpos ($value, '%%excerpt%%') !== false)
			$value = str_replace ('%%excerpt%%', SFB_Special_Tags::get_excerpt ($post, true), $value);
		if (strpos ($value, '%%excerpt_only%%') !== false)
			$value = str_replace ('%%excerpt_only%%', SFB_Special_Tags::get_excerpt ($post, false), $value);
		if (strpos ($value, '%%category%%') !== false)
			$value = str_replace ('%%category%%', SFB_Special_Tags::get_category ($post), $value);
		if (strpos ($value, '%%category_description%%') !== false)
			$value = str_replace ('%%category_description%%', SFB_Special_Tags::get_category_description ($post), $value);
		if (strpos ($value, '%%tag_description%%') !== false)
			$value = str_replace ('%%tag_description%%', SFB_Special_Tags::get_tag_description ($post), $value);
                if (strpos ($value, '%%term_description%%') !== false)
                        $value = str_replace ('%%term_description%%', SFB_Special_Tags::get_term_description (), $value);
                if (strpos ($value, '%%term_title%%') !== false)
                        $value = str_replace ('%%term_title%%', SFB_Special_Tags::get_term_title (), $value);
		if (strpos ($value, '%%page%%') !== false)
			$value = str_replace ('%%page%%', SFB_Special_Tags::get_page ($post), $value);
		if (strpos ($value, '%%pagenumber%%') !== false)
			$value = str_replace ('%%pagenumber%%', SFB_Special_Tags::get_page ($post, 'number'), $value);
		if (strpos ($value, '%%pagetotal%%') !== false)
			$value = str_replace ('%%pagetotal%%', SFB_Special_Tags::get_page ($post, 'total'), $value);
		if (strpos ($value, '%%caption%%') !== false)
			$value = str_replace ('%%caption%%', $post->post_excerpt, $value);

		if (strpos ($value, '%%postdate%%') !== false)
			$value = str_replace ('%%postdate%%',get_the_date(), $value);
		if (strpos ($value, '%%postdate_month_year%%') !== false)
			$value = str_replace ('%%postdate_month_year%%',get_the_date('F Y'), $value);
		if (strpos ($value, '%%archivedate%%') !== false)
			$value = str_replace ('%%archivedate%%',SFB_Special_Tags::get_archivedate(), $value);

		// Buddypress
		if (strpos ($value, '%%componentname%%') !== false)
		  if(isset($current_component)){
			 $value = str_replace ('%%componentname%%', $bp->$current_component->$current->name, $value);
			} else {
       $value = str_replace ('%%componentname%%', '', $value);
			}
		if (strpos ($value, '%%componentid%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%componentid%%', $bp->$current_component->$current->id, $value);
			} else {
       $value = str_replace ('%%componentid%%', '', $value);
			}
		if (strpos ($value, '%%componentdescription%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%componentdescription%%', $bp->$current_component->$current->description, $value);
			} else {
       $value = str_replace ('%%componentdescription%%', '', $value);
			}
	 if (strpos ($value, '%%componentstatus%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%componentstatus%%', $bp->$current_component->$current->status, $value);
			} else {
       $value = str_replace ('%%componentstatus%%', '', $value);
			}
		if (strpos ($value, '%%componentdatecreated%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%componentdatecreated%%', $bp->$current_component->$current->date_created, $value);
			} else {
       $value = str_replace ('%%componentdatecreated%%', '', $value);
			}
		if (strpos ($value, '%%componentadmins%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%componentadmins%%', $bp->$current_component->$current->admins[0]->user_nicename, $value);
			} else {
       $value = str_replace ('%%componentadmins%%', '', $value);
			}
		if (strpos ($value, '%%componenttotalmembercount%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%componenttotalmembercount%%', $bp->$current_component->$current->total_member_count, $value);
			} else {
       $value = str_replace ('%%componenttotalmembercount%%', '', $value);
			}
		if (strpos ($value, '%%componentlastactivity%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%componentlastactivity%%', $bp->$current_component->$current->last_activity, $value);
			} else {
       $value = str_replace ('%%componentlastactivity%%', '', $value);
			}


		if (strpos ($value, '%%userid%%') !== false)
		  if(isset($current_component)){
  	 		$value = str_replace ('%%userid%%', $bp->displayed_user->id, $value);
			} else {
       $value = str_replace ('%%userid%%', '', $value);
			}
	 	if (strpos ($value, '%%usernicename%%') !== false)
	    if(isset($current_component)){
  			$value = str_replace ('%%usernicename%%', $bp->displayed_user->userdata->user_nicename, $value);
			} else {
       $value = str_replace ('%%usernicename%%', '', $value);
			}
		if (strpos ($value, '%%userregistered%%') !== false)
	    if(isset($current_component)){
  			$value = str_replace ('%%userregistered%%', $bp->displayed_user->userdata->user_registered, $value);
			} else {
       $value = str_replace ('%%userregistered%%', '', $value);
			}
  	if (strpos ($value, '%%displayname%%') !== false)
      if(isset($current_component)){
  	 		$value = str_replace ('%%displayname%%', $bp->displayed_user->userdata->display_name, $value);
			} else {
       $value = str_replace ('%%displayname%%', '', $value);
			}
	  if (strpos ($value, '%%fullname%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%fullname%%', $bp->displayed_user->fullname  , $value);
			} else {
       $value = str_replace ('%%fullname%%', '', $value);
			}
			
			
  	if (strpos ($value, '%%currentcomponent%%') !== false)
      if(isset($current_component)){
  	 		$value = str_replace ('%%currentcomponent%%', $bp->current_component, $value);
			} else {
       $value = str_replace ('%%currentcomponent%%', '', $value);
			}
	  if (strpos ($value, '%%currentaction%%') !== false)
		  if(isset($current_component)){
  			$value = str_replace ('%%currentaction%%', $bp->current_action, $value);
			} else {
       $value = str_replace ('%%currentaction%%', '', $value);
			}

		if(isset($bp->forums) && $current_component == 'forums' || $bp->current_action == "forum"){
      if(!isset($forum_template)){
       if (isset($bp->action_variables[1])){   
          $forum_topic_id = bp_forums_get_topic_id_from_slug($bp->action_variables[1]);
          $forum_template = new BP_Forums_Template_Forum( 'newest',groups_get_groupmeta( $bp->groups->current_group->id, 'forum_id' ), false, -1,  -1, -1, 'all', false );
          for ( $i=0; $i<=count($forum_template->topics); $i++ ){
            if ($forum_topic_id == $forum_template->topics[$i]->topic_id) { 
              $array_pos = $i;      
            }
          }
        } else {
          $forum_template = new BP_Forums_Template_Forum( 'newest', groups_get_groupmeta( $bp->$current_component->$current->id, 'forum_id' ), false, 1, 1, 1, 'all', false );
          $array_pos = 0;
        }
      }

	 	if (strpos ($value, '%%forumtopictitle%%') !== false) 
	    if(isset($current_component)){
        $value = str_replace ('%%forumtopictitle%%', stripslashes( $forum_template->topics[$array_pos]->topic_title )  , $value);
			} else {
        $value = str_replace ('%%forumtopictitle%%', '', $value);
			}
	 	if (strpos ($value, '%%forumtopicpostername%%') !== false) 
	    if(isset($current_component)){
	      $value = str_replace ('%%forumtopicpostername%%', stripslashes( $forum_template->topics[$array_pos]->topic_poster_name )  , $value);
			} else {
        $value = str_replace ('%%forumtopicpostername%%', '', $value);
			}
	 	if (strpos ($value, '%%forumtopiclastpostername%%') !== false) 
	    if(isset($current_component)){
	      $value = str_replace ('%%forumtopiclastpostername%%', stripslashes( $forum_template->topics[$array_pos]->topic_last_poster_name )  , $value);
			} else {
        $value = str_replace ('%%forumtopiclastpostername%%', '', $value);
			}
	 	if (strpos ($value, '%%forumtopicstarttime%%') !== false) 
	    if(isset($current_component)){
	     $value = str_replace ('%%forumtopicstarttime%%', stripslashes( $forum_template->topics[$array_pos]->topic_start_time )  , $value);
			} else {
       $value = str_replace ('%%forumtopicstarttime%%', '', $value);
			}
	 	if (strpos ($value, '%%forumtopictime%%') !== false) 
	    if(isset($current_component)){
	     $value = str_replace ('%%forumtopictime%%', stripslashes( $forum_template->topics[$array_pos]->topic_time )  , $value);
			} else {
       $value = str_replace ('%%forumtopictime%%', '', $value);
			}
		if (strpos ($value, '%%forumtopictext%%') !== false)
	    if(isset($current_component)){
      global $bbdb;
      $post = $bbdb->get_row( $bbdb->prepare( "SELECT post_text FROM $bbdb->posts WHERE post_id = %d", $forum_template->topics[$array_pos]->topic_last_post_id  ) );
      $value = str_replace ('%%forumtopictext%%', $post->post_text, $value);
			} else {
        $value = str_replace ('%%forumlastopictext%%', '', $value);
			}    
     }   
     return $value;
	}
	
	/**
	 * Return the Archive Date
	 *
	 * @return string
	 **/
	
	function get_archivedate() {
		if (is_day()) {
			return	get_the_date() ;
		}
		if (is_month()) {
			return	get_the_date('F Y') ;
		}
		if (is_year()) {
			return	get_the_date('Y') ;
		}
	}
	
	/**
	 * Return the current category description
	 *
	 * @return string
	 **/
	
	function get_category_description($post) {
		$desc = category_description ();
		if (is_object ($desc))
			return '';
		
		return strip_tags ($desc);
	}
	
	/**
	 * Return the current category description
	 *
	 * @return string
	 **/

	function get_tag_description($post) {
		if (function_exists ('the_tags')) {
			if (is_tag ()) {
				$tag = intval( get_query_var('tag_id') );
				return strip_tags( get_term_field('description', $tag, 'post_tag') );
			} else {
				$items = get_the_tags ($post->ID);
				if ($items) {
					$tags = '';
					foreach ($items AS $tag)
						$tags[] = get_term_field('description', $tag, 'post_tag');

					return strip_tags( implode (', ', $tags) );
				}
			}
		}
		return '';
	}

       /**
        * Return the current taxonomy term description
        *
        * @return string
        **/

       function get_term_description() {

               $taxonomy = get_query_var('taxonomy');
               $term = get_query_var('term');

               if (function_exists ('get_term') && $taxonomy != '' && $term != '') {

                       $term = get_term_by('slug', $term, $taxonomy);

                       if ( is_wp_error($term) )
                               return '';

                       return($term->description);
               }
               return '';
       }
       
        /**
        * Return the current taxonomy term title        *
        * @return string
        **/

       function get_term_title() {

               $taxonomy = get_query_var('taxonomy');
               $term = get_query_var('term');

               if (function_exists ('get_term') && $taxonomy != '' && $term != '') {

                       $term = get_term_by('slug', $term, $taxonomy);

                       if ( is_wp_error($term) )
                               return '';

                       return($term->name);
               }
               return '';
       }


	
	/**
	 * Return the current categories
	 *
	 * @return string
	 **/
	
	function get_category($post) {
		// Get data from the post
		if (is_single ()) {
			$cats = get_the_category ($post->ID);
			if (count ($cats) > 0) {
			  foreach ($cats AS $cat)
					$category[] = $cat->cat_name;
			
			  $category = implode (', ', $category);
			}
		
			return $category;
		}
		else if (is_archive ())
			return single_cat_title ('', false);
		return '';
	}
	
	
	/**
	 * Return the current post excerpt
	 *
	 * @return string
	 **/
	
	function get_excerpt($post, $auto = true) {
		$excerpt = '';
		if ($post->post_excerpt != '')
			$excerpt = trim (str_replace ('[...]', '', $post->post_excerpt));
		else if ($auto) {
			$excerpt = $post->post_content;
			if ($excerpt == '') {
				$excerpt = apply_filters ('the_content', $post->post_content);
			}
			
			$excerpt_length = apply_filters( 'excerpt_length', 1000 );	
			$excerpt = substr( strip_shortcodes( $excerpt ), 0, $excerpt_length );
		}

		$excerpt = strip_tags ($excerpt);
		return $excerpt;
	}
	
	
	/**
	 * Return the page position
	 *
	 * @return string
	 **/
	
	function get_page($post, $type = 'all') {
		global $wp_query;
		
		if ($wp_query->max_num_pages > 1) {
			$paged = get_query_var ('paged');
			$max   = $wp_query->max_num_pages;
			
			if ($paged == 0)
				$paged = 1;
				
			if ($paged == 1)
				return '';
				
			if ($type == 'all')
				return sprintf ( __( 'page %d of %d', 'bp_seo' ), $paged, $max );
			else if ($type == 'number')
				return $paged;
			else if ($type == 'total')
				return $max;
		}
	}
}?>