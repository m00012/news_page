<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function view($page = 'home')
    {
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }
    
            $data['title'] = ucfirst($page); 
            $data['content'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'; 
            $data['home_img'] = '/assets/images/home.png';
    
            $this->load->view('templates/header', $data);
            $this->parser->parse('pages/' . $page, $data);
            $this->load->view('templates/footer', $data);
    }
}