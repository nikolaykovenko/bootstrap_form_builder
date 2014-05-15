<?php
/**
 * Чекбокс, нужна доработке рендеринга
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 17.01.14
 */

namespace bootstrap_form_builder;

/**
 * Чекбокс, нужна доработке рендеринга
 * @package bootstrap_form_builder
 */
class checkbox_field extends a_standard_field {
 /**
  * @var bool параметр checked
  */
 protected $checked = FALSE;
 
 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 public function add_element_type_classes()
 {
  return TRUE;
 }
 
 /**
  * Возвращает тип поля
  * @return string
  */
 public function get_type()
 {
  return 'checkbox';
 }

 /**
  * Устанавливает параметр checked
  * @param boolean $checked
  * @return $this
  */
 public function set_checked($checked)
 {
  $this->checked = (boolean)$checked;
  if ($this->checked) $this->add_attr('checked', 'checked'); else $this->remove_attr('checked');
  return $this;
 }

 /**
  * Возвращает параметр checked
  * @return bool
  */
 public function get_checked()
 {
  return $this->checked;
 }

 /**
  * Установка значения поля
  * @param string $value
  * @return $this
  */
 public function set_value($value)
 {
  $this->set_checked((bool)$value);
  return $this;
 }

 /**
  * Получение значения поля
  * @return string
  */
 public function get_value()
 {
  return $this->get_checked();
 }

 
 
 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  return '<input'.$this->get_summary().' type="'.$this->get_type().'" name="'.htmlspecialchars($this->get_name()).'" value="1">';
 }
}