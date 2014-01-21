<?php
/**
 * @package default
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 17.01.14
 */

namespace bootstrap_form_builder;

/**
 * Чекбокс, нужна доработке рендеринга
 * @package bootstrap_form_builder
 */
class checkbox_field extends a_standard_field {
 public function add_element_type_classes()
 {
  return TRUE;
 }
 
 public function get_type()
 {
  return 'checkbox';
 }
} 