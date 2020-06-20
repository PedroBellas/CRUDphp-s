<?php

require_once ('Model\Model.php');
require_once ('DB\Sql.php');

class Produto extends Model
{
	
	public function save()
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_produto (cd_produto, ds_produto, ds_curta_produto, nm_produto, amigavel, vl_produto, qt_produto, vl_envio, vl_taxa, id_categoria, extra, st_produto) VALUES (:cd_produto, :ds_produto, :ds_curta_produto, :nm_produto, :amigavel, :vl_produto, :qt_produto, :vl_envio, :vl_taxa, :id_categoria, :extra, :st_produto)", array(
			":cd_produto"=>$this->getcd_produto(),
			":ds_produto"=>$this->getds_produto(),
			":ds_curta_produto"=>$this->getds_curta_produto(),
			":nm_produto"=>$this->getnm_produto(),
			":amigavel"=>$this->getamigavel(),
			":vl_produto"=>$this->getvl_produto(),
			":qt_produto"=>$this->getqt_produto(),
			":vl_envio"=>$this->getvl_envio(),
			":vl_taxa"=>$this->getvl_taxa(),
			":id_categoria"=>$this->getid_categoria(),
			":extra"=>$this->getextra(),
			":st_produto"=>$this->getst_produto()
		));

		return "Inserido com sucesso!";

	}

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_produto AS p LEFT JOIN tb_categoria AS c ON p.id_categoria = c.id_categoria");

	}

	public function list()
	{

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_produto AS p LEFT JOIN tb_categoria AS c ON p.id_categoria = c.id_categoria WHERE id_produto = :id_produto", array(
			":id_produto"=>$this->getid_produto()
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

		$sql = new sql();

		$sql->query("UPDATE tb_produto SET cd_produto = :cd_produto, ds_produto = :ds_produto, ds_curta_produto = :ds_curta_produto, nm_produto = :nm_produto, amigavel = :amigavel, vl_produto = :vl_produto, qt_produto = :qt_produto, vl_envio = :vl_envio, vl_taxa = :vl_taxa, id_categoria = :id_categoria, extra = :extra, st_produto = :st_produto WHERE id_produto = :id_produto", array(
			":cd_produto"=>$this->getcd_produto(),
			":ds_produto"=>$this->getds_produto(),
			":ds_curta_produto"=>$this->getds_curta_produto(),
			":nm_produto"=>$this->getnm_produto(),
			":amigavel"=>$this->getamigavel(),
			":vl_produto"=>$this->getvl_produto(),
			":qt_produto"=>$this->getqt_produto(),
			":vl_envio"=>$this->getvl_envio(),
			":vl_taxa"=>$this->getvl_taxa(),
			":id_categoria"=>$this->getid_categoria(),
			":extra"=>$this->getextra(),
			":st_produto"=>$this->getst_produto(),
			":id_produto"=>$this->getid_produto()
		));

		return "Atualizado com sucesso!";

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_produto WHERE id_produto = :id_produto", array(
			":id_produto"=>$this->getid_produto()
		));

	}

}

?>