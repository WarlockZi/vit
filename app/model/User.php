<?

namespace app\model;

use app\core\DB;
use app\core\Base\Model;


class User extends Model
{
	public $table = 'user';

	public function __construct()
	{
		parent::__construct();
	}

	public static function confirm($hash)
	{
		$user = \R::findOne('user', 'hash = ?', [$hash]);
		$user->confirm = 1;
		if (\R::store($user)) {
			return "Вы успешно подтвердили свой E-mail.";
		} else {
			return "Не верный код подтверждения регистрации";
		}
	}

	public static function confirmed($user)
	{
		if ($user['confirmed'] = '1') {
			return true;
		} else {
			return false;
		}
	}

	public function generatePasswordMd5()
	{
		$str = "23456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
		$pass = '';
		for ($i = 0; $i < 6; $i++) {
			$x = mt_rand(0, (strlen($str) - 1));
			if ($i != 0) {
				if ($pass[strlen($str) - 1] == $str[$x]) {
					$i--;
					continue;
				}
			}
			$pass .= $str[$x];
		}
		return md5($pass);
	}

//	public function login()
//	{
//		$email = $this->clean_data($email);
//		return \R::findOne($this->table, 'email = ?', [$email]);
//	}

	public function getByEmail($email)
	{
		$email = $this->clean_data($email);
		return \R::findOne($this->table, 'email = ?', [$email]);
	}

	public function sendPasswordByMail($email)
	{
		if ($user = $this->getByEmail($email)) {
			$md5pass = $this->generatePasswordMd5();
			$user->password = $md5pass;

			if (\R::store($user)) {
				$headers = "Content-Type:text/plain;charset=utf8";
				$headers .= "Письмо из системы тестирования <vvoronik@yandex.ru> \r\n";
				$subject = 'new password';
				$mail_body = "Ваш новый пароль: " . $md5pass;
				mail($email, $subject, $mail_body, $headers);
				return true;
			} else {
				return "Не удалось обновить новый пароль в базе";
			}
		}
		return "Пользователя с таким e-mail нет";
	}

	public function returnPass()
	{
		if (isset($_POST['email'])) { //отправили форму
			$msg = $this->sendPasswordByMail($_POST['email']);

			if ($msg === TRUE) {
				$_SESSION['msg'] = "Новый пароль выслан Вам на почту";
				header("Location:/user/login");
			} else {
				$_SESSION['msg'] = $msg;
			}
		} else {
			$_SESSION['msg'] = '';
		}
	}

	public static function getByEmailAndPass($email, $pass )
	{
		$pass = md5($pass);
		$user = \R::findOne('user', ' email=? and password = ? ', [$email, $pass]);
		if ($user) {
			if (User::confirmed($user)) {
				$user['rights'] = $user->sharedRight;
				$user = $user->export();
				return $user;
			} else {
				return null;
			}
		}
		return false;
	}

	public static function getRights($user)
	{
		$rights = [];
		$arr = $user->sharedRight;
		foreach ($arr as $item){
			array_push($rights,$item['id']);
		}
		return $rights;
	}

	public static function getById($id)
	{
		$user = \R::load('user', $id);
		$user['rights'] = self::getRights($user);
		$user = $user->export();
		if ($user) {
			return $user;
		}
		return false;
	}


	public static function setAuth(array $user)
	{
		if (!isset($_SESSION['id']) || $_SESSION['id'] === '') {
			$_SESSION['id'] = ''.$user['id'];
		}
	}

	public function checkName($name)
	{
		if (strlen($name) >= 2) {
			return true;
		}
		return false;
	}

	public function checkPhone($phone)
	{
		if (strlen($phone) >= 10) {
			return true;
		}
		return false;
	}

//	public function checkEmailExists($email)
//	{
//		$res = $this->findOne($email, 'email');
//		if (count($res)) {
//			return $res;
//		}
//		return $res;
//	}

	public static function emailExists(string $email)
	{
	    $exists =\R::findOne('user', 'email = ?', [$email]);
		if ($exists) {
			return true;
		}
		return false;
	}
	public static function getUserByHash($hash)
	{
		if ($user = \R::findOne('user', 'hash = ?', [$hash])) {
			return $user->export();
		}
		return [];
	}
}
