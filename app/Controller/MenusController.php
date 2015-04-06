<?php
class MenusController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');
	public $uses = array('Menu', 'MenusUsuario', 'Usuario', 'Auditoria');

	function index() {
	}

	function listado($usuario_id = null) {
            if (isset($this->params['requested']) && $this->params['requested'] == true) {

                $sesion_usuario_id = $this->Session->read('usuario_id');
                $usuario_id = (isset($usuario_id)) ? $sesion_usuario_id : $usuario_id;
                        $conditions = array('MenusUsuario.usuario_id' => $usuario_id, 'Menu.activo' => 1);
                $menus = $this->MenusUsuario->find('all',  array(
                                                        'fields' => 'Menu.id, Menu.nombre, Menu.controller, Menu.orden, Menu.action, Menu.activo',
                                                        'conditions' => $conditions,
                                                        'order' => 'Menu.orden ASC'
                                                        )
                                                );
                    return $menus;
            } else {
                    $this->set('menus', $this->Menu->find('all'));
            }
	}
}
?>
