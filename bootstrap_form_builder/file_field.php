<?php
/**
 * Поле для загрузки файла.
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 21.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поле для загрузки файла.
 * @package bootstrap_form_builder
 */
class file_field extends a_standard_field {
 /**
  * @var string имя файла, под которым он был загружен
  */
 protected $filename = '';

 /**
  * @var string директория для загрузки файлов
  */
 protected $dir = '';

 /**
  * Генерирует html непосредственно элемента
  * @return string
  */
 protected function render_field()
 {
  $value = $this->get_value();
  if (!empty($value))
  {
   $checkbox = new checkbox_field($this->get_name().'_delete');
   $field = new html_field('['.$this->get_filename().'] '.$checkbox->add_attr('title', 'Удалить')->render_field());
   $result = ' '.$field->render_field();
  }
  else $result = '';
  
  return parent::render_field().$result;
 }
 
 /**
  * Возвращает тип поля
  * @return string
  */
 public function get_type()
 {
  return 'file';
 }

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 public function add_element_type_classes()
 {
  return TRUE;
 }

 /**
  * Устанавливает имя файла, под которым файл был загружен.
  * 
  * Если передан пустой параметр, имя файла извлекается автоматически из массива $_FILES или устанавливается значение идентично $value
  * 
  * @param null|string $filename
  * @return $this
  */
 public function set_filename($filename = null)
 {
  if (empty($filename))
  {
   if (array_key_exists($this->get_name(), $_FILES) and is_array($_FILES[$this->get_name()])) $filename = $_FILES[$this->get_name()]['name']; else $filename = $this->get_value();
  }
  
  $this->filename = (string)$filename;
  return $this;
 }

 /**
  * Устанавливает директорию для загрузки файлов
  * 
  * Если параметр null, устанавливается значение по умолчанию - uploads. Если директория не существует - создается новое исключание.
  * 
  * @param null|string $dir
  * @return $this
  * @throws \Exception
  */
 public function set_dir($dir = null)
 {
  if (empty($dir)) $dir = 'uploads/'; else $dir = (string)$dir;
  if (is_dir($dir)) $this->dir = $dir; else throw new \Exception('Некорректная директория');
  return $this;
 }

 /**
  * Возвращает оригинальное имя загруженого файла.
  * @return string
  */
 protected function get_filename()
 {
  if (empty($this->filename)) $this->set_filename();
  return $this->filename;
 }
 
 /**
  * Возвращает директорию для загрузки файлов
  * @return string
  */
 protected function get_dir()
 {
  if (empty($this->dir)) $this->set_dir();
  return $this->dir;
 }

 /**
  * Удаление файла ФС
  * @return bool возвращает TRUE в случае успешного удаления или отсутствия файла, FALSE - в случае ошибки удаления или ошибки директории. 
  */
 protected function delete()
 {
//  Временная заглушка
  return TRUE;
 }
} 