<?php

namespace Drupal\acquia_cms_common\Commands;

use Consolidation\AnnotatedCommand\CommandInfoAltererInterface;
use Consolidation\AnnotatedCommand\Parser\CommandInfo;
use Drush\Commands\DrushCommands;

/**
 * A Drush command file.
 */
class AcmsStatus extends DrushCommands implements CommandInfoAltererInterface {

  /**
   * Altering information for drush status.
   *
   * @return string
   */
  public function alterCommandInfo(CommandInfo $commandInfo, $commandFileInstance) {
    if ($commandInfo->getName() === 'extension:status') {
      $starter_kit = \Drupal::service('acquia_cms_common.utility')->getStarterKit();
      if(isset($starter_kit)) {
        echo dt("\n Starter Kit: !starter_kit. \n\n", ['!starter_kit' => $starter_kit]);
      }
      else {
        echo dt("Starter Kit is not installed. \n\n");
      }
    }
  }

}
