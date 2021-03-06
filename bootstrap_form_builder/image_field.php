<?php
/**
 * Поле для вывода изображения
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

 /**
  * Конструктор
  * @param string $src путь к файлу изображения
  * @param string $alt
  */
 public function __construct($src, $alt = '')
 {
  if (mb_substr($src, 0, 1) != '/') $src = '/'.$src;
  $this->set_value($src);
  $this->add_attr('alt', $alt);
 }
 
 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  if (is_null($this->get_attr('alt'))) $this->add_attr('alt', '');
  return '<div><img'.$this->get_summary().' src="'.$this->get_value().'"></div>';
 }

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 public function add_element_type_classes()
 {
  return TRUE;
 }
} 