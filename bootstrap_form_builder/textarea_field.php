<?php
/**
 * Поле textarea
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 21.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поле textarea
 * @package bootstrap_form_builder
 */
class textarea_field extends a_control_field {
 
 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  return '<textarea'.$this->get_summary().' name="'.htmlspecialchars($this->get_name()).'" placeholder="'.htmlspecialchars($this->get_placeholder()).'">'.$this->get_value().'</textarea>';
 }

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 protected function add_element_type_classes()
 {
  $this->add_class('form-control');
  return TRUE;
 }

 /**
  * Возвращает тип поля
  * @return string
  */
 public function get_type()
 {
  return 'textarea';
 }
} 