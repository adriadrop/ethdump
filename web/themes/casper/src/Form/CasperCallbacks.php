<?php

/**
 * @file
 * Contains \Drupal\casper\Form\CasperCallbacks.
 */

namespace Drupal\casper\Form;

use Drupal\Core\Form\FormStateInterface;

/**
 * Wrapper class to give Casper's form callbacks a place to get loaded from.
 *
 * Drupal will not find these callbacks in the THEME.theme file, so we put them
 * in a class that the loader will find automatically.
 */
class CasperCallbacks {


  /**
   * Submit callback for theme_settings_form.
   */
  public static function submitSettings(&$form, FormStateInterface $form_state) {
    $fid = $form_state->getValue(['website_logo', 0]);
    $configs['website_logo'] = (int) $fid;
    if ($fid) {
      $file = file_load($fid);
      self::addCasperFile($file, 'website_logo');
    }
    $fid = $form_state->getValue(['front_page_background_image', 0]);
    $configs['front_page_background_image'] = (int) $fid;
    if ($fid) {
      $file = file_load($fid);
      self::addCasperFile($file, 'front_page_background_image');
    }
    static::saveConfig($configs);
  }

  /**
   * Create a reference to one of Casper's managed files.
   *
   * @todo This code is not quite right; it works, but everytime you save the form,
   *       it ups the usage count on the file. This is not what we want, of course.
   *       I suspect that Casper will need to use unmanaged files like the Theme Settings
   *       form in Core currently does.
   *
   * @see \Drupal\system\Form\ThemeSettingsForm
   */
  protected static function addCasperFile($file, $type) {
    $file_usage = \Drupal::service('file.usage');
    // add() updates the file's status and saves the file.
    if (!$file->isPermanent()) {
      $file_usage->add($file, 'casper', $type, 1);
    }
  }
  
  /**
   * Save our settings to casper.settings.
   */
  protected static function saveConfig(array $configs) {
    $config_storage  = \Drupal::service('config.factory')->getEditable('casper.settings');
    foreach ($configs as $key => $value) {
      $config_storage->set($key, $value);
    }
    $config_storage->save();
  }

}
