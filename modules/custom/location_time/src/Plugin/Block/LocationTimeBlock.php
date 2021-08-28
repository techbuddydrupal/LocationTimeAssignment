<?php

namespace Drupal\location_time\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\location_time\GetTime;

/**
 * @Block(
 * id = "location_time",
 * admin_label = @Translation("Location Time Block"),
 * )
 */
class LocationTimeBlock extends BlockBase implements ContainerFactoryPluginInterface {
  /**
   * {@inheritdoc}
   */
  protected $getTime;
  public function __construct(array $configuration, $plugin_id, $plugin_definition, GetTime $getTime) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->getTime = $getTime;
  }
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('location_time.get_time')
    );
  }
  public function build(){
    $output = $this->getTime->getTime('Asia/Kolkata');
    // dump($output);
    // die;
    return array(
      '#type' => 'markup',
      '#markup' => $output,
  );
  }
}