<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Более сложные поля формы
 * @package bootstrap_form_builder
 */
abstract class a_control_field extends a_field {
 /**
  * @var string Тип поля
  */
 protected $type;

 /**
  * @var string Имя поля
  */
 protected $name;

 /**
  * @var bool флаг необходимости заполнения поля
  */
 protected $required = false;

 /**
  * @var string placeholder поля
  */
 protected $place_holder;

 /**
  * @param string $name имя поля
  * @param null $label label поля
  * @param null $value значение поля
  * @param bool $required флаг необходимости заполнения поля
  */
 public function __construct($name = null, $label = null, $value = null, $required = false)
 {
  $this->set_name($name);
  $this->set_label($label);
  $this->set_value($value);
  $this->set_required($required);
  $this->add_element_type_classes();
 }

 /**
  * Устанавливает имя поля
  * @param string $name
  * @return $this
  */
 public function set_name($name)
 {
  $this->name = $name;
  return $this;
 }

 /**
  * Возвращает имя поля
  * @return string
  */
 public function get_name()
 {
  return (string)$this->name;
 }

 /**
  * Устанавливает флаг необходимости заполнения поля
  * @param boolean $value
  * @return $this
  */
 public function set_required($value)
 {
  $this->required = (boolean)$value;
  if ($this->required) $this->add_attr('required', 'required'); else $this->remove_attr('required');
  return $this;
 }

 /**
  * Возвращает флаг необходимости заполнения поля
  * @return bool
  */
 public function get_required()
 {
  return $this->required;
 }

 /**
  * Устанавливает значение placeholder
  * @param string $placeholder
  * @return $this
  */
 public function set_placeholder($placeholder)
 {
  $this->place_holder = $placeholder;
  return $this;
 }

 /**
  * Возвращает placeholder
  * @return string
  */
 public function get_placeholder()
 {
  return (string)$this->place_holder;
 }

 public function get_label()
 {
  $label = parent::get_label();
  if ($this->get_required()) $label .= '<sup>*</sup>';
  
  return $label;
 }

 /**
  * Возвращает тип поля
  * @return string
  */
 abstract public function get_type();
} 