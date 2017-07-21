<?php
/**
 * 动态生成数据库连接测试
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Connection;

class PdoController extends Controller
{
    /**
     * 动态生成数据库连接测试
     */
    public function index()
    {
        $dsn = "mysql:host=localhost;dbname=blog";
        $db = new \PDO($dsn, 'root', 'root');
        $con = new Connection($db);
        $r = $con->select("select * from users limit 10");
        dd($r);
    }
}
