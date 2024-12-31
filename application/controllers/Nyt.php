<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nyt extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('nyt_model');
    }

    // For all articles from API
    public function index()
    {
        $data['news'] = $this->nyt_model->get_news();
        $data['title'] = 'New York Times Top Stories';

        // Load the views
        $this->load->view('templates/header', $data);
        $this->load->view('nyt/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    // For individual articles views
    public function view($slug = NULL)
    {
        $news_item = $this->nyt_model->get_news($slug);

        if (empty($news_item)) {
            show_404(); 
        }

        // Pass the article details to the view
        $data = [
            'title' => $news_item['title'],
            'abstract' => $news_item['abstract'],
            'byline' => $news_item['byline'],
            'published_date' => $news_item['published_date'],
            'image' => $news_item['image'],
            'url' => $news_item['url'],
        ];

        // Load the views
        $this->load->view('templates/header', $data);
        $this->load->view('nyt/view', $data);
        $this->load->view('templates/footer', $data);
    }
}
