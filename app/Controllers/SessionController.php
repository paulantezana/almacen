<?php
    namespace App\Controllers;
    use App\Libraries\View;
    use App\Models\Consult;

    class SessionController{
        public function login(){
            View::Render('pages/login');
        }
        public function init(){
            // CONSULTA A LA BASE DE DATOS a la tabla estudiantes ======================================
            
            $use = new Consult();
            $userInit = $use -> query(
                'SELECT * FROM  docente
                WHERE coddoc=:coddoc',
                [
                    ':coddoc'   => $_POST['lName']
                ]
            );
            foreach($userInit as $row){
                $user = $row;
            }

            // Iniciando Session Por Codigo del Estudiante =============================================
            if($_POST['lpassword'] == 'admin'){
                $this->sessionStart($user);
                header('location:' . URL_BIBLIOTECA);
            }
        }
        public function sessionStart($user){
            $_SESSION['userName'] = $user['nomdoc'];
            $_SESSION['id'] = $user['coddoc'];
        }

        public function logout(){
            session_destroy();
            header('location:/');
        }
    }