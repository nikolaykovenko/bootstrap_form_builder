<?php
/**
 * Поле для ввода даты
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поле для ввода даты.
 * @package bootstrap_form_builder
 */
class date_field extends a_standard_field {

 /**
  * Возвращает тип поля
  * @return string
  */
 public function get_type()
 {
  return 'date';
 }
} 