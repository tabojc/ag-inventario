<div id="menu">
    <div id="nav">
        <ul class="main-menu">
        <?php
            if (!isset($menus) || empty($menus)):
                $usuario_id = $this->Session->read('usuario_id');
                $menus = $this->requestAction('/menus/listado/$usuario_id');
            endif;
            foreach($menus as $menu):
        ?>
            <li>
                <?php
                        //if ($this->Session->read('usuario_perfil')=='Produccion') {
                            //if (($menu['Menu']['controller']=='ordens') || ($menu['Menu']['controller']=='movimientos')  || ($menu['Menu']['controller']=='movimientos'))
                                echo "<a href='".DS.$menu['Menu']['controller'].DS.$menu['Menu']['action']."'>".$menu['Menu']['nombre']."</a>";
                        //}
                        //else
                            //echo "<a href='".DS.$menu['Menu']['controller'].DS.$menu['Menu']['action']."'>".$menu['Menu']['nombre']."</a>";

                ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
