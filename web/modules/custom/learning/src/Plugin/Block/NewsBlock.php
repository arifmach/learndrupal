<?php

namespace Drupal\learning\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'News Section' block.
 *
 * @Block(
 *   id = "learning_news_block",
 *   admin_label = @Translation("News Block Custom"),
 * )
 */
class NewsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

        $articles = [];
        $apiUrl = 'https://newsapi.org/v2/everything?q=tesla&from=2024-12-23&sortBy=publishedAt&apiKey=2ec2d4dc2fdd46d7bd0da6ac22f1096d';
        
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
            dd($e->getMessage());
        }
        
        return [
            '#theme' => 'learning_news_block',
            '#data' => $articles,
        ];
    }

}