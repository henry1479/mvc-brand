<?php
// базовый класс контроллера
    abstract class C_Controller 
    {
        //гененрация внешнего шаблона
        protected abstract function render();

        //функция отрабатывающая до основного метода
        protected abstract function before();

        public function request($action,$data) 
        {
            $this->before();
            $this->$action($data);
            $this->provider();
            $this->render();
        }

        //
        // запрос произведен методом GET
        //

        protected function isGet()
        {
            return $_SERVER['REQUEST_METHOD'] == 'GET';
        }

        // проверка на метод пост

        protected function isPost()
        {
            return $_SERVER['REQUEST_METHOD'] == 'POST';
        }

        protected function template($filename, $vars = array())
        {
            //установка переменных для шаблона
            foreach($vars as $key=>$value) 
            {
                $$key =$value;
            }

            //генерация html в строку
            ob_start();
            include "$filename";
            return ob_get_clean();
        }

        public function __call($name, $params) {
            die('Напишите url правильно');
        }
    }


?>