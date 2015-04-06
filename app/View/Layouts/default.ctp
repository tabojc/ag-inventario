<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$appDescription = __d('app_dev', 'Agropatria - Consulta de productos');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $appDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
            echo $this->Html->meta('icon', $this->Html->url('/favicon.gif'));
            echo $this->Html->css('jquery-ui-1.10.3.custom.min');
            echo $this->Html->css('jquery.timepicker');
            echo $this->Html->css('style');
		//echo $this->Html->css('jquery.jWizard.min');
		echo $this->Html->script(array(
								'jquery/jquery-1.9.1',
								'jquery/jquery-ui-1.10.3.custom.min',
								'jquery/jquery.numeric',
								'jquery/jquery.timepicker.min.js',
								'jquery/jquery.validate',
								//'jquery/jquery.jWizard.min',
                                'jquery/jquery.maskedinput.min',
                                'default',
                                //'jquery/jquery.steps.min',
                                ));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
?>
</head>
<body>
	<div id="container">
		<div id="content">
            <div id='center-side'>
                <?php echo $this->fetch('content'); ?>
                <div id="fondo"></div>
            </div>
            <div id='right-side'>
            </div>
		</div>
		<div id="footer">
			<div id='app_message' style='height=100px; background-color: blue;'>
				<?php echo $this->Session->flash(); ?>
			</div>
            <div><span>EMPRESA DE PROPIEDAD SOCIAL AGROPATRIA<br />Todos los derechos reservados © 2015.</span></div>
		</div>
	</div>
    <div id="overlay">
      <img src="/img/ajax-loader.gif"
        id="img-load" />
    </div>
	<?php //echo $this->element('sql_dump'); ?>
	<?php echo $this->Js->writeBuffer(); ?>
	<script type="text/javascript">
	    $(function(){
			$('.positive').numeric();
        });
	</script>
</body>
</html>
