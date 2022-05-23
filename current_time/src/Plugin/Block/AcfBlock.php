<?php

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "sitelocation_form",
 *   admin_label = @Translation("Acf block"),
 *   category = @Translation("Plugin to render the location")
 * )
 */

namespace Drupal\current_time\Plugin\Block;

use Drupal\Core\Block\BlockBase;


class AcfBlock extends BlockBase {

    public function build(){
    $time= \Drupal::service("current_time.location")->getTime();
    $location= \Drupal::service("current_time.location")->getLocation();
     $renderable = [
      '#theme' => 'current_time_template',
      '#test_var' => 'test variable',
      '#time' => $time,
      '#country' => $location[1],
      '#city' => $location[0],
    ];

    return $renderable;
}

public function getCacheMaxAge() {
    return 0;
}
 }