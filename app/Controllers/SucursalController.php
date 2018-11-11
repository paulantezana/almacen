<?php
    namespace App\Controllers;
    use App\Libraries\Controller;
    use App\Libraries\Pagination;
    use App\Models\Consult;

    class SucursalController extends Controller{
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
            $total = $consult -> query('SELECT * FROM  sucursales  WHERE razon_social LIKE :search',[
                ':search'       => '%' . $request->search . '%',
            ])->rowCount();

            // Realizando la consulta con la paginacion
            $sucursales = $consult -> query("SELECT * FROM  sucursales WHERE razon_social LIKE :search ORDER BY id DESC LIMIT {$offset}, {$request->limit}",[
                ':search'       => '%' . $request->search . '%',
            ])->fetchAll(\PDO::FETCH_ASSOC);

            // Imprimiendo los datos finales de respuesta
            echo json_encode([
                'message' => "",
                'success' => true,
                'total'=> $total,
                'current_page'=> $request->current_page,
                'limit'=> $request->limit,
                'data'=> $sucursales
            ]);
        }
        public function index(){
            echo $this->view->render('admin/sucursal/index.twig');
        }
        public function form(){
            $sucursal;
            
            // Si se envia in parametro id por el metodo get buscara los datos en la base de datos
            if(isset($_GET['id'])){
                // coneccion
                $consult = new Consult();
                // consulta
                $result = $consult -> query(
                    'SELECT * FROM  sucursales WHERE id=:id', [':id'   => $_GET['id']]
                );
                foreach($result as $row){
                    $sucursal = $row;
                }
            }

            // redireccionamiento
            echo $this->view->render('admin/sucursal/form.twig',[
                'sucursal' => $sucursal,
                'type'=> isset($_GET['id']) ? 'update' : 'create'
            ]);
        }
        public function create(){
            $consult = new Consult();
            $consult -> query(
                'INSERT INTO sucursales (razon_social,tipo_documento,numero_documento,direccion,telefono,email,representante,logo,estado)
                VALUES(:razon_social,:tipo_documento,:numero_documento,:direccion,:telefono,:email,:representante,:logo,:estado)',
                [
                    ':razon_social'       => $_POST['razon_social'],
                    ':tipo_documento'       => $_POST['tipo_documento'],
                    ':numero_documento'       => $_POST['numero_documento'],
                    ':direccion'       => $_POST['direccion'],
                    ':telefono'       => $_POST['telefono'],
                    ':email'       => $_POST['email'],
                    ':representante'       => $_POST['representante'],
                    ':logo'       => $_POST['logo'],
                    ':estado'       => $_POST['estado']
                ]
            );
            header('location:/admin/sucursal');
        }
        public function update(){
            $consult = new Consult();
            $consult -> query(
                'UPDATE sucursales SET 
                    razon_social=:razon_social,tipo_documento=:tipo_documento,numero_documento=:numero_documento,
                    direccion=:direccion,telefono=:telefono,email=:email,representante=:representante,logo=:logo,estado=:estado
                    WHERE id=:id',
                [
                    ':razon_social'       => $_POST['razon_social'],
                    ':tipo_documento'       => $_POST['tipo_documento'],
                    ':numero_documento'       => $_POST['numero_documento'],
                    ':direccion'       => $_POST['direccion'],
                    ':telefono'       => $_POST['telefono'],
                    ':email'       => $_POST['email'],
                    ':representante'       => $_POST['representante'],
                    ':logo'       => $_POST['logo'],
                    ':estado'       => $_POST['estado'],
                    ':id'       => $_POST['id'],
                ]
            );
            header('location:/admin/sucursal');
        }
        public function delete(){
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: DELETE");

            $request = json_decode(file_get_contents("php://input"));

            $consult = new Consult();
            $consult -> query(
                'DELETE FROM sucursales WHERE id=:id',
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