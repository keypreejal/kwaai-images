<?php 
Class Sitemap extends CI_Controller {

    function index()
    {
        $this->load->model('front/front_model');
        $data['product_code'] = $this->front_model->get_datas('tblproducts','ProductCode');
        $data['seo'] = array( '',
        			         'category',
                             'about-us.html',
                             'sell-pictures.html',
                             'privacy-policy.html',
                             'license-information.html',
                             'terms-of-use.html',
                             'faqs.html',
                             'contact',
        			     );
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
    }
}

?>