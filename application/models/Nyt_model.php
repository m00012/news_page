<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nyt_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->config('nyt_api');
    }

    // Fetch the news data
    public function get_news($slug = FALSE)
    {
        $api_key = $this->config->item('nyt_api_key');

        // Set API base URL for the top stories 
        $api_url = "https://api.nytimes.com/svc/topstories/v2/home.json?api-key={$api_key}";  

        // Uses CURL to fetch data from the API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return the response as a string
        curl_setopt($ch, CURLOPT_HEADER, false);  // Exclude the header from the response

        $response = curl_exec($ch);
        curl_close($ch);

        // Decode the JSON response  into an array
        $data = json_decode($response, true);

        // Look for the all articles
        if ($slug === FALSE) {
            $articles = [];
            foreach ($data['results'] as $item) {
                
                $item_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $item['title']), '-'));
                
                $articles[] = [
                    'slug' => $item_slug,
                    'title' => $item['title'],
                    'abstract' => $item['abstract'],
                    'url' => $item['url'],
                    'byline' => $item['byline'],
                    'published_date' => $item['published_date'],
                    'image' => !empty($item['multimedia'][0]['url']) ? $item['multimedia'][0]['url'] : null,
                ];
            }
            return $articles;
        } 
        
        else {
            // Look for a individual article 
            foreach ($data['results'] as $item) {
                $item_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $item['title']), '-'));
                if ($item_slug == $slug) {
                    return [
                        'slug' => $item_slug,
                        'title' => $item['title'],
                        'abstract' => $item['abstract'],
                        'url' => $item['url'],
                        'byline' => $item['byline'],
                        'published_date' => $item['published_date'],
                        'image' => !empty($item['multimedia'][0]['url']) ? $item['multimedia'][0]['url'] : null,
                    ];
                }
            }
            return null;  
        }
    }
}
