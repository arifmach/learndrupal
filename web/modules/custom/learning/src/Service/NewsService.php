<?php

namespace Drupal\learning\Service;

class NewsService {

    //Service function to get News
    public function getNews() {
        $articles = [];
        $apiUrl = 'https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=97edc404a66e46ad840112fc6f299698';
        try {
            $client = \Drupal::httpClient();
            $headers = [
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ];
            $response = $client->get($apiUrl, $headers);
            $statusCode = $response->getStatusCode();
            if($statusCode == 200) {
                $results = json_decode($response->getBody()->getContents(), true);
                $articles = $results['articles'];
            }
        } catch(\Exception $e) {
            // dd($e->getMessage());
        }

        return $articles;
    }
}