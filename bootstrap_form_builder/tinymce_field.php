<?php
/**
 * Поле tinymce
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 21.01.14
 */

namespace bootstrap_form_builder;

/**
 * Поле tinymce.
 * 
 * Скрипты должны быть инциализированы отдельно.
 * 
 * @package bootstrap_form_builder
 */
class tinymce_field extends textarea_field {

 /**
  * Добавляет элементу служебные классы, определяющие его вид.
  * @return true
  */
 protected function add_element_type_classes()
 {
  $this->add_class('tinymce');
  return TRUE;
 }
} 