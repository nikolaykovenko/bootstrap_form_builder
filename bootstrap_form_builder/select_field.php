<?php
/**
 * Поле select
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 22.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поле select
 * @package bootstrap_form_builder
 */
class select_field extends a_multi_field {
 /**
  * @var bool Флаг возможности выбора нескольких значений
  */
 protected $multiple = FALSE;
 
 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  $result = '';
  foreach ($this->get_items() as $value => $caption) $result .= '<option value="'.$value.'"'.($this->is_selected($value) ? ' selected' : '').'>'.$caption.'</option>';
  
  return '<select name="'.htmlspecialchars($this->get_name()).'"'.$this->get_summary().'>'.$result.'</select>';
 }
 
 /**
  * Возвращает тип поля
  * @return string
  */
 public function get_type()
 {
  return 'select';
 }

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 public function add_element_type_classes()
 {
  $this->add_class('form-control');
  return TRUE;
 }

 /**
  * Устанавливает флаг возможности выбора нескольких значений
  * @param bool $multiple
  * @return $this
  */
 public function set_multiple($multiple = FALSE)
 {
  $this->multiple = (boolean)$multiple;
  if ($this->multiple) $this->add_attr('multiple', ''); else $this->remove_attr('multiple');
  
  return $this;
 }
 
 /**
  * Возвращает флаг возможности выбора нескольких значений
  * @return bool
  */
 public function get_multiple()
 {
  return $this->multiple;
 }

 /**
  * Установка значения поля
  * @param string $value
  * @return $this
  */
 public function set_value($value)
 {
  $this->add_selected_values($value);
  return parent::set_value($value);
 }
}