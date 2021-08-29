<?php

namespace Drupal\location_time\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class LocationTimeForm extends ConfigFormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'location_time_admin_settings';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
        return [
            'location_time.settings',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('location_time.settings');        
        $form['country'] = array(
            '#type' => 'textfield',
            '#title' => 'Country',
            '#description' => 'Example: India',
            '#default_value' => $config->get('country'),
        );
        $form['city'] = array(
          '#type' => 'textfield',
          '#title' => 'City',
          '#description' => 'Example: Agra',
          '#default_value' => $config->get('city'),
        );
        $form['timezones'] = array(
            '#type' => 'select',
            '#title' => 'Select TimeZone',
            '#multiple' => false,
            '#options' => [
                "America/Chicago" => $this->t('America/Chicago'),
                "America/New_York" => $this->t('America/New_York'),
                "Asia/Tokyo" => $this->t('Asia/Tokyo'),
                "Asia/Dubai" => $this->t('Asia/Dubai'),
                "Asia/Kolkata" => $this->t('Asia/Kolkata'),
                "Europe/Amsterdam" => $this->t('Europe/Amsterdam'),
                "Europe/Oslo" => $this->t('Europe/Oslo'),
                "Europe/London" => $this->t('Europe/London'),
            ],
            '#default_value' => $config->get('timezones'),
        );
	

        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Retrieve the configuration
        \Drupal::configFactory()->getEditable('location_time.settings')
            // Set the submitted configuration setting
            ->set('country', $form_state->getValue('country'))
            ->set('city', $form_state->getValue('city'))
            ->set('timezones', $form_state->getValue('timezones'))
            ->save();

        parent::submitForm($form, $form_state);
    }

} 