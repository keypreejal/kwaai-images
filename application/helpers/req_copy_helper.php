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

if ( ! function_exists('req_copys'))
{
	function req_copys($base_path,$foldername)
	{
		global $tm_admin_dir;
        global $tm_admin_images;
        global $tm_admin_bgmusic;
        global $tm_admin_bgmusic_story;
        global $tm_admin_images_browser;
        global $tm_admin_images_ipad;
        global $tm_admin_images_navigation;
        global $tm_admin_images_product;
        global $tm_admin_images_templates;
        global $tm_admin_video;
        global $tm_admin_images_templates_images;
        global $tm_admin_images_templates_pdf;
        global $tm_admin_images_templates_video;
        global $tm_admin_images_pagethumb;
        global $tm_contet_dir;
        global $tm_content_chapter;
        global $tm_content_dynamic;
        global $tm_content_images;
        // Set the config file options
		$CI =& get_instance();
		//check whether the directory exists or not
        if(!is_dir($foldername)){
            mkdir($foldername,0777,true);//create a directory
        }
        //copy some folders to htmlsite folder

        //start copying tmincludes folder to the created folder
            $orgi_tmincludes=$base_path.'tm-includes';
            $magazine_tmincludes=$foldername.'/tm-includes';
            copy_directory($orgi_tmincludes, $magazine_tmincludes);
        //ends copying tm-includes folder to the created folder
        

        //create a directory in created folder name tm-content
        $tm_contet_dir = $foldername.'/tm-content';
        $tm_content_chapter = $foldername.'/tm-content/chapters';
        $tm_content_dynamic = $foldername.'/tm-content/dynamic';
        $tm_content_images = $foldername.'/tm-content/images/';

       

        mkdir($tm_contet_dir);//create a directory name tm-content inside this
        mkdir($tm_content_chapter);//create a directory name chapters inside tm-content
        mkdir($tm_content_dynamic);//create a directory name dynamic inside tm-content
        mkdir($tm_content_images);//create a directory name dynamic inside tm-content
        copy($base_path.'tm-admin/img/zum-shop.png',$tm_content_images.'zum-shop.png');
        //ends creating a directory tm-content

        //start copying tmincludes folder to the created folder
          $orgi_tmcontentimages=$base_path.'tm-content/images';
          $magazine_tmcontentimages=$foldername.'/tm-content/images';
          copy_directory($orgi_tmcontentimages, $magazine_tmcontentimages);
        //ends copying tm-includes folder to the created folder

        //create a directory name tm-admin inside the created folder
        $tm_admin_dir=$foldername.'/tm-admin';
        mkdir($tm_admin_dir);//create a directory name tm-admin inside htmlsite
        $tm_admin_images=$foldername.'/tm-admin/images';
        mkdir($tm_admin_images);//create a folder name images inside tm-admin
        $tm_admin_bgmusic=$foldername.'/tm-admin/bgmusic';
        mkdir($tm_admin_bgmusic);//create a folder name images inside tm-admin
        $tm_admin_bgmusic_story=$foldername.'/tm-admin/bgmusic/story';
        mkdir($tm_admin_bgmusic_story);//create a folder name images inside tm-admin
        $tm_admin_images_browser=$foldername.'/tm-admin/images/browser';
        mkdir($tm_admin_images_browser);
        $tm_admin_images_ipad=$foldername.'/tm-admin/images/ipad';
        mkdir($tm_admin_images_ipad);
        $tm_admin_images_navigation=$foldername.'/tm-admin/images/navigation';
        mkdir($tm_admin_images_navigation);
        $tm_admin_images_product=$foldername.'/tm-admin/images/product';
        mkdir($tm_admin_images_product);
        $tm_admin_images_templates=$foldername.'/tm-admin/images/templates';
        mkdir($tm_admin_images_templates);
        $tm_admin_video=$foldername.'/tm-admin/video';
        mkdir($tm_admin_video);
        $tm_admin_images_templates_images=$foldername.'/tm-admin/images/templates/images';
        mkdir($tm_admin_images_templates_images);
        $tm_admin_images_templates_pdf=$foldername.'/tm-admin/images/templates/pdf';
        mkdir($tm_admin_images_templates_pdf);
        $tm_admin_images_templates_video=$foldername.'/tm-admin/images/templates/video';
        mkdir($tm_admin_images_templates_video);
        $tm_admin_images_pagethumb=$foldername.'/tm-admin/images/pagethumb';
        mkdir($tm_admin_images_pagethumb);
        


        //ends creating a directory name tm-admin in created folder
        
        //start copying phplib folder to the created folder
            $orgi_phplib=$base_path.'phplib';
            $magazine_phplib=$foldername.'/phplib';
            copy_directory($orgi_phplib, $magazine_phplib);
        //ends copying phplib folder to the created folder

            //start copying phplib folder to the created folder
            $orgi_mobile=$base_path.'static-mobile';
            $magazine_mobile=$foldername.'/mobile';
            copy_directory($orgi_mobile, $magazine_mobile);
        //ends copying phplib folder to the created folder

        //start copying mobile folder to the created folder
            $orgi_mobile=$base_path.'mobile';
            $magazine_mobile=$foldername.'/mobile';
            copy_directory($orgi_mobile, $magazine_mobile);
        //ends copying mobile folder to the created folder
            //start copying mobile folder to the created folder
            $orgi_mobiles=$base_path.'tm-admin/asset/image';
            $magazine_mobiles=$foldername.'/tm-admin/asset/image/';
            copy_directory($orgi_mobiles, $magazine_mobiles);
        //ends copying mobile folder to the created folder

          //start copying mobile folder to the created folder
          $orgi_vorschau=$base_path.'tm-admin/images/vorschau';
          $magazine_vorschau=$foldername.'/tm-admin/images/vorschau';
          copy_directory($orgi_vorschau, $magazine_vorschau);
        //ends copying mobile folder to the created folder

            //start copying mobile folder to the created folder
           $orgi_mobile_img=$base_path.'tm-admin/img';
            $magazine_mobile_img=$foldername.'/tm-admin/img';
            copy_directory($orgi_mobile_img, $magazine_mobile_img);
        //ends copying mobile folder to the created folder
       
        //start copy some files in the root folder

            copy($base_path.'static_index.php',$foldername.'/index.php');//copy index.php file
            copy($base_path.'IE8.css',$foldername.'/IE8.css');//copy IE8.css
            copy($base_path.'PIE.htc',$foldername.'/PIE.htc');//copy PIE.htc
		
	}
}

// --------------------------------------------------------------------




/* End of file cookie_helper.php */
/* Location: ./application/helpers/cookie_helper.php */