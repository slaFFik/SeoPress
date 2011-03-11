<?php
/**
 * SeoPress
 *
 * @package SeoPress
 * @author Sven Lehnert
 * @copyright Copyright (C) Sven Lehnert
 **/

/*
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

### Update General Seo page to the option table.
function bp_seo_general_page(){
  global $current_user;
	
  $msg = false;
  if ( isset( $_POST['update_bp_seo'] ) ) {
    ### Directory Blogs
    $directory_blogs = Array($_POST['directory_blogs_title'],$_POST['directory_blogs'],$_POST['directory_blogs_tags'],$_POST['directory_blogs_noindex']);
    if($directory_blogs != get_option('bp_seo_directory_blogs')){
		update_option('bp_seo_directory_blogs', $directory_blogs);
		$msg = true;
    }
    ### Directory Activity
    $directory_activity = Array($_POST['directory_activity_title'],$_POST['directory_activity'],$_POST['directory_activity_tags'],$_POST['directory_activity_noindex']) ;
    if($directory_activity != get_option('bp_seo_directory_activity')){
		update_option('bp_seo_directory_activity', $directory_activity);
		$msg = true;
    }
    ### Directory Members
    $directory_members = Array($_POST['directory_members_title'],$_POST['directory_members'],$_POST['directory_members_tags'],$_POST['directory_members_noindex']) ;
    if($directory_members != get_option('bp_seo_directory_members')){
		update_option('bp_seo_directory_members', $directory_members);
		$msg = true;    
    }
    ### Directory Groups
    $directory_groups = Array($_POST['directory_groups_title'],$_POST['directory_groups'],$_POST['directory_groups_tags'],$_POST['directory_groups_noindex']) ;
    if($directory_groups != get_option('bp_seo_directory_groups')){
		update_option('bp_seo_directory_groups', $directory_groups);
		$msg = true;    
    }
    ### Directory Forums
    $directory_forums = Array($_POST['directory_forums_title'],$_POST['directory_forums'],$_POST['directory_forums_tags'],$_POST['directory_forums_noindex']) ;
    if($directory_forums != get_option('bp_seo_directory_forums')){
		update_option('bp_seo_directory_forums', $directory_forums);
		$msg = true;
    }
    ### Profile Home
    $profil = Array($_POST['profil_title'],$_POST['profil'],$_POST['profil_tags'],$_POST['profil_noindex']) ;
    if($profil != get_option('bp_seo_profil')){
		update_option('bp_seo_profil', $profil);
		$msg = true;
    }
    ### Profile Blogs
    $profil_blogs = Array($_POST['profil_blogs_title'],$_POST['profil_blogs'],$_POST['profil_blogs_tags'],$_POST['profil_blogs_noindex']) ;
    if($profil_blogs != get_option('bp_seo_profil_blogs')){
		update_option('bp_seo_profil_blogs', $profil_blogs);
		$msg = true;
    }
    ### Profile Blogs  recent_posts
    $profil_blogs_recent_posts = Array($_POST['profil_blogs_recent_posts_title'],$_POST['profil_blogs_recent_posts'],$_POST['profil_blogs_recent_posts_tags'],$_POST['profil_blogs_recent_posts_noindex']) ;
    if($profil_blogs_recent_posts != get_option('bp_seo_profil_blogs_recent_posts')){
		update_option('bp_seo_profil_blogs_recent_posts', $profil_blogs_recent_posts);
		$msg = true;
    }
    ### Profile Blogs recent_commments
    $profil_blogs_recent_commments = Array($_POST['profil_blogs_recent_commments_title'],$_POST['profil_blogs_recent_commments'],$_POST['profil_blogs_recent_commments_tags'],$_POST['profil_blogs_recent_commments_noindex']) ;
    if($profil_blogs_recent_commments != get_option('bp_seo_profil_blogs_recent_commments')){
		update_option('bp_seo_profil_blogs_recent_commments', $profil_blogs_recent_commments);
		$msg = true;
    }
    ### Profile friends
    $profil_friends = Array($_POST['profil_friends_title'],$_POST['profil_friends'],$_POST['profil_friends_tags'],$_POST['profil_friends_noindex']) ;
    if($profil_friends != get_option('bp_seo_profil_friends')){
		update_option('bp_seo_profil_friends', $profil_friends);
		$msg = true;
    }
    ### Profile Groups
    $profil_groups = Array($_POST['profil_groups_title'],$_POST['profil_groups'],$_POST['profil_groups_tags'],$_POST['profil_groups_noindex'] );
    if($profil_groups != get_option('bp_seo_profil_groups')){
		update_option('bp_seo_profil_groups', $profil_groups);
		$msg = true;
    }
    ### Profile Wire
    $profil_wire = Array($_POST['profil_wire_title'],$_POST['profil_wire'],$_POST['profil_wire_tags'],$_POST['profil_wire_noindex']) ;
    if($profil_wire != get_option('bp_seo_profil_wire')){
		update_option('bp_seo_profil_wire', $profil_wire);
		$msg = true;
    }
    ### Profile Activity
    $profil_activity = Array($_POST['profil_activity_title'],$_POST['profil_activity'],$_POST['profil_activity_tags'],$_POST['profil_activity_noindex']) ;
    if($profil_activity != get_option('bp_seo_profil_activity')){
		update_option('bp_seo_profil_activity', $profil_activity);
		$msg = true;
    }
    ### Profile Activity Friends 
    $profil_activity_friends = Array($_POST['profil_activity_friends_title'],$_POST['profil_activity_friends'],$_POST['profil_activity_friends_tags'],$_POST['profil_activity_friends_noindex']) ;
    if($profil_activity_friends != get_option('bp_seo_profil_activity_friends')){
		update_option('bp_seo_profil_activity_friends', $profil_activity_friends);
		$msg = true;
    }
    ### Groups Forum
    $groups_forum = Array($_POST['groups_forum_title'],$_POST['groups_forum'],$_POST['groups_forum_tags'],$_POST['groups_forum_noindex']) ;
    if($groups_forum != get_option('bp_seo_groups_forum')){
		update_option('bp_seo_groups_forum', $groups_forum);
		$msg = true;
    }
    ### Groups Forum Topic
    $groups_forum_topic = Array($_POST['groups_forum_topic_title'],$_POST['groups_forum_topic'],$_POST['groups_forum_topic_tags'],$_POST['groups_forum_topic_noindex']) ;
    if($groups_forum_topic != get_option('bp_seo_groups_forum_topic')){
		update_option('bp_seo_groups_forum_topic', $groups_forum_topic);
		$msg = true;
    }
    ### Groups Wire
    $groups_wire = Array($_POST['groups_wire_title'],$_POST['groups_wire'],$_POST['groups_wire_tags'],$_POST['groups_wire_noindex']) ;
    if($groups_wire != get_option('bp_seo_groups_wire')){
		update_option('bp_seo_groups_wire', $groups_wire);
		$msg = true;
    }
    ### Groups Members
    $groups_members = Array($_POST['groups_members_title'],$_POST['groups_members'],$_POST['groups_members_tags'],$_POST['groups_members_noindex']) ;
    if($groups_members != get_option('bp_seo_groups_members')){
		update_option('bp_seo_groups_members', $groups_members);
		$msg = true;
    }
    ### Groups Home
    $groups_home = Array($_POST['groups_home_title'],$_POST['groups_home'],$_POST['groups_home_tags'],$_POST['groups_home_noindex']) ;
    if($groups_home != get_option('bp_seo_groups_home')){
		update_option('bp_seo_groups_home', $groups_home);
		$msg = true;
    }
    ### MAIN BLOG START
    $main_blog_start = Array($_POST['main_blog_start_title'],$_POST['main_blog_start'],$_POST['main_blog_start_tags'],$_POST['main_blog_start_noindex']) ;
    if($main_blog_start != get_option('bp_seo_main_blog_start')){
		update_option('bp_seo_main_blog_start', $main_blog_start);
		$msg = true;
    }
    ### MAIN BLOG HOME
    $main_blog = Array($_POST['main_blog_title'],$_POST['main_blog'],$_POST['main_blog_tags'],$_POST['main_blog_noindex']) ;
    if($main_blog != get_option('bp_seo_main_blog')){
		update_option('bp_seo_main_blog', $main_blog);
		$msg = true;
    }
    ### MAIN BLOG ARCHIVE
    $main_blog_archiv = Array($_POST['main_blog_archiv_title'],$_POST['main_blog_archiv'],$_POST['main_blog_archiv_tags'],$_POST['main_blog_archiv_noindex']) ;
    if($main_blog_archiv != get_option('bp_seo_main_blog_archiv')){
		update_option('bp_seo_main_blog_archiv', $main_blog_archiv);
		$msg = true;
    }
    ### MAIN BLOG CATEGORIES
    $main_blog_cat = Array($_POST['main_blog_cat_title'],$_POST['main_blog_cat'],$_POST['main_blog_cat_tags'],$_POST['main_blog_cat_noindex']) ;
    if($main_blog_cat != get_option('bp_seo_main_blog_cat')){
		update_option('bp_seo_main_blog_cat', $main_blog_cat);
		$msg = true;
    }
    ### MAIN BLOG POSTS 
    $main_blog_posts = Array($_POST['main_blog_posts_title'],$_POST['main_blog_posts'],$_POST['main_blog_posts_tags'],$_POST['main_blog_posts_noindex']) ;
    if($main_blog_posts != get_option('bp_seo_main_blog_posts')){
		update_option('bp_seo_main_blog_posts', $main_blog_posts);
		$msg = true;
    }
    ### MAIN BLOG PAGES
    $main_blog_pages = Array($_POST['main_blog_pages_title'],$_POST['main_blog_pages'],$_POST['main_blog_pages_tags'],$_POST['main_blog_pages_noindex']) ;
    if($main_blog_pages != get_option('bp_seo_main_blog_pages')){
		update_option('bp_seo_main_blog_pages', $main_blog_pages);
		$msg = true;
    }
    ### MAIN BLOG AUTHOR PAGES
    $main_blog_autor_pages = Array($_POST['main_blog_autor_pages_title'],$_POST['main_blog_autor_pages'],$_POST['main_blog_autor_pages_tags'],$_POST['main_blog_autor_pages_noindex']) ;
    if($main_blog_autor_pages != get_option('bp_seo_main_blog_autor_pages')){
		update_option('bp_seo_main_blog_autor_pages', $main_blog_autor_pages);
		$msg = true;
    }
    ### MAIN BLOG SEARCH PAGES
    $main_blog_search_pages = Array($_POST['main_blog_search_pages_title'],$_POST['main_blog_search_pages'],$_POST['main_blog_search_pages_tags'],$_POST['main_blog_search_pages_noindex']) ;
    if($main_blog_search_pages != get_option('bp_seo_main_blog_search_pages')){
		update_option('bp_seo_main_blog_search_pages', $main_blog_search_pages);
		$msg = true;
    }
    ### MAIN BLOG 404 PAGES
    $main_blog_404_pages = Array($_POST['main_blog_404_pages_title'],$_POST['main_blog_404_pages'],$_POST['main_blog_404_pages_tags'],$_POST['main_blog_404_pages_noindex']) ;
    if($main_blog_404_pages != get_option('bp_seo_main_blog_404_pages')){
		update_option('bp_seo_main_blog_404_pages', $main_blog_404_pages);
		$msg = true;
    }
    ### MAIN BLOG TAG PAGES
    $main_blog_tag_pages = Array($_POST['main_blog_tag_pages_title'],$_POST['main_blog_tag_pages'],$_POST['main_blog_tag_pages_tags'],$_POST['main_blog_tag_pages_noindex']) ;
    if($main_blog_tag_pages != get_option('bp_seo_main_blog_tag_pages')){
		update_option('bp_seo_main_blog_tag_pages', $main_blog_tag_pages);
		$msg = true;
    }
    ### MAIN BLOG REGISTER PAGES
    $main_blog_reg_pages = Array($_POST['main_blog_reg_pages_title'],$_POST['main_blog_reg_pages'],$_POST['main_blog_reg_pages_tags'],$_POST['main_blog_reg_pages_noindex']) ;
    if($main_blog_reg_pages != get_option('bp_seo_main_blog_reg_pages')){
		update_option('bp_seo_main_blog_reg_pages', $main_blog_reg_pages);
		$msg = true;
    }
    ### USER BLOG HOME
    $user_blog = Array($_POST['user_blog_title'],$_POST['user_blog'],$_POST['user_blog_tags'],$_POST['user_blog_noindex']);
    if($user_blog != get_option('bp_seo_user_blog')){
		update_option('bp_seo_user_blog', $user_blog);
		$msg = true;
    }
    ### USER BLOG ARCHIVE
    $user_blog_archiv = Array($_POST['user_blog_archiv_title'],$_POST['user_blog_archiv'],$_POST['user_blog_archiv_tags'],$_POST['user_blog_archiv_noindex']) ;
    if($user_blog_archiv != get_option('bp_seo_user_blog_archiv')){
		update_option('bp_seo_user_blog_archiv', $user_blog_archiv);
		$msg = true;
    }
    ### USER BLOG CATEGORIES
    $user_blog_cat = Array($_POST['user_blog_cat_title'],$_POST['user_blog_cat'],$_POST['user_blog_cat_tags'],$_POST['user_blog_cat_noindex']) ;
    if($user_blog_cat != get_option('bp_seo_user_blog_cat')){
		update_option('bp_seo_user_blog_cat', $user_blog_cat);
		$msg = true;
    }
    ### USER BLOG POSTS 
    $user_blog_posts = Array($_POST['user_blog_posts_title'],$_POST['user_blog_posts'],$_POST['user_blog_posts_tags'],$_POST['user_blog_posts_noindex']) ;
    if($user_blog_posts != get_option('bp_seo_user_blog_posts')){
		update_option('bp_seo_user_blog_posts', $user_blog_posts);
		$msg = true;
    }
    ### USER BLOG PAGES
    $user_blog_pages = Array($_POST['user_blog_pages_title'],$_POST['user_blog_pages'],$_POST['user_blog_pages_tags'],$_POST['user_blog_pages_noindex']) ;
    if($user_blog_pages != get_option('bp_seo_user_blog_pages')){
		update_option('bp_seo_user_blog_pages', $user_blog_pages);
		$msg = true;
    }
    ### USER BLOG AUTHOR PAGES
    $user_blog_autor_pages = Array($_POST['user_blog_autor_pages_title'],$_POST['user_blog_autor_pages'],$_POST['user_blog_autor_pages_tags'],$_POST['user_blog_autor_pages_noindex']) ;
    if($user_blog_autor_pages != get_option('bp_seo_user_blog_autor_pages')){
		update_option('bp_seo_user_blog_autor_pages', $user_blog_autor_pages);
		$msg = true;
    }
    ### USER BLOG SEARCH PAGES
    $user_blog_search_pages = Array($_POST['user_blog_search_pages_title'],$_POST['user_blog_search_pages'],$_POST['user_blog_search_pages_tags'],$_POST['user_blog_search_pages_noindex']) ;
    if($user_blog_search_pages != get_option('bp_seo_user_blog_search_pages')){
		update_option('bp_seo_user_blog_search_pages', $user_blog_search_pages);
		$msg = true;
    }
    ### USER BLOG 404 PAGES
    $user_blog_404_pages = Array($_POST['user_blog_404_pages_title'],$_POST['user_blog_404_pages'],$_POST['user_blog_404_pages_tags'],$_POST['user_blog_404_pages_noindex']) ;
    if($user_blog_404_pages != get_option('bp_seo_user_blog_404_pages')){
		update_option('bp_seo_user_blog_404_pages', $user_blog_404_pages);
		$msg = true;
    }
    ### USER BLOG TAG PAGES
    $user_blog_tag_pages = Array($_POST['user_blog_tag_pages_title'],$_POST['user_blog_tag_pages'],$_POST['user_blog_tag_pages_tags'],$_POST['user_blog_tag_pages_noindex']);
    if($user_blog_tag_pages != get_option('bp_seo_user_blog_tag_pages')){
		update_option('bp_seo_user_blog_tag_pages', $user_blog_tag_pages);
		$msg = true;
    }   

  }
  if($msg == true){
  	echo '<div class="updated"><p>General Seo options saved succsessfully.</p></div>';     
  }
  bp_seo_general();
} 
 
### update plugins configuration and Seo pages to the option table.
function bp_seo_plugins_page(){

  ### update Buddypress components and plugins configuration page
  if ( isset( $_POST['update_bp_seo_plugins_setup'] ) ) {
  	$plugin_counter = $_POST['plugin_counter'];
  	$bp_seo_plugins = array(); 
  	    
    foreach($plugin_counter as $plugin){
    $bp_seo_plugins[$_POST['plugin_name_'.$plugin]] = array ( 'slug' => $_POST['plugin_slug_'.$plugin],
                                                              'directory'   => $_POST['plugin_directory_'.$plugin],
                                                              'plugin_extends'    =>  $_POST['plugin_extends_'.$plugin],
                                                              'plugin_use' => $_POST['plugin_use_'.$plugin]); 
    }
         
    if($bp_seo_plugins != get_option('$bp_seo_plugins')){
      update_option('bp_seo_plugins', $bp_seo_plugins);
      echo '<div class="updated"><p>Buddypress Components and Plugin Setup Options saved.</p></div>'; 
    } 
  }

  ### update Buddypress components and plugins Seo pages
  if ( isset( $_POST['update_bp_seo_plugins_meta'] ) ) {
    $main_comp_slugs = $_POST['main_comp_slug'];
    $sub_comp_slugs = $_POST['sub_comp_slug'];
    $i = 0;
    foreach($sub_comp_slugs as $sub_slug){
      
      $bp_seo_tmp = array();
      $bp_seo_extends_tmp = array();
      $bp_seo_use_tmp = array();
      
      $title = $main_comp_slugs[$i].'_'.$sub_slug.'_title';
      if(isset($_POST[$title])){
        $bp_seo_tmp[0] = $_POST[$title];
      }
      $desc = $main_comp_slugs[$i].'_'.$sub_slug.'_desc';
      if(isset($_POST[$desc])){
        $bp_seo_tmp[1] .= $_POST[$desc];      
      }     
      $tag = $main_comp_slugs[$i].'_'.$sub_slug.'_tags';
      if(isset($_POST[$tag])){
        $bp_seo_tmp[2] .= $_POST[$tag];
      }
      $noindex = $main_comp_slugs[$i].'_'.$sub_slug.'_noindex';
       if(isset($_POST[$noindex])){
       $bp_seo_tmp[3] .= $_POST[$noindex];
      }
      update_option('bp_seo_'.$main_comp_slugs[$i].'_'.$sub_slug, $bp_seo_tmp);
      
      $title_extends = $main_comp_slugs[$i].'_'.$sub_slug.'_title_extends';
      if(isset($_POST[$title_extends])){
        $bp_seo_extends_tmp[0] .= $_POST[$title_extends];
      }
      $desc_extends = $main_comp_slugs[$i].'_'.$sub_slug.'_desc_extends';
      if(isset($_POST[$desc_extends])){
        $bp_seo_extends_tmp[1] .= $_POST[$desc_extends];  
      }     
      $tag_extends = $main_comp_slugs[$i].'_'.$sub_slug.'_tags_extends';
      if(isset($_POST[$tag_extends])){
        $bp_seo_extends_tmp[2] .= $_POST[$tag_extends];
      }
      $noindex_extends = $main_comp_slugs[$i].'_'.$sub_slug.'_noindex_extends';
      if(isset($_POST[$noindex_extends])){
        $bp_seo_extends_tmp[3] .= $_POST[$noindex_extends];
      }
      update_option('bp_seo_'.$main_comp_slugs[$i].'_'.$sub_slug.'_extends', $bp_seo_extends_tmp);
      
      $title_use = $main_comp_slugs[$i].'_'.$sub_slug.'_title_use';
      if(isset($_POST[$title_use])){
        $bp_seo_use_tmp[0] .= $_POST[$title_use];
      }
      $desc_use = $main_comp_slugs[$i].'_'.$sub_slug.'_desc_use';
      if(isset($_POST[$desc_use])){
        $bp_seo_use_tmp[1] .= $_POST[$desc_use];   
      }     
      $tag_use = $main_comp_slugs[$i].'_'.$sub_slug.'_tags_use';
      if(isset($_POST[$tag_use])){
        $bp_seo_use_tmp[2] .= $_POST[$tag_use];
      }
      $noindex_use = $main_comp_slugs[$i].'_'.$sub_slug.'_noindex_use';
      if(isset($_POST[$noindex_use])){
        $bp_seo_use_tmp[3] .= $_POST[$noindex_use];
      }
      update_option('bp_seo_'.$main_comp_slugs[$i].'_'.$sub_slug.'_use', $bp_seo_use_tmp);
      $i++;
    }
          echo '<div class="updated"><p>Meta changes saved.</p></div>';     
  }
  bp_seo_plugins();
}
 
  /**
   * meta data entry template
   *
   * @param Array $lable (Title, title name, description name, tags name, component slug, sub component slug)
   * @param Array $meta (value for title, value for description, value for tags)	 
   * @return template
   */

function bp_seo_entry($lable,$meta){
  $meta[0] = stripslashes(htmlentities($meta[0]));
  $meta[1] = stripslashes(htmlentities($meta[1]));
  $meta[2] = stripslashes(htmlentities($meta[2]));
  
  $metatitle_length = 150;
  $metadesc_length = 170;
  if(get_option('bp_seo_metadesc_length')){
    $metadesc_length = get_option('bp_seo_metadesc_length');
  }
  if(get_option('bp_seo_metatitle_length')){
    $metatitle_length = get_option('bp_seo_metatitle_length');
  }

  if(function_exists('text_counter')){
    $tmp .= text_counter($lable[1], $metatitle_length);
    $tmp .= text_counter($lable[2], $metadesc_length);
  } else {
    $tmp = "For functionality of the textcounter, you need the Pro Version, <a href='admin.php?page=seomenue#cap_pro'>Get the Pro Version now!</a> ";
  }

  $tmp  .= '<div class="sfb-entry">';
  $tmp  .= '	<div class="sfb-entry-title">'.ucwords(strtolower($lable[0])).'</div>';
  $tmp .= '		<div class="sfb-entry-left">';
  $tmp .= '			<div class="sfb-item-noindex"><label for="prefix">NoIndex: </label></div>';
  $tmp .= '	 	  <div class="sfb-item-title"><label for="prefix">Title: </label></div>';
  $tmp .= '		  	<div class="sfb-item-desc"><label for="prefix">Description: </label></div>';
  $tmp .= '		  	<div class="sfb-item-tag"><label for="prefix">Keywords/Tags: </label></div>';
  $tmp .= '		</div>';
  $tmp .= '		<div class="sfb-entry-right">';
  $tmp .= '			<INPUT TYPE="hidden" NAME="main_comp_slug[]"  VALUE="'.$lable[4].'">'; 
  $tmp .= '			<INPUT TYPE="hidden" NAME="sub_comp_slug[]"  VALUE="'.$lable[5].'">';
  if($meta[3]==true){$checked="checked";} 
  $tmp .= '			<input name="'.$lable[6].'" type="checkbox" '.$checked.' value="1"/> (Block searchengines from indexing this page)<br>';
  $tmp  .= '<div class="seo_barbox" id="barbox'.$lable[1].'"><div class="seo_bar" id="bar'.$lable[1].'"></div></div><div class="seo_count" id="count'.$lable[1].'">'.$metatitle_length.'</div>';
  $tmp .= '			<input name="'.$lable[1].'" type="text" style="width: 70%;" id="'.$lable[1].'" value="'.$meta[0].'"/><br>';
  $tmp  .= '<div class="seo_barbox" id="barbox'.$lable[2].'"><div class="seo_bar" id="bar'.$lable[2].'"></div></div><div class="seo_count" id="count'.$lable[2].'">'.$metadesc_length.'</div>';
  $tmp .= '	  		<textarea name="'.$lable[2].'" type="text" id="'.$lable[2].'"  rows="5" style="width: 70%;"/>'.$meta[1].'</textarea><br>';
  $tmp .= '		   <input name="'.$lable[3].'" type="text" style="width: 70%;" id="'.$lable[3].'" value="'.$meta[2].'"/>';
  $tmp .= '		</div>';
  $tmp .= '	</div>';
  $tmp .= '<div class="spacer"></div>	';
  return $tmp;
} 


### SeoPress Settings and Delete.
function bp_seo_settings_page(){

  ### Set Keyword Generator on.
  if(isset($_POST['bp_seo_keywords_submit'])){
  	update_option('bp_seo_keywords',$_POST['bp_seo_keywords']); 
	if(isset($_POST['bp_seo_keywords_quantity'])){
	  update_option('bp_seo_keywords_quantity',$_POST['bp_seo_keywords_quantity']); 	
	}
	echo '<div class="updated"><p>Keyword generator options saved succsessfully.</p></div>';     
  }

  ### Hide meta box in “Add New Page/Edit” screen .
  if(isset($_POST['bp_seo_meta_box_submit'])){
    update_option('bp_seo_meta_box_page',$_POST['bp_seo_meta_box_page']);  		  
    update_option('bp_seo_meta_box_post',$_POST['bp_seo_meta_box_post']);  		
    echo '<div class="updated"><p>Hide meta box options saved succsessfully.</p></div>';       
  }

  ### Set meta title and description length.
  if(isset($_POST['bp-meta-length'])){
    update_option('bp_seo_metatitle_length',$_POST['bp_seo_metatitle_length']);  		  
    update_option('bp_seo_metadesc_length',$_POST['bp_seo_metadesc_length']);  
    echo '<div class="updated"><p>Title and description length options saved succsessfully.</p></div>';     		  
  }
  
  ### Delete SeoPress.
  if(isset($_POST['bp-seo-remove'])){
    global $wpdb;
    $options = $wpdb->get_results("SELECT * FROM wp_".SITE_ID_CURRENT_SITE."_options ORDER BY option_name");
      foreach((array) $options as $option) :
	  $disabled = '';
	  $option->option_name = esc_attr($option->option_name);
	  if(substr($option->option_name, 0, 6)=='bp_seo') {
	    delete_option($option->option_name);     
	  }
	  if(substr($option->option_name, 0, 9)=='rr_bp_seo') {
	    delete_option($option->option_name);     
	  }
      endforeach;
  ?> <div class="updated"><p>All SeoPress fields in the option table have been deleted successfully.</p></div> <?php
  }
}

function get_seopress_postmeta(){
  global $post, $meta;
  $title=get_post_meta($post->ID,"_title");
  $found=false;

  // If is there is no data, getting data from wpseo
  if($title[0]==""){
    $title=get_post_meta($post->ID,"_wpseo_edit_title");
    $found=true;
  }
  // If is there is no data, getting data from all in one seopack
  if($title[0]==""){
    $title=get_post_meta($post->ID,"_aioseop_title");
    $found=true;
  }
  if($title[0]!=""){
    $meta[0] = $title[0];
  }
  
  $description=get_post_meta($post->ID,"_description");
  // If is there is no data, getting data from wpseo
  if($description[0]==""){
    $description=get_post_meta($post->ID,"_wpseo_edit_description");
  }
  // If is there is no data, getting data from all in one seopack
  if($description[0]==""){
    $description=get_post_meta($post->ID,"_aioseop_description");
  }
  if($description[0]!=""){
    $meta[1] = $description[0];
  }
  
  $keywords=get_post_meta($post->ID,"_keywords");
  // If is there is no data, getting data from wpseo
  if($keywords[0]==""){
    $keywords=get_post_meta($post->ID,"_wpseo_edit_keywords");
  }
  // If is there is no data, getting data from all in one seopack
  if($keywords[0]==""){
    $keywords=get_post_meta($post->ID,"_aioseop_keywords");
  }
  if($keywords[0]!=""){
    $meta[2] = $keywords[0];
  }
  
  $noindex=get_post_meta($post->ID,"_noindex");
  if($noindex[0] !=""){
  	$meta[3] = $noindex[0];
  }
  return $meta; 
}
  
function post_seo4all_title($id){
  if (isset($_POST['seo4all_title']) === true) {
    update_post_meta($id,"_title",$_POST["seo4all_title"]);
  }
}
function post_seo4all_description($id){
  if (isset($_POST['seo4all_description']) === true) {
    update_post_meta($id,"_description",$_POST["seo4all_description"]);
  }
}
function post_seo4all_keywords($id){
  if (isset($_POST['seo4all_keywords']) === true) {
    update_post_meta($id,"_keywords",$_POST["seo4all_keywords"]);
  }
}
function post_seo4all_noindex($id){
  if ($_POST['seo4all_noindex'] == "1") {
    update_post_meta($id,"_noindex",1);
  }else{
    update_post_meta($id,"_noindex",0);
  }
}
if(!function_exists('get_blog_option')){
  function get_blog_option( $blog_id, $option_name, $default = false ) {
    return get_option( $option_name, $default );
  }
}

if(!function_exists('add_blog_option')){
  function add_blog_option( $blog_id, $option_name, $option_value ) {
    return add_option( $option_name, $option_value );
  }
}
if(!function_exists('update_blog_option')){
  function update_blog_option( $blog_id, $option_name, $option_value ) {
    return update_option( $option_name, $option_value );
  }
}
?>