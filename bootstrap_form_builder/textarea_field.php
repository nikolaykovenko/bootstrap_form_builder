<?php
/**
 * @package default
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 21.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поле textarea
 * @package bootstrap_form_builder
 */
class textarea_field extends a_control_field {
 public function render()
 {
  return '<textarea'.$this->get_summary().' name="'.htmlspecialchars($this->get_name()).'" placeholder="'.htmlspecialchars($this->get_placeholder()).'">'.$this->get_value().'</textarea>';
 }

 protected function add_element_type_classes()
 {
  $this->add_class('form-control');
 }

 public function get_type()
 {
  return 'textarea';
 }
} 