<?php

namespace Drupal\learning\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;

/**
 * Provide a resource arif and muneef for get news.
 *
 * @RestResource(
 *   id = "rest_get_all_news",
 *   label = @Translation("Get All News"),
 *   uri_paths = {
 *     "canonical" = "/api/get-news"
 *   }
 * )
 */

class GetNewsApi extends ResourceBase{

   /**
   * Responds to GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response.
   */
  public function get() {

    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->accessCheck(FALSE);
    $query->condition('type', 'news');
        
    $nids = $query->execute();
    $allNodes = [];
    foreach($nids as $nid) {
        $node = Node::load($nid);
        $allNodes[] = [
            'title' => $node->getTitle(),
            'published_date' => date('d F Y', strtotime($node->get('field_published_date')->value)),
        ];
    }
    return new JsonResponse($allNodes);
  }
}