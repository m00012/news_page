<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		// Fetch details from model
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News archive';
		
		// distinction for important news section
		foreach ($data['news'] as &$news_item) {
			if ($news_item['importance'] == 1) {
				$news_item['new_title'] = '*' . $news_item['title'];  
				$news_item['class_name'] = 'important';  
			} 
			else {
				$news_item['new_title'] = $news_item['title'];  
				$news_item['class_name'] = ''; 
			} 
	}

		// load the views
		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		$data['news_item'] = $this->news_model->get_news($slug);

		if (empty($data['news_item']))
		{
			show_404();
		}

		if ($data['news_item']['importance'] == 1) {
			$data['news_item']['new_title'] = '*' . $data['news_item']['title'];
			$data['news_item']['class_name'] = 'important';
		} 
		else {
			$data['news_item']['new_title'] = $data['news_item']['title'];
			$data['news_item']['class_name'] = '';
		}

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}
}