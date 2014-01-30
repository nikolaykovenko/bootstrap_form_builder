<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 11.01.14
 */

namespace bootstrap_form_builder;

/**
 * Форма
 *
 * Форма - главный элемент пакета, имеет методы для работы с полями, а так же для вывода ее в html виде
 * 
 * @package bootstrap_form_builder
 */
abstract class a_form extends a_html_element {
 /**
  * @var array массив элементов формы
  */
 protected $input_array = array();

 /**
  * @param string $action строка action формы. По умолчанию null - поточная страница
  * @param string $method GET or POST
  * @param string $name название формы. По умолчанию main 
  * @param string $on_submit onsubmit атртибут формы
  */
 public function __construct($action = null, $method = 'post', $name = 'main', $on_submit = null)
 {
  $this->set_action($action);
  $this->set_method($method);
  $this->set_name($name);
  $this->set_on_submit($on_submit);
  $this->add_element_type_classes();
 }
 
 /**
  * Добавляет форме новый элемент
  * @param a_field $input
  * @return $this
  */
 public function add_input(a_field $input = NULL)
 {
  if (!is_null($input) and !in_array($input, $this->input_array)) $this->input_array[] = $input;
  return $this;
 }

 /**
  * Удаляет переданый элемент формы
  * @param a_field $input_to_delete
  * @return $this
  */
 public function remove_input(a_field $input_to_delete)
 {
  $result = array();
  foreach ($this->input_array as $input) if ($input !== $input_to_delete) $result[] = $input;
  
  return $this;
 }

 /**
  * Устанавливает параметр onsubmit
  * @param string $on_submit
  * @return $this
  */
 public function set_on_submit($on_submit)
 {
  $this->add_attr('onsubmit', $on_submit);
  return $this;
 }

 /**
  * Усланавливает параметр post.
  * Если передан пустой параметр, устанавливает поточную страницу.
  * @param string $action
  * @return $this
  */
 public function set_action($action)
 {
  if (empty($action)) $action = $_SERVER['REQUEST_URI'];
  $this->add_attr('action', $action);
  return $this;
 }

 /**
  * Устанавливает параметр name
  * @param string $name
  * @return $this
  */
 public function set_name($name)
 {
  $this->add_attr('name', $name);
  return $this;
 }

 /**
  * Установка параметра method
  * @param string $method - GET or POST
  * @return $this
  */
 public function set_method($method)
 {
  $method = strtoupper($method);
  
  if ($method != 'GET') $method = 'POST';
  $this->add_attr('method', $method);
  return $this;
 }

 /**
  * Запуск валидации формы, в разработке
  * @return boolean
  */
 public function check_validation()
 {
//  В разработке
  return TRUE;
 }

 /**
  * Установка значений ряда элемнтов формы, в разработке.
  * Ключи массива - названия элементов, значения - их значения.
  * @param array|stdClass $inputs_values
  * @return $this
  */
 public function set_input_values($inputs_values)
 {
  if (is_object($inputs_values)) $values = (array)$inputs_values; elseif (is_array($inputs_values)) $values = $inputs_values;
  
  if (!empty($values))
  {
   foreach ($this->get_inputs() as $input)
   {
    $name = $input->get_name();
    if (array_key_exists($name, $values)) $input->set_value($values[$name]);
   }
  }
  
  return $this;
 }

 /**
  * Получение массива элементов формы
  */
 public function get_inputs()
 {
  return $this->input_array;
 }

 public function render()
 {
  $result = '<form'.$this->get_summary().' role="form">';
  foreach ($this->get_inputs() as $input) $result .= $this->put_field($input);
  $result .= '</form>';

  return $result;
 }

 /**
  * Генерация обертки для элемента формы
  * @param a_field $input
  * @return string
  */
 abstract protected function put_field(a_field $input);
}