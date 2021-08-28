<?php

namespace Drupal\location_time\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 * id = "location_time",
 * admin_label = @Translation("Location Time Block"),
 * )
 */
class LocationTimeBlock extends BlockBase{
  /**
   * {@inheritdoc}
   */

  public function build(){
    return array(
      '#type' => 'markup',
      '#markup' => "THis is custom drupal 8 block",
  );
  }
}