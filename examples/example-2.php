<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Пример 2 - multi-поля - Twitter bootstrap form builder</title>

 <!--Twitter bootstrap include-->
 <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
 <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
 <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <!--Twitter bootstrap include-->

 <!--Example styles-->
 <link rel="stylesheet" href="css/style.css">
 <!--Example styles-->
</head>
<body>
<div class="container">
 <div class="row">
  <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12">
   <?php
   require_once '../bootstrap_form_builder/form_factory.php';

   $data = array(
    'k'=>'Kiev',
    'l'=>'Lviv',
    'm'=>'Moscow',
    'sp'=>'St. Petersburg'
   );

   try {
    $form_factory = new \bootstrap_form_builder\form_factory();
    $form = $form_factory->get_form();
    
    $form->add_input($form_factory->get_field('select', 'live_region')->set_label('Регион проживания')->add_items($data)->add_selected_values('l'));
    $form->add_input($form_factory->get_field('select', 'region2')->set_label('В каких городах Вы посещаете наши магазины?')->add_items($data)->set_multiple(TRUE)->add_selected_values(array('l','m')));

    $form->add_input($form_factory->get_field('radio', 'live_region')->set_label('Регион проживания')->add_items($data)->add_selected_values('l'));
    $form->add_input($form_factory->get_field('radio', 'live_region')->set_label('Регион проживания')->add_items($data)->add_selected_values('k')->set_inline(TRUE));

    $form->add_input($form_factory->get_field('checkboxes', 'live_region')->set_label('Регион проживания')->add_items($data)->add_selected_values('k'));
    $form->add_input($form_factory->get_field('checkboxes', 'live_region')->set_label('Регион проживания')->add_items($data)->add_selected_values('k')->set_inline(TRUE));
    

    echo $form->render();
   }
   catch (Exception $e)
   {
    echo $e->getMessage();
   }
   ?>
  </div>
 </div>
</div>
</body>
</html>