<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 21.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поля для загрузки изображение
 * @package bootstrap_form_builder
 */
class image_file_field extends file_field {
 /**
  * @var int
  */
 protected $width = 0;

 /**
  * @var int
  */
 protected $height = 0;

 /**
  * Устанавливает ширину изображения для ресайза. Если 0 - без ресайза.
  * @param int $width
  * @return $this
  */
 public function set_width($width)
 {
  $this->width = (int)$width;
  return $this;
 }

 /**
  * Устанавливает высоту изображения для ресайза. Если 0 - без ресайза.
  * @param int $height
  * @return $this
  */
 public function set_height($height)
 {
  $this->height = (int)$height;
  return $this;
 }

 public function render_field()
 {
  $value = $this->get_value();
  if (!empty($value))
  {
//   Нужно доработать ресайз
   $image = new image_field($this->get_dir().$value);
   $result = ' '.$image->render_field();
  }
  else $result = '';
  
  return parent::render_field().$result;
 }

 /**
  * Возвращает ширину изображения для ресайза.
  * @return int
  */
 protected function get_width()
 {
  return $this->width;
 }

 /**
  * Возвращает ширину изображения для ресайза.
  * @return int
  */
 protected function get_height()
 {
  return $this->height;
 }
}