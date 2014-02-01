<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 13.01.14
 */

namespace bootstrap_form_builder;

/**
 * Горизонтальная форма
 * @package bootstrap_form_builder
 */
class horizontal_form extends a_form {
 protected function add_element_type_classes()
 {
  $this->add_class('form-horizontal');
 }

 
 protected function put_field(a_field $input)
 {
  $result = $input->render();
  if ($input->need_label())
  {
   $id = $input->get_id();
   $validation_message = $input->get_validation_message();

   $result = '<div class="form-group'.(!empty($validation_message) ? ' has-error' : '').'">
               <label'.(!empty($id) ? ' for="'.$id.'"' : '').' class="col-sm-2 control-label">'.$input->get_label().'</label>
                <div class="col-sm-10">'.$result.'</div>
                '.$validation_message.'
              </div>';
  }

  return $result;
 }
}