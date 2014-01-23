<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 21.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поле для вывода изображения
 * @package bootstrap_form_builder
 */
class image_field extends a_field {
 public function __construct($src, $alt = '')
 {
  $this->set_value($src);
  $this->add_attr('alt', $alt);
 }
 
 public function render()
 {
  if (is_null($this->get_attr('alt'))) $this->add_attr('alt', '');
  return '<div><img'.$this->get_summary().' src="'.$this->get_value().'"></div>';
 }

 public function add_element_type_classes()
 {
  return TRUE;
 }
} 