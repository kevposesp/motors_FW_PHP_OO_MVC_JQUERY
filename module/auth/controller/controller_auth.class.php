<?php
    class controller_auth {
        
        function view() {
            common::load_view('top_page_auth.php', VIEW_PATH_AUTH . 'auth.html');
        }
        
        function controluser() {
            $token = MiddlewareAuth::middlewareAuth();
            echo json_encode($token);
            // echo json_encode(common::load_model('auth_model', 'get_controluser', $token));
        }

        function login() {
            echo json_encode(common::load_model('auth_model', 'get_login', $_POST));
        }

        function register() {
            echo json_encode(common::load_model('auth_model', 'get_register', $_POST));
        }

        function verify() {
            echo json_encode(common::load_model('auth_model', 'get_verify', $_POST['token']));
        }

        function infBut() {
            $token = MiddlewareAuth::middlewareAuth();
            if($token) {
                    echo json_encode(common::load_model('auth_model', 'get_infBut', $token['data_id']));
            } else {
                echo json_encode(false);
            }
        }
        
        function logout() {
            session_unset();
            echo json_encode(true);
        }

        function recover() {
            echo json_encode(common::load_model('auth_model', 'get_recover', $_POST['usr']));
        }

        function setNewPass() {
            echo json_encode(common::load_model('auth_model', 'get_setNewPass', $_POST));
        }

    }
?>