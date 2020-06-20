<?php

require_once ('Model\Model.php');
require_once ('DB\Sql.php');

class Categoria extends Model
{
	
	public function save()
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_categoria (nm_categoria, id_categoria_pai, st_categoria) VALUES (:nm_categoria, :id_categoria_pai, :st_categoria)", array(
			":nm_categoria"=>$this->getnm_categoria(),
			":id_categoria_pai"=>$this->getid_categoria_pai(),
			":st_categoria"=>$this->getst_categoria()
		));

		return "Inserido com sucesso!";

	}

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categoria");

	}

	public function list()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categoria WHERE id_categoria != :id_categoria", array(
			":id_categoria"=>$this->getid_categoria()
		));

	}

	public function researchCategoria()
	{

		$sql = new Sql();

		$result =  $sql->select("SELECT * FROM tb_categoria WHERE id_categoria = :id_categoria", array(
			":id_categoria"=>$this->getid_categoria()
		));

		if (count($result) == 0) {
			return $result;
		}
		else{
			return $result[0];
		}

	}

	public function att()
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_categoria SET nm_categoria = :nm_categoria, id_categoria_pai = :id_categoria_pai, st_categoria = :st_categoria WHERE id_categoria = :id_categoria", array(
			":nm_categoria"=>$this->getnm_categoria(),
			":id_categoria_pai"=>$this->getid_categoria_pai(),
			":st_categoria"=>$this->getst_categoria(),
			":id_categoria"=>$this->getid_categoria()
		));

		return "Atualizado com sucesso!";

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_categoria WHERE id_categoria_pai = :id_categoria", array(
			":id_categoria"=>$this->getid_categoria(),
		));



		$sql->query("DELETE FROM tb_categoria WHERE id_categoria = :id_categoria", array(
			":id_categoria"=>$this->getid_categoria(),
		));

		return "Deltado com sucesso!";

	}
	
}

?>