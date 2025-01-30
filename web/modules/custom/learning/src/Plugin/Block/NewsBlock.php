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

        $newsService = \Drupal::service('learning.custom_service');
        $articles = $newsService->getNews();
        
        return [
            '#theme' => 'learning_news_block',
            '#data' => $articles,
        ];
    }

}