<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Базовый HTML элемент.
 * 
 * @package bootstrap_form_builder
 */
abstract class a_html_element {
 /**
  * @var string уникальный id поля
  */
 protected $id;
 
 /**
  * @var array массив дополнительных классов элемента. Классы используются для CSS оформления
  */
 protected $class_array = array();

 /**
  * @var array массив дополнительных аттрибутов элемента
  */
 protected $attr_array = array();

 /**
  * @var CI_Controller
  */
 protected $CI;


 /**
  * Добавляет элементу новый CSS-класс
  * @param string $class
  * @return $this
  */
 public function add_class($class)
 {
  if (!empty($class) and !in_array($class, $this->class_array)) $this->class_array[] = $class;
  return $this;
 }

 /**
  * Удаляет заданный CSS-класс
  * @param string $class
  * @return $this
  */
 public function remove_class($class)
 {
  if (($key = array_search($class, $this->class_array)) !== FALSE) unset($this->class_array[$key]);
  return $this;
 }

 /**
  * Добавляет элементу новый атрибут, если $value не null
  * @param string $attr атрибут
  * @param string $value значение атрибута
  * @return $this
  */
 public function add_attr($attr, $value)
 {
  if (!is_null($value)) $this->attr_array[$attr] = $value;
  return $this;
 }

 /**
  * Удаляет заданный атрибут
  * @param string $attr
  * @return $this
  */
 public function remove_attr($attr)
 {
  if (($key = array_search($attr, $this->attr_array)) !== FALSE) unset($this->attr_array[$key]);
  return $this;
 }

 /**
  * Установка параметра id элемента
  * @param string $id
  * @return $this
  */
 public function set_id($id)
 {
  $this->id = $id;
  return $this;
 }

 /**
  * Получение параметра id элемента
  * @return string
  */
 public function get_id()
 {
  return $this->id;
 }

 /**
  * Возвращает объект контроллера Codegniter, в случае, если он существует
  * @return CI_Controller|null
  */
 public function get_CI()
 {
  if ($this->is_CI() and empty($this->CI)) $this->CI = &get_instance();
  return $this->CI;
 }


 /**
  * Возвращает полную строку с id, классами и атрибутами элемента
  * @return string
  */
 protected function get_summary()
 {
  return $this->get_full_id().$this->get_classes_html().$this->get_attrs_html();
 }

 /**
  * Возвращает значение переданого в параметре атрибута
  * @param string $attr
  * @return string|null
  */
 protected function get_attr($attr)
 {
  if (array_key_exists($attr, $this->attr_array)) return $this->attr_array[$attr]; else return null;
 }
 
 
 
 /**
  * Возвращает полную строку id="..." в случае, если id задан, иначе - пустую строку.
  * @return string
  */
 private function get_full_id()
 {
  $id = $this->get_id();
  if (empty($id)) return ''; else return ' id="'.htmlspecialchars($id).'"';
 }

 /**
  * Возвращает полную строку class="..." в случае, если заданы классы элемента, иначе - пустую строку.
  * @return string
  */
 protected function get_classes_html()
 {
  $result = implode(' ', $this->class_array);
  if (!empty($result)) $result = ' class="'.htmlspecialchars($result).'"';
  return $result;
 }

 /**
  * Проверяет, запущена ли библиотека под управлением фреймворка CI
  * @return bool
  */
 protected function is_CI()
 {
  return class_exists('CI_Controller');
 }

 /**
  * Возвращает полную строку с атрибутами элемента.
  * @return string
  */
 private function get_attrs_html()
 {
  $result = '';
  foreach ($this->attr_array as $attr => $value) $result .= ' '.$attr.'="'.htmlspecialchars($value).'"';
  return $result;
 }

 /**
  * Генерирует html элемента
  * @return string
  */
 abstract public function render();

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 abstract protected function add_element_type_classes();
} 