<?php

namespace Drupal\my_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DefaultForm.
 */
class DefaultForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['file_upload'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('file upload'),
        '#upload_validators'  => array(
            'file_validate_extensions' => array('pdf doc docx json csv jpeg jpg png'),
            'file_validate_size' => array(25600000),
        ),
        '#upload_location' => 'public://myfiles/',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
//      drupal_set_message($key . ': ' . $value);
      drupal_set_message('Form submitted');
    }

  }

}
