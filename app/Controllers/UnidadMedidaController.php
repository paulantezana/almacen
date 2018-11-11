<?php
    namespace App\Controllers;
    use App\Libraries\Controller;
    use App\Libraries\Pagination;
    use App\Models\Consult;

    class UnidadMedidaController extends Controller{
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
            $total = $consult -> query('SELECT * FROM  unidadmedidas  WHERE nombre LIKE :search',[
                ':search'       => '%' . $request->search . '%',
            ])->rowCount();

            // Realizando la consulta con la paginacion
            $unidadmedidas = $consult -> query("SELECT * FROM  unidadmedidas WHERE nombre LIKE :search ORDER BY id DESC LIMIT {$offset}, {$request->limit}",[
                ':search'       => '%' . $request->search . '%',
            ])->fetchAll(\PDO::FETCH_ASSOC);

            // Imprimiendo los datos finales de respuesta
            echo json_encode([
                'message' => "",
                'success' => true,
                'total'=> $total,
                'current_page'=> $request->current_page,
                'limit'=> $request->limit,
                'data'=> $unidadmedidas
            ]);
        }

        public function index(){
            echo $this->view->render('admin/unidadmedida/index.twig');
        }

        public function form(){
            $unidadmedida;

            // Si se envia in parametro id por el metodo get buscara los datos en la base de datos
            if(isset($_GET['id'])){
                // coneccion
                $consult = new Consult();
                // consulta
                $result = $consult -> query(
                    'SELECT * FROM  unidadmedidas WHERE id=:id', [':id'   => $_GET['id']]
                );
                foreach($result as $row){
                    $unidadmedida = $row;
                }
            }

            // Imprimiendo template
            echo $this->view->render('admin/unidadmedida/form.twig',[
                'unidadmedida' => $unidadmedida,
                'type'=> isset($_GET['id']) ? 'update' : 'create'
            ]);
        }
        public function create(){
             // Recuperando la conneccion de la base de datos con los preparestaments
            $consult = new Consult();

            // Query de creacion
            $consult -> query(
                'INSERT INTO unidadmedidas (nombre,prefijo,estado)
                VALUES(:nombre,:prefijo,:estado)',
                [
                    ':nombre'       => $_POST['nombre'],
                    ':prefijo'       => $_POST['prefijo'],
                    ':estado'       => $_POST['estado']
                ]
            );

            // redireccionamiento
            header('location:/admin/unidadmedida');
        }
        public function update(){
            // Recuperando la conneccion de la base de datos con los preparestaments
            $consult = new Consult();

            // Ejecutando el query de actualizacion
            $consult -> query(
                'UPDATE unidadmedidas SET 
                    nombre=:nombre,prefijo=:prefijo,estado=:estado
                    WHERE id=:id',
                [
                    ':nombre'       => $_POST['nombre'],
                    ':prefijo'       => $_POST['prefijo'],
                    ':estado'       => $_POST['estado'],
                    ':id'       => $_POST['id'],
                ]
            );

            // redireccionamiento
            header('location:/admin/unidadmedida');
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
                'DELETE FROM unidadmedidas WHERE id=:id',
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