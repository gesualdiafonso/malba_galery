<?php
class Coleccion
{
    private $id;
    private $name;

    /**
     * Devuelve el listado de tecnicas para la filtración
     * 
     * @return array un array con todos los artistas
     */
    public static function coleccion(): array
    {
        $conective = new Connection();
        $db = $conective->getConnection();
        $query = "SELECT * FROM coleccion";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([]);

        $results = $PDOStatement->fetchAll();

        return $results;
    }

    /**
     * Devuelve los datos de u guionista en particular
     * @param int $id Id unico de la categoria
     * 
     */
    public static function getColeccionId(int $id): Coleccion
    {
        $connective = (new Connection())->getConnection();
        $query = "SELECT * FROM coleccion WHERE id = ?";

        $PDOStatement = $connective->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }
    
    /**
     * Devuelve el ID de una colección por su nombre
     * @param string $name Nombre de la colección
     * @return int|null El ID de la colección o null si no existe
     */
    public static function getIdByName(string $name): ?int
    {
        $conective = Connection::getConnection();
        $query = "SELECT id FROM coleccion WHERE name = :name";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute(['name' => $name]);

        $result = $PDOStatement->fetch(PDO::FETCH_ASSOC);

        return $result ? (int)$result['id'] : null;
    }

    /**
     * Inserta una nueva obra a la base de datos
     * @param string $name
     */
    public static function insert(string $name)
    {
        $name = trim($name);
        
        // Verifica si ya existe una colección con el mismo nombre
        $existingId = self::getIdByName($name);
        if ($existingId !== null) {
            return $existingId; // Retorna el ID de la colección existente
        }
        $conective = Connection::getConnection();
        $query = "INSERT INTO coleccion (name) VALUES (:name)";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute(
            [
                'name' => $name,
            ]
        );

        // Retorna o ID del artista recíen-inserido
        return (int)$conective->lastInsertId();
    }

    /**
     * Edita una colección existente
     * @param int $id
     * @param string $name
     */
    public static function edit(int $id, string $name)
    {
        $conective = Connection::getConnection();
        $query = "UPDATE coleccion SET name = :name WHERE id = :id";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute(
            [
                'name' => $name,
                'id' => $id
            ]
        );
    }
    /**
     * Elimina la instancia en la base de datos
     */
    public function delete()
    {
        $conective = Connection::getConnection();
        $query = "DELETE FROM coleccion WHERE id = ?";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute([$this->id]);
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