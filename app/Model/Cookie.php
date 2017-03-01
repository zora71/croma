<?php
namespace Model;

class Cookie {

	public static function has($cookie) {
		return isset($_COOKIE[$cookie]);
	}
	
	public static function get($cookie) {
		return $_COOKIE[$cookie];
	}
	
	public static function set($cookie, $value) {
		setcookie($cookie, $value, -1, '/');
	}
	
	public static function del($cookie) {
		$_COOKIE[$cookie] = '';
		setcookie($cookie, '', -1, '/');
	}
}
?>