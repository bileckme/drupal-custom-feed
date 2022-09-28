<?php
namespace Custom\Feeds\Service;

use \Drupal;

use Drupal\Core\Config\ConfigFactoryInterface;
/**
 * Static Service Container wrapper.
 *
 * Generally, code in Drupal should accept its dependencies via either
 * constructor injection or setter method injection. However, there are cases,
 * particularly in legacy procedural code, where that is infeasible. This
 * class acts as a unified global accessor to arbitrary services within the
 * system in order to ease the transition from procedural code to injected OO
 * code.
 */
class FeedService
{

  /** 
   * The config name.
   *
   * @var string
   */
 protected $configName = 'feeds.factory';

 /**
  * The config factory object.
  *
  * @var \Drupal\Core\Config\ConfigFactoryInterface
  */
 protected $configFactory;

  /**
   * Retrieves a service from the container.
   *
   * Use this method if the desired service is not one of those with a dedicated
   * accessor method below. If it is listed below, those methods are preferred
   * as they can return useful type hints.
   *
   * @param string $module
   *   The ID of the service to retrieve.
   *
   * @return mixed
   *   The specified service.
   */
  public function service() {
    $service = \Drupal::getContainer()->get(FeedService::class);
    return $service;
  }

}
