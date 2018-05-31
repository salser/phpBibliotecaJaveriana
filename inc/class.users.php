<?php
/*=======================================================================
| UberCMS - Advanced Website and Content Management System for uberEmu
| #######################################################################
| Copyright (c) 2010, Roy 'Meth0d'
| http://www.meth0d.org
| #######################################################################
| This program is free software: you can redistribute it and/or modify
| it under the terms of the GNU General Public License as published by
| the Free Software Foundation, either version 3 of the License, or
| (at your option) any later version.
| #######################################################################
| This program is distributed in the hope that it will be useful,
| but WITHOUT ANY WARRANTY; without even the implied warranty of
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
| GNU General Public License for more details.
\======================================================================*/

class uberUsers
{
	/**************************************************************************************************/

	private $blockedNames = Array('roy', 'meth0d', 'method', 'graph1x', 'graphix', 'admin', 'administrator',
		'mod', 'moderator', 'guest', 'undefined');
	private $blockedNameParts = Array('moderate', 'staff', 'manage', 'system', 'admin', 'uber');

	private $online_count = -1;
	/**************************************************************************************************/

	/*public function IsValidEmail($email = '')
	{
		return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email);
	}*/

	public function GetOnlineCount()
	{
		if ($this->online_count == -1)
		{
			//$this->online_count = dbqueryEvaluate("SELECT users_online FROM server_status LIMIT 1");
			$this->online_count = dbqueryEvaluate("SELECT count(*) FROM users WHERE online = '1'");
		}
		return $this->online_count;
	}

	public function IsValidEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return true;
		}
		return false;
	}

	public function IsValidName($nm = '')
	{
		if (preg_match('/^[a-z0-9\d-.,;:!?@]+$/i', $nm) && strlen($nm) >= 3 && strlen($nm) <= 14)
		{
			return true;
		}

		return false;
	}

	public function IsNameTaken($nm = '')
	{
		return ((mysqli_num_rows(dbquery("SELECT null FROM users WHERE username = '" . $nm . "' LIMIT 1")) > 0) ? true : false);
	}

	public function IsEmailTaken($nm = '')
	{
		return ((mysqli_num_rows(dbquery("SELECT null FROM users WHERE mail = '" . $nm . "' LIMIT 1")) > 0) ? true : false);
	}

	public function IdExists($id = 0)
	{
		return ((mysqli_num_rows(dbquery("SELECT null FROM users WHERE id = '" . $id . "' LIMIT 1")) > 0) ? true : false);
	}

	public function IsNameBlocked($nm = '')
	{
		foreach ($this->blockedNames as $bl)
		{
			if (strtolower($nm) == strtolower($bl))
			{
				return true;
			}
		}

		foreach ($this->blockedNameParts as $bl)
		{
			if (strpos(strtolower($nm), strtolower($bl)) !== false)
			{
				return true;
			}
		}

		return false;
	}

	/**************************************************************************************************/

	function ValidateUser($username, $password)
	{
		return mysqli_num_rows(dbquery("SELECT null FROM users WHERE username = '" . $username . "' AND password = '" . $password. "' LIMIT 1"));
	}

	static function User2id($username = '')
	{
		return intval(dbqueryEvaluate("SELECT id FROM users WHERE username = '" . $username . "' LIMIT 1"));
	}
	/**************************************************************************************************/
}

?>
