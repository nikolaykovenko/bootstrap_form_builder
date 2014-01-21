<?php
/**
 * @package default
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поля для ввода пароля
 * @package bootstrap_form_builder
 */
class password_field extends a_standard_field {
 public function get_type()
 {
  return 'password';
 }
} 