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

if ( ! function_exists('generatevorschau'))
{
	function generatevorschau($foldername)
	{
		$CI =& get_instance(); //create the ci instance           
    	$CI->load->model('edition_details_publish');
    	$CI->load->model('vorschau_model_publish');
        $data['edn_details_vor'] = $CI->edition_details_publish->getDetails(); //calls a getdetails function inside model edition details
        foreach ($data['edn_details_vor'] as $key => $valueid) {
            # code...
            $valid=$valueid->id;
        }
        //end getting the active edition id
        //define a nav var for vorschau
        	global $vor_imagenav;
        	global $vor_navigation_title;
        	global $vor_introtext_mobile;
        	global $vor_introtext_mobile;
        	global $vor_imagenav_mobile;        
        $data['vorschau']=$CI->vorschau_model_publish->getlistdatas($valid);
        foreach ($data['vorschau'] as $key => $vor) {
            $bck_image1=$vor->bck_brw;
            $bck_image2=$vor->bck_ipad;
            $bck_image3=$vor->bck_tablet;
            //css for browser
            $css_image1=".stimmungsvoll{background-image:url(../../tm-admin/images/vorschau/$bck_image1);background-repeat:no-repeat;}";
            file_put_contents("tm-content/dynamic/pc.css", $css_image1);
            //css for ipad
            $css_image2=".stimmungsvoll{background-image:url(../../tm-admin/images/vorschau/$bck_image2);background-repeat:no-repeat;}";
            file_put_contents("tm-content/dynamic/ipad.css", $css_image2);
            //css for tablet
            $css_image3=".stimmungsvoll{background-image:url(../../tm-admin/images/vorschau/$bck_image3);background-repeat:no-repeat;}";
            file_put_contents("tm-content/dynamic/tablet.css", $css_image3);

            $image1='tm-admin/images/vorschau/'.$vor->right1;
            $image2='tm-admin/images/vorschau/'.$vor->right2;
            $image3='tm-admin/images/vorschau/'.$vor->right3;
            $image4='tm-admin/images/vorschau/'.$vor->bottom1;
            $image5='tm-admin/images/vorschau/'.$vor->bottom2;
            $image6='tm-admin/images/vorschau/'.$vor->bottom3;
            $image7='tm-admin/images/vorschau/'.$vor->bottom4;
            if($vor->navigation_image!=''){
                @$vor_imagenav=$vor->navigation_image;
            }
            else{
                $vor_imagenav="";
            }
           if($vor->navigation_image_mobile!=''){
                @$vor_imagenav_mobile=$vor->navigation_image_mobile;
            }
            else{
                $vor_imagenav_mobile="";
            }
            $righttitle=$vor->right_title;
            $image1_title=$vor->image1_title;
            $image1_description=$vor->image1_description;
            $image2_title=$vor->image2_title;
            $image2_description=$vor->image2_description;
            $image3_title=$vor->image3_title;
            $image3_description=$vor->image3_description;

            $bottom_image1_zumlink=$vor->bottom_image1_zumlink;
            $bottom_image2_zumlink=$vor->bottom_image2_zumlink;
            $bottom_image3_zumlink=$vor->bottom_image3_zumlink;
            $bottom_image4_zumlink=$vor->bottom_image4_zumlink;

            $bottom_image1_heading=$vor->bottom_image1_heading;
            $bottom_image2_heading=$vor->bottom_image2_heading;
            $bottom_image3_heading=$vor->bottom_image3_heading;
            $bottom_image4_heading=$vor->bottom_image4_heading;

            $bottom_image1_interpret=$vor->bottom_image1_interpret;
            $bottom_image2_interpret=$vor->bottom_image2_interpret;
            $bottom_image3_interpret=$vor->bottom_image3_interpret;
            $bottom_image4_interpret=$vor->bottom_image4_interpret;

            $footer_text=$vor->footer_text;
            $vor_navigation_title=$vor->navigation_title;
            $vor_introtext_mobile=$vor->introtext_mobile;

            $data_to_find=file_get_contents('template_vorschau.php');
            $data_splited=array(
                                    '{Image1}',
                                    '{Title1}',
                                    '{name1}',
                                    '{url1}',
                                    '{Image2}',
                                    '{Title2}',
                                    '{name2}',
                                    '{url2}',
                                    '{Image3}',
                                    '{Title3}',
                                    '{name3}',
                                    '{url3}',
                                    '{Image4}',
                                    '{Title4}',
                                    '{name4}',
                                    '{url4}',
                                    '{footer_text}',
                                    '{right title}',
                                    '{image1rt}',
                                    '{title1rt}',
                                    '{Description1rt}',
                                    '{image2rt}',
                                    '{title2rt}',
                                    '{Description2rt}',
                                    '{image3rt}',
                                    '{title3rt}',
                                    '{Description3rt}'

                                );
            $data_extended=array(
                                    $image4,                                    
                                    $bottom_image1_heading,
                                    $bottom_image1_interpret,
                                    $bottom_image1_zumlink,
                                    $image5,
                                    $bottom_image2_heading,
                                    $bottom_image2_interpret,
                                    $bottom_image2_zumlink,
                                    $image6,
                                    $bottom_image3_heading,
                                    $bottom_image3_interpret,
                                    $bottom_image3_zumlink,
                                    $image7,
                                    $bottom_image4_heading,
                                    $bottom_image4_interpret,
                                    $bottom_image4_zumlink,
                                    $footer_text,
                                    $righttitle,
                                    $image1,
                                    $image1_title,
                                    $image1_description,
                                    $image2,
                                    $image2_title,
                                    $image2_description,
                                    $image3,
                                    $image3_title,
                                    $image3_description
                                );
    
            
            $finalcontent_vorschau=str_replace($data_splited, $data_extended, $data_to_find);
            file_put_contents($foldername."/tm-content/chapters/vorschau.html",$finalcontent_vorschau);
            //for mobile
            $data_to_find_mob=file_get_contents('../templatemobile/tmpvorschau.php');
            $data_splited_mob=array('{bck_image}',
                                    '{Image1}',
                                    '{Title1}',
                                    '{name1}',
                                    '{url1}',
                                    '{Image2}',
                                    '{Title2}',
                                    '{name2}',
                                    '{url2}',
                                    '{Image3}',
                                    '{Title3}',
                                    '{name3}',
                                    '{url3}',
                                    '{Image4}',
                                    '{Title4}',
                                    '{name4}',
                                    '{url4}',
                                    '{footer_text}',
                                    '{right title}',
                                    '{image1rt}',
                                    '{title1rt}',
                                    '{Description1rt}',
                                    '{image2rt}',
                                    '{title2rt}',
                                    '{Description2rt}',
                                    '{image3rt}',
                                    '{title3rt}',
                                    '{Description3rt}'

                                );
            $data_extended_mob=array($bck_image1,
                                    $image4,                                    
                                    $bottom_image1_heading,
                                    $bottom_image1_interpret,
                                    $bottom_image1_zumlink,
                                    $image5,
                                    $bottom_image2_heading,
                                    $bottom_image2_interpret,
                                    $bottom_image2_zumlink,
                                    $image6,
                                    $bottom_image3_heading,
                                    $bottom_image3_interpret,
                                    $bottom_image3_zumlink,
                                    $image7,
                                    $bottom_image4_heading,
                                    $bottom_image4_interpret,
                                    $bottom_image4_zumlink,
                                    $footer_text,
                                    $righttitle,
                                    $image1,
                                    $image1_title,
                                    $image1_description,
                                    $image2,
                                    $image2_title,
                                    $image2_description,
                                    $image3,
                                    $image3_title,
                                    $image3_description
                                );
    
            
            $finalcontent_vorschau_mob=str_replace($data_splited_mob, $data_extended_mob, $data_to_find_mob);
            $headmob=file_get_contents("../mobile/detail_view_header.php");
            $footmob=file_get_contents("../mobile/footer_vorschau.php");
            file_put_contents($foldername."/mobile/vorschau.php",$headmob);
            file_put_contents($foldername."/mobile/vorschau.php",$finalcontent_vorschau_mob,FILE_APPEND);
            file_put_contents($foldername."/mobile/vorschau.php",$footmob,FILE_APPEND);
            //end mobile

        }
	}
}

// --------------------------------------------------------------------
/* End of file vorschaugen_helper.php */
/* Location: ./application/helpers/vorschaugen_helper.php */