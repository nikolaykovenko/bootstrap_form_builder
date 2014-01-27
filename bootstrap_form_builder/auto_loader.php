<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 23.01.14
 */

namespace bootstrap_form_builder;

/**
 * Автоматическая загрузка файлов-классов
 * @package bootstrap_form_builder
 */
class auto_loader {
 /**
  * @var string базовая директория
  */
 protected $base_dir;
 
 public function __construct()
 {
  $this->base_dir = __DIR__.'/../';
  spl_autoload_register(array($this, 'load_class'));
 }

 /**
  * * Метод для поиска файла-класса и его подключение
  * @param string $class класс для загрузки
  * @return bool
  */
 protected function load_class($class)
 {
  $file = $this->base_dir.str_replace('\\', '/', $class).'.php';
  if (file_exists($file)) require_once $file;
  return TRUE;
 }
} 