<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 10.01.14
 */

namespace bootstrap_form_builder;

/**
 * Фабрика элементов
 *
 * Единственная точка входа, создает объекты форм и элементов форм
 * 
 * @package bootstrap_form_builder
 */
class form_factory {
 public function __construct()
 {
  require_once 'auto_loader.php';
  $loader = new auto_loader();
 }

 /**
  * Возвращает объект формы одного из доступных типов (horizontal, inline, simple)
  * @param string $type Тип формы
  * @param string $post строка POST формы. По умолчанию null - поточная страница
  * @param string $name название формы. По умолчанию main
  * @param string $on_submit onsubmit атртибут формы
  * @return a_form объект формы
  * @throws \Exception в случае, если объект не найден
  */
 public function get_form($type = 'simple', $post = null, $name = 'main', $on_submit = null)
 {
  $class_name = __NAMESPACE__.'\\'.$type.'_form';
  $object = new $class_name($post, $name, $on_submit);
  
  return $object;
 }

 /**
  * Возвращает объект элемента формы нужного типа
  * @param string $type Тип элемента
  * @return a_field объект элемента
  * @throws \Exception в случае, если объект не найден
  */
 public function get_field($type)
 {
  $class_name = __NAMESPACE__.'\\'.$type.'_field';
  
  $args = func_get_args();
  array_shift($args);
  $class = new \ReflectionClass($class_name);
  $object = $class->newInstanceArgs($args);
  
  return $object;
 }
}