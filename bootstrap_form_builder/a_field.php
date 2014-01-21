<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 11.01.14
 */

namespace bootstrap_form_builder;


/**
 * Элемент формы
 * 
 * @package bootstrap_form_builder
 */
abstract class a_field extends a_html_element {
 /**
  * @var array правила валидации
  */
 protected $validation_rules = array();

 /**
  * @var string значение поля
  */
 protected $value;

 /**
  * @var string label поля
  */
 protected $label;

 /**
  * @var bool вывод поля самостоятельно или рядом с label
  */
 protected $need_label = TRUE;
 
 /**
  * Установка значения поля
  * @param string $value
  * @return $this
  */
 public function set_value($value)
 {
  $this->value = $value;
  return $this;
 }

 /**
  * Получение значения поля
  * @return string
  */
 public function get_value()
 {
  return $this->value;
 }

 /**
  * Устанавливает label поля
  * @param string $label
  * @return $this
  */
 public function set_label($label)
 {
  $this->label = $label;
  return $this;
 }

 /**
  * Возвращает label поля
  * @return string
  */
 public function get_label()
 {
  return $this->label;
 }
 
 /**
  * Добавление правила валидации поля
  * @param string $rule
  * @return $this
  */
 public function add_validation_rule($rule)
 {
  if (!empty($rule) and !in_array($rule, $this->validation_rules)) $this->validation_rules[] = $rule;
  return $this;
 }

 /**
  * Получение правил валидации поля
  * @return string
  */
 public function get_validation_ruled()
 {
  return implode(',', $this->validation_rules);
 }

 /**
  * Возвращает или устанавливает значение need_label
  * 
  * Если передан параметр $value, устанавливает значение и возвращает $this. Иначе - возвращает значение параметра.
  * 
  * @param null $value
  * @return $this|bool
  */
 public function need_label($value = null)
 {
  if (is_null($value)) return $this->need_label;
  else
  {
   $this->need_label = (bool)$value;
   return $this;
  }
  
 }
}