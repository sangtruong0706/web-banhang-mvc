<?php
    class Load{
        public function __construct()
        {
        }
        public function view($fileName, $data = array()){
            if ($data == true){
                extract($data);
            }
            include('app/views/'.$fileName.'.php');
        }
        public function model($fileName){
            include('app/models/'.$fileName.'.php');
            return new $fileName();
        }
    }

?>