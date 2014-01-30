<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 17.01.14
 */

namespace bootstrap_form_builder;

/**
 * Кнопка отправки формы
 * @package bootstrap_form_builder
 */
class submit_field extends a_control_field {
 /**
  * @param string $value значение поля
  */
 public function __construct($value)
 {
  $this->set_value($value);
  $this->add_element_type_classes();
 }
 
 public function render()
 {
  return '<input'.$this->get_summary().' type="'.$this->get_type().'" value="'.htmlspecialchars($this->get_value()).'">';
 }
 
 public function get_type()
 {
  return 'submit';
 }

 public function add_element_type_classes()
 {
  $this->add_class('btn btn-primary');
 }
}