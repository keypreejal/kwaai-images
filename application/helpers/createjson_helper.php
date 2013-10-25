<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

if ( ! function_exists('createjson'))
{
	function createjson($tm_admin_images_navigation,$tm_admin_video,$tm_admin_images_product,$tm_admin_images_browser,$tm_admin_images_ipad,$tm_admin_bgmusic_story,$base_path,$foldername)
	{
		global $editiondata;
        global $edition_data_for_json;
        global $productdata;
        global $chapterdata;
        global $chapter_data_for_json;
        global $product_data_for_json;
        global $extras_data_for_json;
        global $edn_nav_image;
		// Set the config file options
		$CI =& get_instance();
		$data['prd_details'] = $CI->product_details_publish->getDetailsproduct();  //calls a getdetails function in product_details model 

        $data['ext_details'] = $CI->product_details_publish->getDetailsextras(); 
        $data['chp_details'] = $CI->chapter_details_publish->getDetails(); //calls a getdetails function inside chapter_details model
        
        $data['edn_details'] = $CI->edition_details_publish->getDetails(); //calls a getdetails function inside model edition details
        /**
            * creates an array name productdata and chapterdata and chapter_data_for json and product_data_for json
         */
        $editiondata = array();
        $edition_data_for_json = array();
        $productdata = array();
        $chapterdata = array();
        $chapter_data_for_json = array();
        $product_data_for_json = array();
        $extras_data_for_json=array();

        //gets the edition details and necessary information to write the json
        foreach ($data['edn_details'] as $eddet) {
            $edn_id = $eddet->id;
            $edn_title = $eddet->edition_title;
            $edn_nav_image = @$eddet->edition_nav_image;
            $edn_ipad_intro_vid = $eddet->ipad_intro_video;
            $edn_tablet_intro_vid = $eddet->tablet_intro_video;
            $edn_browser_intro_vid = $eddet->browser_intro_video;
            $edn_browser_intro_vid_ogg = $eddet->browser_intro_video_ogg;
            $edn_created_date = $eddet->created_date;
            $edn_edited_date = $eddet->edited_date;
            $editiondata[] = array(
                "edition_id" => $edn_id,
                "edition_title" => $edn_title,
                "ipad_intro_video" => $edn_ipad_intro_vid,
                "tablet_intro_video" => $edn_tablet_intro_vid,
                "browser_intro_video" => $edn_browser_intro_vid,
                "browser_intro_video_ogg" => $edn_browser_intro_vid_ogg,
                "created_date" => $edn_created_date,
                "edited_date" => $edn_edited_date
            );
            copy($base_path."tm-admin/images/navigation/$edn_nav_image","$tm_admin_images_navigation/$edn_nav_image");//copy the edition nav image to new folder
 //start copying the edition video to the newly created folder

        copy($base_path."tm-admin/video/$edn_browser_intro_vid","$tm_admin_video/$edn_browser_intro_vid");//copy the intro video mp4 to new folder
        copy($base_path."tm-admin/video/$edn_browser_intro_vid_ogg","$tm_admin_video/$edn_browser_intro_vid_ogg");//copy the intro video ogg to new folder
        copy($base_path."tm-admin/video/$edn_ipad_intro_vid","$tm_admin_video/$edn_ipad_intro_vid");//copy ipad intro video
        copy($base_path."tm-admin/video/$edn_tablet_intro_vid","$tm_admin_video/$edn_tablet_intro_vid");//copy the intro video tablet

        //ends copying the video to the folder
        }

        //creates an array name editiondata for a json and assign to a edition_data_for_json        
        $edition_data_for_json = $editiondata; //assigns an array to variable
        //gets the product details and necessary information to write the json file
        if (is_array($data['prd_details'])) {
            foreach ($data['prd_details'] as $prddet) {
                $prd_id = $prddet->id;
                $prd_title = $prddet->product_title;
                $prd_image = $prddet->product_image;
                @copy($base_path."tm-admin/images/product/$prd_image","$tm_admin_images_product/$prd_image");//copy the product image to the created folder
                $prd_description = $prddet->product_description;
                $prd_link1_text = $prddet->link1_text;
                $prd_link1_url = $prddet->link1_url;
                $prd_link1_link = $prddet->link1_link;
                $prd_link2_link = $prddet->link2_link;
                $prd_link3_link = $prddet->link3_link;
                $prd_link2_text = $prddet->link2_text;
                $prd_link2_url = $prddet->link2_url;
                $prd_link3_text = $prddet->link3_text;
                $prd_link3_url = $prddet->link3_url;
                $productdata[] = array(
                    "id" => $prd_id,
                    "product_title" => $prd_title,
                    "product_image" => $prd_image,
                    "product_description" => $prd_description,
                    "product_link1_text" => $prd_link1_text,
                    "product_link1_url" => $prd_link1_url,
                    "product_link1_link" => $prd_link1_link,
                    "product_link2_text" => $prd_link2_text,
                    "product_link2_url" => $prd_link2_url,
                    "product_link2_link" => $prd_link2_link,
                    "product_link3_text" => $prd_link3_text,
                    "product_link3_url" => $prd_link3_url,
                    "product_link3_link" => $prd_link3_link
                );
            }
        }
        $product_data_for_json = $productdata;
        if (is_array($data['ext_details'])) {
            foreach ($data['ext_details'] as $prddet) {
                $prd_id = $prddet->id;
                $prd_title = $prddet->product_title;
                $prd_image = $prddet->product_image;
                @copy($base_path."tm-admin/images/product/$prd_image","$tm_admin_images_product/$prd_image");//copy the product image to the created folder
                $prd_description = $prddet->product_description;
                $prd_link1_text = $prddet->link1_text;
                $prd_link1_url = $prddet->link1_url;
                $prd_link1_link = $prddet->link1_link;
                $prd_link2_link = $prddet->link2_link;
                $prd_link3_link = $prddet->link3_link;
                $prd_link2_text = $prddet->link2_text;
                $prd_link2_url = $prddet->link2_url;
                $prd_link3_text = $prddet->link3_text;
                $prd_link3_url = $prddet->link3_url;
                $extrasdata[] = array(
                    "id" => $prd_id,
                    "product_title" => $prd_title,
                    "product_image" => $prd_image,
                    "product_description" => $prd_description,
                    "product_link1_text" => $prd_link1_text,
                    "product_link1_url" => $prd_link1_url,
                    "product_link1_link" => $prd_link1_link,
                    "product_link2_text" => $prd_link2_text,
                    "product_link2_url" => $prd_link2_url,
                    "product_link2_link" => $prd_link2_link,
                    "product_link3_text" => $prd_link3_text,
                    "product_link3_url" => $prd_link3_url,
                    "product_link3_link" => $prd_link3_link
                );
            }
        }
        //creates an array name extrasdata for a json and assign to a product_data_for_json
        if(!empty($extrasdata)){
             $extras_data_for_json = $extrasdata;
        }        
         //assigns an array to variable


        /**
            * get the necessary details for the chapter and add to an array to write a json 
         */
        if (is_array($data['chp_details'])) {
            foreach ($data['chp_details'] as $chpdet) {
                $chp_id = $chpdet->id;
                $chp_title = $chpdet->chapter_title;
                $chp_title_color = $chpdet->chapter_title_color;
                $chp_background_image_brw = $chpdet->chapter_image_browser;
                $chp_background_image_ipad = $chpdet->chapter_image_ipad;
                //start copying the background image of the chapter for ipad and tablet

                copy($base_path."tm-admin/images/browser/$chp_background_image_brw","$tm_admin_images_browser/$chp_background_image_brw");//copy the chapter bck image of browser
                 copy($base_path."tm-admin/images/ipad/$chp_background_image_ipad","$tm_admin_images_ipad/$chp_background_image_ipad");
                 //copy the background image for the ipad

                //start copying the chapter image 
                $data['story_name'] = $CI->chapter_details_publish->getStory($chp_id);
                if (is_array($data['story_name'])) {
                    foreach ($data['story_name'] as $strname) {
                        //gets the data and set to the variables
                        $story_id = $strname->id;
                        $story_edition_id = $strname->edition_id;
                        $story_chapter_id = $strname->chapter_id;
                        $story_story_order = $strname->story_order;
                        $story_navigation_title = $strname->navigation_title;
                        $introtext_mobile = @$strname->introtext_mobile;
                        $navigation_image_mobile = @$strname->navigation_image_mobile;
                        $story_story_title = $strname->story_title;
                        $story_status = $strname->status;
                        $story_navigation_image = $strname->navigation_image;
                        $story_background_music_mp4 = $strname->background_music_mp4;
                        $story_background_music_ogg = $strname->background_music_ogg;
                        $story_created_date = $strname->created_date;
                        $story_edited_date = $strname->edited_date;
                        $data_fr_arr = str_replace(' ', '_', $story_story_title);
                        $og_thumb=$strname->og_thumb;
                        $str_facebook_link=$strname->facebook_link;
                        //start copy the navigation image for mobile and browser
                        copy($base_path."tm-admin/images/navigation/$navigation_image_mobile","$tm_admin_images_navigation/$navigation_image_mobile");
                        //copy the navigation image mobile
                        copy($base_path."tm-admin/images/navigation/$story_navigation_image","$tm_admin_images_navigation/$story_navigation_image");
                        if($story_background_music_mp4!=''){
                            copy($base_path."tm-admin/bgmusic/story/$story_background_music_mp4","$tm_admin_bgmusic_story/$story_background_music_mp4");
                        }
                        if($story_background_music_ogg!=''){
                             copy($base_path."tm-admin/bgmusic/story/$story_background_music_ogg","$tm_admin_bgmusic_story/$story_background_music_ogg");
                 
                        }

                        $data['page_det'] = $CI->chapter_details_publish->getPages($story_id);
                        if (is_array($data['page_det'])) {
                            foreach ($data['page_det'] as $key => $pagename) {
                                $page_id = $pagename->id;
                                $page_chapter_id = $pagename->chapter_id;
                                $page_story_id = $pagename->story_id;
                                $page_order = $pagename->page_order;
                                $page_status = $pagename->status;
                                $page_template = $pagename->template;
                                $page_created_date = $pagename->created_date;
                                $page_edited_date = $pagename->edited_date;
                                $id = $data_fr_arr . '_' . 'pg' . ($key + 1);

                                 $data['template_details'] = $CI->chapter_details_publish->templateinfo($page_template, $page_id); //get the template details with the template name for the page

                                $data['tbl_quiz'] = $CI->chapter_details_publish->quizinfo($page_id); //get the data from tbl_quiz for the respective page

                                $data['tbl_layer1'] = $CI->chapter_details_publish->layer1info($page_id); //get the layer1 info for the respective page

                                $data['tbl_layer2'] = $CI->chapter_details_publish->layer2info($page_id); //get the layer2 info for the respective page

                                $data['tbl_layer3'] = $CI->chapter_details_publish->layer3info($page_id); //get the layer3 info for the respective page

                                $data['tbl_popup'] = $CI->chapter_details_publish->popupinfo($page_id); //get the popup info for the respective page

                                $data['tbl_play_button'] = $CI->chapter_details_publish->playbuttoninfo($page_id); //get the play button info for the respective page

                                $data['tbl_slideshow_button'] = $CI->chapter_details_publish->slideshowbuttoninfo($page_id); //get the slideshow button info for the respective page

                                $data['tbl_productbox_button'] = $CI->chapter_details_publish->productboxbuttoninfo($page_id); //get the productbox info for the respective page

                                $json_array_page[] = array(
                                    "id" => $id,
                                    "page_id" => $page_id,
                                    "page_chapter_id" => $page_chapter_id,
                                    "page_story_id" => $page_story_id,
                                    "page_order" => $page_order,
                                    "page_status" => $page_status,
                                    "page_template" => $page_template,
                                    "page_created_date" => $page_created_date,
                                    "page_edited_date" => $page_edited_date,
                                    "page_template_details" => $data['template_details'],
                                    "page_quiz_details" => $data['tbl_quiz'],
                                    "page_layer1_details" => $data['tbl_layer1'],
                                    "page_layer2_details" => $data['tbl_layer2'],
                                    "page_layer3_details" => $data['tbl_layer3'],
                                    "page_popup_details" => $data['tbl_popup'],
                                    "page_playe_button_details" => $data['tbl_play_button'],
                                    "page_slideshow_button_details" => $data['tbl_slideshow_button'],
                                    "page_productbox_button_details" => $data['tbl_productbox_button']
                                );
                            }
                        }
                        $json_array_story[] = array(
                            "story_id" => $story_id,
                            "story_edition_id" => $story_edition_id,
                            "story_chapter_id" => $story_chapter_id,
                            "story_order" => $story_story_order,
                            "story_navigation_title" => $story_navigation_title,
                            "story_story_title" => $story_story_title,
                            "introtext_mobile" => $introtext_mobile,
                            "story_status" => $story_status,
                            "og_thumb"=>$og_thumb,
                            "facebook_link"=>$str_facebook_link,
                            "story_navigation_image" => $story_navigation_image,
                            "story_navigation_image_mobile" => $navigation_image_mobile,
                            "story_background_music_mp4" => $story_background_music_mp4,
                            "story_background_music_ogg" => $story_background_music_ogg,
                            "story_created_date" => $story_created_date,
                            "story_edited_date" => $story_edited_date,
                            "pages" => @$json_array_page
                        );
                    }
                    unset($json_array_page); //unset the array for the next loop
                }

                $chapterdata[] = array(
                    'id' => $chp_id,
                    'chapter_title' => $chp_title,
                    'chapter_title_color' => $chp_title_color,
                    'background_image' => array(
                        'img_browser' => $chp_background_image_brw,
                        'img_ipad' => $chp_background_image_ipad,
                    ),
                    'stories' => @$json_array_story
                );
                unset($json_array_story); //unset the story array and get the new array
                
                
               
            }
        }     
		
	}
}

// --------------------------------------------------------------------




/* End of file cookie_helper.php */
/* Location: ./application/helpers/cookie_helper.php */