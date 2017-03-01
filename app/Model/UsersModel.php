<?php 

namespace Model;

use \W\Model\UsersModel as WUsersModel;

class UsersModel extends WUsersModel {
   /**
	 * Récupère une ligne de la table en fonction de Uuid
	 * @param  integer Identifiant
	 * @return mixed Les données sous forme de tableau associatif
	 */
	public function findByUuid($id)	{

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE uuid = :id LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetch();
	}
	
	public function deleteByUuid($id) {
		
		$sql = 'DELETE FROM ' . $this->table . ' WHERE uuid = :id LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);

		return $sth->execute();
	}
}