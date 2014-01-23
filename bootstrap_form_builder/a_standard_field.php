<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Стандартне поле
 * 
 * Вид input type="type" ...
 * 
 * @package bootstrap_form_builder
 */
abstract class a_standard_field extends a_control_field {
 public function render()
 {
  return '<input'.$this->get_summary().' type="'.$this->get_type().'" name="'.htmlspecialchars($this->get_name()).'" placeholder="'.htmlspecialchars($this->get_placeholder()).'" value="'.htmlspecialchars($this->get_value()).'">';
 }

 protected function add_element_type_classes()
 {
  $this->add_class('form-control');
  return TRUE;
 }
}