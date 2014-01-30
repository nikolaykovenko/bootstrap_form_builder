<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 23.01.14
 */

namespace bootstrap_form_builder;

/**
 * Блок чекбоксов
 * @package bootstrap_form_builder
 */
class checkboxes_field extends radio_field {
 public function render_field()
 {
  $result = '';

  foreach ($this->get_items() as $value => $caption)
  {
   $checkbox = new checkbox_field($this->get_name().'['.$value.']', $caption, $value);
   $checkbox->set_checked($this->is_selected($value));
   
   $result .= '<label'.$this->get_classes_html().'>
                 '.$checkbox->render_field().' '.$checkbox->get_label().'
               </label>';
  }

  return '<div>'.$result.'</div>';
 }

 public function get_type()
 {
  return 'checkboxes';
 }

 public function add_element_type_classes()
 {
  $this->add_class('checkbox');
  return TRUE;
 }

 public function set_inline($inline)
 {
  $this->inline = (boolean)$inline;
  if ($this->inline) $this->remove_class('checkbox')->add_class('checkbox-inline'); else $this->remove_class('checkbox-inline')->add_class('checkbox');
  return $this;
 }
} 