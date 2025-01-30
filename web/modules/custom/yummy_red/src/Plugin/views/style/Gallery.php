<?php

declare(strict_types=1);

namespace Drupal\yummy_red\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Events style plugin.
 *
 * @ViewsStyle(
 *   id = "yummy_red_gallery",
 *   title = @Translation("Gallery"),
 *   help = @Translation("@todo Add help text here."),
 *   theme = "views_style_yummy_red_gallery",
 *   display_types = {"normal"},
 * )
 */
final class Gallery extends StylePluginBase {

  /**
   * {@inheritdoc}
   */
  protected $usesRowPlugin = TRUE;

  /**
   * {@inheritdoc}
   */
  protected $usesRowClass = TRUE;

  /**
   * {@inheritdoc}
   */
  protected function defineOptions(): array {
    $options = parent::defineOptions();
    $options['wrapper_class'] = ['default' => 'item-list'];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state): void {
    parent::buildOptionsForm($form, $form_state);
    $form['wrapper_class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Wrapper class'),
      '#description' => $this->t('The class to provide on the wrapper, outside rows.'),
      '#default_value' => $this->options['wrapper_class'],
    ];
  }

}
