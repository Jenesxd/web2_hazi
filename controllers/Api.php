<?php
class Api_controller
{
    private $pdo;
    private $model;
    public $baseName = "api";

    public function main(array $vars)
    {
        include(SERVER_ROOT . 'views/api_view.php');

    }
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'your_username', 'your_password');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->model = new LelekSzamModel($this->pdo);}

    public function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
        $input = json_decode(file_get_contents('php://input'), true);

        $table = preg_replace('/[^a-z0-9_]+/i', '', array_shift($request));
        $key = array_shift($request) + 0;

        switch ($method) {
            case 'GET':
                if ($key) {
                    $result = $this->model->get($key);
                } else {
                    $result = $this->model->getAll();
                }
                break;
            case 'POST':
                $result = $this->model->insert($input['ev'], $input['no'], $input['osszesen']);
                break;
            case 'PUT':
                $result = $this->model->update($key, $input['ev'], $input['no'], $input['osszesen']);
                break;
            case 'DELETE':
                $result = $this->model->delete($key);
                break;
        }

        

        header('Content-Type: application/json');
        if ($method == 'GET') {
            echo json_encode($result);
        } else {
            echo json_encode(['success' => $result]);
        }


    }

}
?>