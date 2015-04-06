<?php

class Menu extends AppModel {
    public $name = 'Menu';
    public $useTable = 'menus';
    public $primaryKey = 'id';
    public $order = 'orden';

    public $hasMany = 'MenusUsuario';
}

?>
