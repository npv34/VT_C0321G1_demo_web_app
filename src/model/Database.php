<?php
namespace Src\Model;

use PDO;
use PDOException;

class Database
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=demo';
        $this->username = 'root';
        $this->password = '123456@Abc';
    }

    public function connect()  {
        try {
            return new PDO($this->dsn, $this->username, $this->password);
        }catch (PDOException $PDOException) {
            echo "Ket noi den database loi vui long kiem tra lai";
            die();
        }
    }
}