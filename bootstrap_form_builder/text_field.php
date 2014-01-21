<?php
/**
 * @package default
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 13.01.14
 */

namespace bootstrap_form_builder;

/**
 * Текстовое поле
 * @package bootstrap_form_builder
 */
class text_field extends a_standard_field {
 public function get_type()
 {
  return 'text';
 }
}