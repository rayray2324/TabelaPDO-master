<?php 

require_once(__DIR__ ."/../vendor/autoload.php");

use MonoLog\Logger;
use MonoLog\Handler\StreamHandler;
use App\model\cantor;

$nomedobanco = 'chamadas';
$servidordobancodedados = 'localhost';
$usuario = 'root';
$senha = '';
                         
$a = new cantor();

//$logger = new Logger('###Aprendendo PDO');
//$logger->pushHandler(new StreamHandler(__DIR__.'/app.log', Logger::DEBUG));
//$logger->info("Teste do monolog...");

function get_connection(){
    $dns = "mysql:host=localhost;dbname=chamadas; charset=utf8mb4";
    $conn = new \PDO($dns, "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

$c = get_connection();

$query = "SELECT * FROM cantor";
$statement = $c->prepare($query);
$statement -> execute();

$resultados = $statement->fetchAll(\PDO::FETCH_ASSOC);


?>

<table>

    <thead>

        <tr>

            <th style="background-color: pink; width:200px"> ID </th>

            <th style="background-color: pink; width:200px">Cantor</th>

        </tr>

    </thead>


    <tbody>

        <?php foreach ($resultados as $dados): ?>

            <tr>

                <td style="text-align:center"><?php echo $dados['id']; ?></td>

                <td style="text-align:center"><?php echo $dados['nome']; ?></td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>