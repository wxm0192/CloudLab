<?php
//namespace Bookstore\Core;
class Request {
	const GET = 'GET';
	const POST = 'POST';
	private $domain;
	private $path;
	private $method;
	public function __construct() {
		$this->domain = $_SERVER['HTTP_HOST'];
		$this->path = $_SERVER['REQUEST_URI'];
		$this->method = $_SERVER['REQUEST_METHOD'];
		}
	public function getUrl(): string {
		return $this->domain . $this->path;
		}

	public function getDomain(): string {
		return $this->domain;
		}
	public function getPath(): string {
		return $this->path;
		}
	public function getMethod(): string {
		return $this->method;
		}
	public function isPost(): bool {
		return $this->method === self::POST;
		}
	public function isGet(): bool {
		return $this->method === self::GET;
		}
}

session_id();
session_start();
 $_SESSION['lab_session_id01']= 100 ;
		echo $_SERVER['HTTP_HOST'];
		echo "<br>";

		echo  $_SERVER['REQUEST_URI'];
		echo "<br>";
		echo  $_SERVER['REQUEST_METHOD'];
		echo "<br>";
header('Content-type: text/css');
$my_req = new Request() ; 
echo $my_req->getUrl();
echo "<br>";
echo $my_req->getDomain();
echo "<br>";
echo $my_req->getMethod();
echo "<br>";
echo $my_req->isPost();
echo "<br>";
echo $my_req->isGet();
echo "<br>";
print_r($_SERVER) ;

session_destroy() ;
?>
