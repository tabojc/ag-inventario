<?php

class InventariosController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');
	public $uses = array('Inventario','Clasificacion','Subclasificacion', 'Articulo', 'Tienda', 'Medida');
    public $paginate = array('limit' => 10);

    public function filtro() {
        $listaCla = $this->Clasificacion->find('list', array('fields' => 'Clasificacion.dencla'/*, 'conditions' => $conditions*/,'order' => 'Clasificacion.codcla ASC'));
        /*foreach($listaCla as $indice => $valor) {
            $listaCla[$indice] = utf8_encode($valor);
        }
        */

        $listaSubCla = array();
        $listaProducto = array();
        $this->set('listaProducto', $listaProducto);
        $this->set('listaCla', $listaCla);
        $this->set('listaSubCla', $listaSubCla);
    }

    public function listado() {
        $this->layout = 'ajax';
        $data = $this->request->data;

        if ( !empty( $data['Inventario']['denart'] )) {
            $listadoE = array();
            $listadoPro = explode( ' ', $data['Inventario']['denart'] );
            foreach( $listadoPro as $indice => $valor ) {
                if ( trim( $valor ) == '' ) {
                    $listadoE[] = $indice;
                }
            }
            foreach( $listadoE as $indice => $valor ) {
                unset($listadoPro[$valor]);
            }
            $buscar = implode('%', $listadoPro );
            $buscar = '%'.$buscar.'%';
            $conditions['Articulo.denart ILIKE'] = $buscar;
        } else {
            if ( !empty( $data['Inventario']['codcla'] ) )
                    $conditions['Clasificacion.codcla'] = $data['Inventario']['codcla'];

            if ( !empty( $data['Inventario']['subcla'] ) )
                    $conditions['Subclasificacion.cod_sub'] = $data['Inventario']['subcla'];

            if ( !empty( $data['Inventario']['codart'] ) )
                    $conditions['Articulo.codart'] = $data['Inventario']['codart'];
        }

        $options['joins'] = array(
            array('table' => 'sfc_clasificacion',
                'alias' => 'Clasificacion',
                'type' => 'left',
                'conditions' => array(
                    'Articulo.codcla = Clasificacion.codcla'
                )
            ),
            array('table' => 'sfc_subclasificacion',
                'alias' => 'Subclasificacion',
                'type' => 'left',
                'conditions' => array(
                    'Subclasificacion.codcla = Clasificacion.codcla',
                    'Subclasificacion.codcla = Articulo.codcla',
                    'Subclasificacion.cod_sub = Articulo.cod_sub',
                )
            ),
            array('table' => 'siv_unidadmedida',
                'alias' => 'Medida',
                'type' => 'LEFT',
                'conditions' => array(
                    'Medida.codunimed = Articulo.codunimed',
                )
            ),
        );
        $options['fields'] = 'Tienda.dentie, Articulo.codart, Articulo.denart, Medida.denunimed, Inventario.existencia, Inventario.fecha';
        $options['conditions'] = $conditions;
        $options['order'] = 'Inventario.codart ASC';

        $listaInv = $this->Inventario->find('all', $options);

        $this->set('mostrado', 100);
        $this->set('filas', count($listaInv));
        $this->set('listaInv', $listaInv);
    }

    public function ajaxsubcla($codcla=null){
        $this->layout = 'ajax';
        $data = $this->request->data;
        $conditions = array('Subclasificacion.codcla' => $data['Inventario']['codcla']);
        $listaSubCla = $this->Subclasificacion->find('list', array('fields' => 'Subclasificacion.den_sub',
            'conditions' => $conditions,
            'recursive' => 10,
            'order' => 'Subclasificacion.cod_sub ASC'
            )
        );
        $this->set('listaSubCla',$listaSubCla);
    }

    public function ajaxproducto() {
        $this->layout = 'ajax';

        $data = $this->request->data;

        if ( !empty( $data['Inventario']['codcla'] ) )
                $conditions['Clasificacion.codcla'] = $data['Inventario']['codcla'];

        if ( !empty( $data['Inventario']['subcla'] ) )
                $conditions['Subclasificacion.cod_sub'] = $data['Inventario']['subcla'];

        $options['joins'] = array(
            array('table' => 'siv_articulo',
                'alias' => 'Articulo',
                'type' => 'left',
                'conditions' => array(
                    'Articulo.codart = Inventario.codart'
                )
            ),
            array('table' => 'sfc_clasificacion',
                'alias' => 'Clasificacion',
                'type' => 'left',
                'conditions' => array(
                    'Articulo.codcla = Clasificacion.codcla'
                )
            ),
            array('table' => 'sfc_subclasificacion',
                'alias' => 'Subclasificacion',
                'type' => 'left',
                'conditions' => array(
                    'Subclasificacion.codcla = Clasificacion.codcla',
                    'Subclasificacion.codcla = Articulo.codcla',
                    'Subclasificacion.cod_sub = Articulo.cod_sub',
                )
            ),
        );

        $options['fields'] = 'Articulo.codart, Articulo.denart';
        $options['order'] = 'Inventario.codart ASC';
        $options['conditions'] = $conditions;

        $listaProducto = $this->Inventario->find('list', $options);
        $this->set('listaProducto', $listaProducto);
    }
}
?>
