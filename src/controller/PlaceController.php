<?php

require_once routeLibs.'View.php';

class placeController{

    public function default(){
        $id = isset($_GET['id']) ? $_GET['id'] : 1;

        include_once routeModel.'AtractivoModel.php';
        $model = new AtractivoModel();

        $data['atractivo'] = $model->obtenerAtractivo($id);
        $data['servicios'] = $model->obtenerServiciosAtractivo($id);

    	view('place.php', $data);
    }
    
    public function agregarImagenAtractivo(){
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        
        include_once routeModel.'AtractivoModel.php';
        $model = new AtractivoModel();
        
        if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]){
            for($i=0;$i<count($_FILES["archivo"]["name"]);$i++){
                
                if(file_exists(routeFiles) || @mkdir(routeFiles)){
                    
                    $origen = $_FILES["archivo"]["tmp_name"][$i];
                    $name = $_FILES["archivo"]["name"][$i];
                    $destino = routeFiles . $name;
                    $type = $_FILES["archivo"]["type"][$i];
                    if(@move_uploaded_file($origen, $destino)){
                        if( in_array($type, IMAGENES_PERMITIDAS) )
                            $model->agregarImagenAtractivo($id, $name);
                        else {
                             if( in_array($type, VIDEOS_PERMITIDOS) )
                                $model->agregarVideoAtractivo($id, $name);
                        }
                    }
                }
            }
        }
        
        $data["id"] = $id;
    	view('agregarImagenAtractivo.php', $data);
    }
}

?>