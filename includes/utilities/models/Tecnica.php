<?php
class Tecnica
{
    private $id;
    private $name;

    /**
     * Devuelve el listado de tecnicas para la filtración
     * 
     * @return array un array con todos los artistas
     */
    public static function getTecnica(): array
    {
        $conective = new Connection();
        $db = $conective->getConnection();
        $query = "SELECT * FROM tecnica";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([]);

        $results = $PDOStatement->fetchAll();

        return $results;
    }

    public static function getTecnicaId(int $tecnicaId): ?Tecnica
    {
        $connective = (new Connection())->getConnection();
        $query = "SELECT * FROM tecnica WHERE id = ?";

        $PDOStatement = $connective->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$tecnicaId]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }

    /**
     * Inserta una nueva tecnica en la base de datos
     * 
     * @param string $name nombre de la tecnica
     * 
     */
    public static function inserir(string $name)
    {
        $connective = (new Connection())->getConnection();
        $query = "INSERT INTO tecnica (name) VALUES (?)";
        
        $PDOStatement = $connective->prepare($query);
        $result = $PDOStatement->execute([$name]);

        return $result;
    }

    /**
     * Actualiza la categoria seleccionada
     * 
     * @param int $id id de la categoria
     * @param string $name nombre de la categoria
     */

    public function update(int $id, string $name)
    {
        $connective = (new Connection())->getConnection();
        $query = "UPDATE tecnica SET name = ? WHERE id = ?";
        
        $PDOStatement = $connective->prepare($query);
        $result = $PDOStatement->execute([$name, $id]);
    
        return $result;
    }
    /**
     * Deleta la categoria seleccionada
     * 
     */
    public function delete()
    {
        $connective = (new Connection())->getConnection();
        $query = "DELETE FROM tecnica WHERE id = ?";
        
        $PDOStatement = $connective->prepare($query);
        $result = $PDOStatement->execute([$this->id]);
    
        return $result;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}