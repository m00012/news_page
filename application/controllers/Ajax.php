<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->config('email');
    }

    public function processnames() {
        //  AJAX request
        if ($this->input->is_ajax_request()) {
            $name = strip_tags(trim($this->input->post('name')));
            $remail1 = strip_tags(trim($this->input->post('remail1')));
            $subject = strip_tags(trim($this->input->post('subject')));
            $message = strip_tags(trim($this->input->post('message')));

            if (empty($name) || empty($remail1) || empty($subject) || empty($message)) {
                echo "All fields are required.";
                return;
            }

            if (!filter_var($remail1, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
                return;
            }

            $to = $this->config->item('to_email');

            $headers = "From: $remail1\r\n";
            $headers .= "Reply-To: $remail1\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

            if (mail($to, $subject, $message, $headers)) {
                echo "okay";
		
			} else {
                echo "error";
            }

        } else {
            echo "Invalid request.";
        }
    }

    public function index() {
        // Load the contact form view with header and footer
        $this->load->view('templates/header');
        $this->load->view('contact/index');
        $this->load->view('templates/footer');
    }
}
