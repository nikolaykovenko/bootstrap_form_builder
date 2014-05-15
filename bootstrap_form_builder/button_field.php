<?php
/**
 * Кнопка формы
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 17.01.14
 */

namespace bootstrap_form_builder;

/**
 * Кнопка формы
 * @package bootstrap_form_builder
 */
class button_field extends a_control_field {
 
 /**
  * Конструктор
  * @param string $value значение поля
  */
 public function __construct($value)
 {
  $this->set_value($value);
  $this->add_element_type_classes();
 }

 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  return '<input'.$this->get_summary().' type="'.$this->get_type().'" value="'.htmlspecialchars($this->get_value()).'">';
 }

 /**
  * Возвращает тип поля
  * @return string
  */
 public function get_type()
 {
  return 'button';
 }

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 public function add_element_type_classes()
 {
  $this->add_class('btn');
  return TRUE;
 }
}