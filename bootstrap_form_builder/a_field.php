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
  * @var string Имя поля
  */
 protected $name;

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
  * @var array дополнительные поля - перед или после полем
  */
 protected $append_fields = array('before'=>array(), 'after'=>array());


 /**
  * Генерирует html элемента вместе с добавлеными до и после элементами
  * @return string
  */
 public function render()
 {
  return $this->render_append_fields('before').$this->render_field().$this->render_append_fields('after');
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
  if (!empty($rule))
  {
   $array = explode('|', $rule);
   foreach ($array as $rule) if (!in_array($rule, $this->validation_rules)) $this->validation_rules[] = $rule;
  } 
  return $this;
 }

 /**
  * Удаляет правила валидации
  * @param string $rule
  * @return $this
  */
 public function remove_validation_rule($rule)
 {
  if (!empty($rule))
  {
   $array = explode('|', $rule);
   foreach ($array as $rule) if (in_array($rule, $this->validation_rules)) unset($this->validation_rules[$rule]); 
  }
  return $this;
 }

 /**
  * Получение правил валидации поля
  * @return string
  */
 public function get_validation_rules()
 {
  return implode('|', $this->validation_rules);
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

 /**
  * Добавляет дополнительное поля для вывода после основного поля
  * @param a_field $field
  * @return $this
  */
 public function add_after(a_field $field)
 {
  $this->append_fields['after'][] = $field;
  return $this;
 }

 /**
  * Добавляет дополнительное поля для вывода перед основным полем
  * @param a_field $field
  * @return $this
  */
 public function add_before(a_field $field)
 {
  $this->append_fields['before'][] = $field;
  return $this;
 }

 /**
  * Возвращает массив дополнительных полей
  * @return array
  */
 public function get_append_fields()
 {
  $result = array_merge($this->append_fields['before'], $this->append_fields['after']);
  return $result;
 }

 public function get_validation_message()
 {
  if ($this->is_CI())
  {
   $message = form_error($this->get_name());
   if (!empty($message)) $message = '<div class="alert alert-danger">'.$message.'</div>';
   
   return $message;
  }
  return '';
 }
 


 /**
  * Проводит рендеринг всех полей, которые добавлены перед или после блока
  * @param string $fields_block - before|after
  * @return string
  */
 protected function render_append_fields($fields_block)
 {
  $result = array();
  if (array_key_exists($fields_block, $this->append_fields))
  {
   foreach ($this->append_fields[$fields_block] as $field) $result[] = $field->render().' ';
  }
  
  $result = implode(' ', $result);
  if (!empty($result))
  {
   switch ($fields_block)
   {
    case 'before': $result .= ' '; break;
    case 'after': $result = ' '.$result; break;
   }
  }
  
  return $result;
 }

 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 abstract protected function render_field();
}