<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Статический текст
 * @package bootstrap_form_builder
 */
class html_field extends a_field {
 /**
  * @param string $value значение поля
  */
 public function __construct($value)
 {
  $this->set_value($value);
  $this->add_element_type_classes();
 }

 protected function render_field()
 {
  return '<p'.$this->get_summary().'>'.$this->get_value().'</p>';
 }

 protected function add_element_type_classes()
 {
  $this->add_class('form-control-static');
 }
} 