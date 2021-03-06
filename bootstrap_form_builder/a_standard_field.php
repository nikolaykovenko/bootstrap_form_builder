<?php
/**
 * Стандартне поле
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

 /**
  * Генерирует html элемента
  * @return string
  */
 public function render()
 {
  $before = $this->render_append_fields('before');
  $after = $this->render_append_fields('after');
  $field = $this->render_field();
  
  if (!empty($before) or !empty($after))
  {
   $field = '<div class="col-sm-'.((!empty($before) and !empty($after)) ? 6 : 9).'">'.$field.'</div>';
   
   $result = '<div class="row">'.(!empty($before) ? '<div class="col-sm-3">'.$before.'</div>' : '').$field.(!empty($after) ? '<div class="col-sm-3">'.$after.'</div>' : '').'</div>';
  }
  else $result = $field;
  
  return $result;
 }
 
 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  return '<input'.$this->get_summary().' type="'.$this->get_type().'" name="'.htmlspecialchars($this->get_name()).'" placeholder="'.htmlspecialchars($this->get_placeholder()).'" value="'.htmlspecialchars($this->get_value()).'">';
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
}