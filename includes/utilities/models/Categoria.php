<?php
class Categoria
{
    private $id;
    private $name;
    private $description;

    /**
     * Devuelve el listado de categorias para exibición
     * 
     * @return array un array con todos los artistas
     */
    public static function all_categoria(): array
    {
        $conective = new Connection();
        $db = $conective->getConnection();
        $query = "SELECT * FROM categoria";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([]);

        $results = $PDOStatement->fetchAll();

        foreach ($results as $value) {

            $categoria = new Categoria();

            $categoria->id = $value->id;
            $categoria->name = $value->name;
        }

        return $results;
    }

    /**
     * Devuelve los datos de u guionista en particular
     * @param int $id Id unico de la categoria
     * 
     */
    public static function getCategoriaId(int $id): ?Categoria
    {
        $connective = (new Connection())->getConnection();
        $query = "SELECT * FROM categoria WHERE id = ?";

        $PDOStatement = $connective->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }

    /**
     * Inserta una nueva categoria a la base de datos
     * @param string $name
     * @param string $description
     */
    public static function addCategoria(string $name, string $description)
    {
        $connective = (new Connection())->getConnection();
        $query = "INSERT INTO categoria (name, description) VALUES (?, ?)";
        
        $PDOStatement = $connective->prepare($query);
        $result = $PDOStatement->execute([$name, $description]);

        return $result;
    }

    /**
     * Actualiza los datos de una categoria
     * @param string $name
     * @param string $description
     */
    public static function updateCategoria(int $id, string $name, string $description)
    {
        $connective = (new Connection())->getConnection();
        $query = "UPDATE categoria SET name = :name, description = :description WHERE id = :id";
        
        $PDOStatement = $connective->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $id,
                'name' => $name, 
                'description' => $description
            ]
        );

    }
    /**
     * Elimina una categoria de la base de datos
     */
    public static function deleteCategoria(int $id)
    {
        $conective = (new Connection())->getConnection();
        $query = "DELETE FROM categoria WHERE id = ?";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute([$id]);
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

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
};