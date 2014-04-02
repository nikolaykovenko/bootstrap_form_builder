<?php
/**
 * Скрытое поле
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Скрытое поле
 * @package bootstrap_form_builder
 */
class hidden_field extends a_standard_field {
 
 /**
  * Конструктор
  * @param string $name имя поля
  * @param null $label label поля
  * @param null $value значение поля
  * @param bool $required флаг необходимости заполнения поля
  */
 public function __construct($name, $label = null, $value = null, $required = false)
 {
  parent::__construct($name, $label, $value, $required);
  $this->need_label(FALSE);
 }
 
 /**
  * Возвращает тип поля
  * @return string
  */
 public function get_type()
 {
  return 'hidden';
 }
} 