<?php
/**
 * Блок полей radio
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 22.01.14
 */

namespace bootstrap_form_builder;

/**
 * Блок полей radio
 * @package bootstrap_form_builder
 */
class radio_field extends a_multi_field {
 /**
  * @var bool флаг вывода полей в строку
  */
 protected $inline = FALSE;

 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  $result = '';
  
  foreach ($this->get_items() as $value => $caption)
  {
   $result .= '<div'.$this->get_classes_html().'>
                <label>
                 <input type="'.$this->get_type().'" name="'.$this->get_name().'" value="'.htmlspecialchars($this->get_value()).'"'.($this->is_selected($value) ? ' checked' : '').'> '.$caption.'
                </label>
               </div>';
  }
  
  return '<div>'.$result.'</div>';
 }

 /**
  * Возвращает тип поля
  * @return string
  */
 public function get_type()
 {
  return 'radio';
 }

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 public function add_element_type_classes()
 {
  $this->add_class('radio');
  return TRUE;
 }

 /**
  * Устанавливает значение inline
  * @param boolean $inline
  * @return $this
  */
 public function set_inline($inline)
 {
  $this->inline = (boolean)$inline;
  if ($this->inline) $this->remove_class('radio')->add_class('radio-inline'); else $this->remove_class('radio-inline')->add_class('radio');
  return $this;
 }

 /**
  * Возвращает значение inline
  * @return bool
  */
 public function get_inline()
 {
  return $this->inline;
 }
} 