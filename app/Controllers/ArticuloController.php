<?php
    namespace App\Controllers;
    use App\Libraries\Controller;
    use App\Libraries\Pagination;
    use App\Models\Consult;

    class ArticuloController extends Controller{
        public function paginate(){
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: POST");
            
            // Reciviendo los datos del methodo post decodificando en un array asociativo
            $request = json_decode(file_get_contents("php://input"));

            // validacion de los parametros requerido en el json con el methodo post
            if( empty($request->current_page) || empty($request->limit) ){
                echo json_encode([
                    "message" => "Los parametros search,current_page,limit son requeridos",
                    "success" => false,
                ]);
                return;
            }

            // Recalculando la páginacion
            $request->current_page = $request->current_page == 0 ? 1 : $request->current_page;
            $offset = $request->limit * $request->current_page - $request->limit;

            // Recuperando la conneccion de la base de datos con los preparestaments
            $consult = new Consult();

            // obteniendo el numero total de los registros en la base de datos
            $total = $consult -> query('SELECT * FROM  articulos  WHERE nombre LIKE :search',[
                ':search'       => '%' . $request->search . '%',
            ])->rowCount();

            // Realizando la consulta con la paginacion
            $articulos = $consult -> query("SELECT * FROM  articulos WHERE nombre LIKE :search ORDER BY id DESC LIMIT {$offset}, {$request->limit}",[
                ':search'       => '%' . $request->search . '%',
            ])->fetchAll(\PDO::FETCH_ASSOC);

            // Imprimiendo los datos finales de respuesta
            echo json_encode([
                'message' => "",
                'success' => true,
                'total'=> $total,
                'current_page'=> $request->current_page,
                'limit'=> $request->limit,
                'data'=> $articulos
            ]);
        }

        public function index(){
            echo $this->view->render('admin/articulo/index.twig');
        }

        public function form(){
            $articulo;

            // Si se envia in parametro id por el metodo get buscara los datos en la base de datos
            if(isset($_GET['id'])){
                // coneccion
                $consult = new Consult();
                // consulta
                $result = $consult -> query(
                    'SELECT * FROM  articulos WHERE id=:id', [':id'   => $_GET['id']]
                );
                foreach($result as $row){
                    $articulo = $row;
                }
            }

            // Imprimiendo template
            echo $this->view->render('admin/articulo/form.twig',[
                'articulo' => $articulo,
                'type'=> isset($_GET['id']) ? 'update' : 'create'
            ]);
        }
        public function create(){
             // Recuperando la conneccion de la base de datos con los preparestaments
            $consult = new Consult();

            // Query de creacion
            $consult -> query(
                'INSERT INTO articulos (id_categoria,id_unidad,nombre,descripcion,imagen,estado)
                    VALUES(:id_categoria,:id_unidad,:nombre,:descripcion,:imagen,:estado)',
                [
                    ':id_categoria'       => $_POST['id_categoria'],
                    ':id_unidad'       => $_POST['id_unidad'],
                    ':nombre'       => $_POST['nombre'],
                    ':descripcion'       => $_POST['descripcion'],
                    ':imagen'       => $_POST['imagen'],
                    ':estado'       => $_POST['estado']
                ]
            );

            // redireccionamiento
            header('location:/admin/articulo');
        }
        public function update(){
            // Recuperando la conneccion de la base de datos con los preparestaments
            $consult = new Consult();

            // Ejecutando el query de actualizacion
            $consult -> query(
                'UPDATE articulos SET 
                    id_categoria=:id_categoria,id_unidad=:id_unidad,nombre=:nombre,descripcion=:descripcion,imagen=:imagen,estado=:estado
                    WHERE id=:id',
                [
                    ':id_categoria'       => $_POST['id_categoria'],
                    ':id_unidad'       => $_POST['id_unidad'],
                    ':nombre'       => $_POST['nombre'],
                    ':descripcion'       => $_POST['descripcion'],
                    ':imagen'       => $_POST['imagen'],
                    ':estado'       => $_POST['estado'],
                    ':id'       => $_POST['id'],
                ]
            );

            // redireccionamiento
            header('location:/admin/articulo');
        }
        public function delete(){
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: DELETE");

            // Reciviendo los datos del methodo post decodificando en un array asociativo
            $request = json_decode(file_get_contents("php://input"));

             // Recuperando la conneccion de la base de datos con los preparestaments
            $consult = new Consult();

            // Realizando el query de eliminacion
            $consult -> query(
                'DELETE FROM articulos WHERE id=:id',
                [
                    ':id'   => $request->id
                ]
            );

            // Imprimiendo los datos finales de respuesta
            echo json_encode([
                'message' => "El registro se elimino",
                'success' => true,
            ]);
        }
    }