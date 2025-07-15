<?php
class GaleriaTecnica
{
    private $id;
    private $galeria_id;
    private $tecnica_id;

    public static function galeria_x_tecnica()
    {
        $connect = (new Connection())->getConnection();
        $query = "SELECT * FROM galeria_tecnica";

        $PDOStatement = $connect->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([]);

        $result = $PDOStatement->fetchAll();

        return $result;
    }

    /**
     * Devuelve las tecnicas de las obras seleccionadas por su id
     * @param int $galeria_id
     * 
     * @return array
     */
    public static function getTecnicasByObra($galeria_id): array
    {
        $connect = Connection::getConnection();
        $query = "SELECT tecnica_id FROM galeria_tecnica WHERE galeria_id = ?";
        $PDOStatement = $connect->prepare($query);
        $PDOStatement->execute([$galeria_id]);

        return $PDOStatement->fetchAll(PDO::FETCH_COLUMN); 
    }

    /**
     * Va inserir las tecnicas adentro de mi galeria_tecnicas con relación al id de galeria
     * @param int $galeriaId
     * @param int $tecnicaId
     */
    public static function insert(int $galeriaId, int $tecnicaId)
    {
        $connect = Connection::getConnection();
        $query = "INSERT INTO galeria_tecnica (galeria_id, tecnica_id) VALUES (:galeria_id, :tecnica_id)";

        $PDOStatement = $connect->prepare($query);
        $PDOStatement->execute(
            [
                'galeria_id' => $galeriaId,
                'tecnica_id' => $tecnicaId,
            ]
        );
        
    }

    public static function delete(int $galeriaId, int $tecnicaId)
    {
        $connect = Connection::getConnection();
        $query = "DELETE FROM galeria_tecnica WHERE galeria_id = ? AND tecnica_id = ?";

        $PDOStatement = $connect->prepare($query);
        $PDOStatement->execute([$galeriaId, $tecnicaId]);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of galeria_id
     */ 
    public function getGaleria_id()
    {
        $obras = (new Obras())->getId($this->galeria_id);

        return $obras->getName();
    }

    /**
     * Set the value of galeria_id
     *
     * @return  self
     */ 
    public function setGaleria_id($galeria_id)
    {
        $this->galeria_id = $galeria_id;

        return $this;
    }

    /**
     * Get the value of tecnica_id
     */ 
    public function getTecnica_id()
    {
        $tecnica = (new Tecnica())->getId($this->tecnica_id);

        return $tecnica->getId();
    }

    /**
     * Set the value of tecnica_id
     *
     * @return  self
     */ 
    public function setTecnica_id($tecnica_id)
    {
        $this->tecnica_id = $tecnica_id;

        return $this;
    }
}