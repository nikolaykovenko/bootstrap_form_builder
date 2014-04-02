<?php
/**
 * Блочный статический текст
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Блочный статический текст
 * @package bootstrap_form_builder
 */
class block_html_field extends a_field {

 /**
  * Конструктор
  * @param string $value Текст блока
  */
 public function __construct($value)
 {
  $this->set_value($value);
  $this->need_label(FALSE);
  $this->add_element_type_classes();
 }
 
 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  return '<span'.$this->get_summary().'>'.$this->get_value().'</span>';
 }

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 protected function add_element_type_classes()
 {
  $this->add_class('help-block');
  return TRUE;
 }
} 