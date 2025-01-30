<?php

namespace Drupal\learning\Controller;
use Drupal\Core\Controller\ControllerBase;

class LearningController extends ControllerBase {

    public function customPage() {
        $newsService = \Drupal::service('learning.custom_service');
        $articles = $newsService->getNews();
        
        return [
            '#theme' => 'news_page',
            '#data' => $articles,
        ];
    }
}