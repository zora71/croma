<?php 

namespace Model;

use \W\Model\UsersModel as WUsersModel;

class UsersModel extends WUsersModel {
  
	//Recherche utilisateur sur Uuid
	public function findByUuid($id)	{

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE uuid = :id LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetch();
	}
	
	//Supprimer utilisateur sur Uuid
	public function deleteByUuid($id) {
		
		$sql = 'DELETE FROM ' . $this->table . ' WHERE uuid = :id LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);

		return $sth->execute();
	}
	
	//Recherche utilisateur sur token (soit mot de passe, soit email)
	public function findByToken($token, $t)	{

		if ($t == "P") {
			$sql = 'SELECT * FROM ' . $this->table . ' WHERE pwdToken = :Token LIMIT 1';
		} else {
			$sql = 'SELECT * FROM ' . $this->table . ' WHERE emailToken = :Token LIMIT 1';
		}
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':Token', $token);
		$sth->execute();

		return $sth->fetch();
	}
}