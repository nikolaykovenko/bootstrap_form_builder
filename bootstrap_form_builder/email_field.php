<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поле для ввода email
 * @package bootstrap_form_builder
 */
class email_field extends a_standard_field {
 public function __construct($name = null, $label = null, $value = null, $required = false)
 {
  parent::__construct($name, $label, $value, $required);
  $this->add_validation_rule('valid_email');
 }
 
 public function get_type()
 {
  return 'email';
 }
} 