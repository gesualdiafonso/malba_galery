<?php
class Artista {
    private $id;
    private ?DetallesArtista $detalles;
    private $name;
    private $biografy;
    private $estilo;
    private $critica;
    private $imagen; 

    private static $createValues = ['id', 'name', 'biografy', 'estilo', 'critica', 'imagen'];

    /**
     * Cria una instancia de Artista ya con Detalles Artista embutida
     * $artistaData - Dados valido de BBDD
     * @return Artista
     */
    public static function create_artista($artistaData): Artista
    {
        $artista = new self();
        foreach(self::$createValues as $value) {
            $artista->$value = $artistaData[$value] ?? null;
        }

        // Crea una instancia de DetallesArtista
        $artista->detalles = DetallesArtista::getById($artista->id);

        return $artista;
    }


    /**
     * Devuelve el listado de artistas para la renderización
     * 
     * @return Artista[] un array con todos los artistas
     */
    public static function artistas(): array
    {
        $conective = new Connection();
        $db = $conective->getConnection();
        $query = "SELECT * FROM artista";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $results = $PDOStatement->fetchAll();

        $artistas = [];

        foreach($results as $artistaData){
            $artistas[] = self::create_artista($artistaData);
        }

        return $artistas;
    }

    /**
     * Devuelve los datos del nombre del artista según su id
     * 
     * @param int $id será selecionado el id para hacer su devolutiva
     * 
     * @return Artista
     */

    public static function getById(int $id): ?Artista
    {
        $conective = (new Connection())->getConnection();

        $query = "SELECT * FROM artista WHERE id = ?";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$id]);

        $artistaData = $PDOStatement->fetch();

        return $artistaData ? self::create_artista($artistaData) : null;
    }

    /**
     * Inserta un nuevo artista a la base de datos
     * @param string $name
     * @param string $biografy
     * @param string $estilo
     * @param string $critica
     * @param string $image ruta de un archivo .jpg o .png
     */
    public static function insert(string $name, string $biografy, string $estilo, string $critica, string $imagen)
    {
        $conective = Connection::getConnection();
        $query = "INSERT INTO artista 
            (`name`, `biografy`, `estilo`, `critica`, `imagen`) 
            VALUES (:name, :biografy, :estilo, :critica, :imagen)";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute(
            [
                'name' => $name,
                'biografy' => $biografy,
                'estilo' => $estilo,
                'critica' => $critica,
                'imagen' => $imagen
            ]
        );

        // Retorna o ID del artista recíen-inserido
        return (int)$conective->lastInsertId();
    }

    /**
     * Edita los datos de un artista en la base de datos
     * @param string $name
     * @param string $biografy
     * @param string $estilo
     * @param string $critica
     * @param string $image ruta de un archivo .jpg o .png
     */
    public function edit(string $name, string $biografy, string $estilo, string $critica, string $imagen): void
    {
        $conective = Connection::getConnection();

        $query = "UPDATE artista
        SET name = :name, biografy = :biografy, estilo = :estilo, critica = :critica, imagen = :imagen
        WHERE id = :id";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute(
            [
                'name' => $name,
                'biografy' => $biografy,
                'estilo' => $estilo,
                'critica' => $critica,
                'imagen' => $imagen,
                'id' => $this->id
            ]
        );
    }

    /**
     * Elimina la instancia en la base de datos
     */
    public function delete()
    {
        $conective = Connection::getConnection();
        $query = "DELETE FROM artista WHERE id = ?";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    private function cortarTexto(string $texto, int $limite): string
    {
        $palavras = explode(" ", $texto);
        if (count($palavras) <= $limite) {
            return $texto;
        }

        return implode(" ", array_slice($palavras, 0, $limite)) . "...";
    }
    /**
     * Devolve um valor reducido de la biografia
     * 
     * @param int $limit
     * 
     */
    public function biografia_reducida(int $limit = 30): string
    {
        return $this->cortarTexto($this->biografy, $limit);
    }
    /**
     * Devolve um valor reducido de la estilo
     * 
     * @param int $limit
     * 
     */
    public function estilo_reducida(int $limit = 5): string
    {
        return $this->cortarTexto($this->estilo, $limit);
    }

    /**
     * Devolve um valor reducido de la critica
     * 
     * @param int $limit
     * 
     */
    public function critica_reducida(int $limit = 5): string
    {
        return $this->cortarTexto($this->critica, $limit);
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
     * Get the value of biografia
     */ 
    public function getBiografy()
    {
        return $this->biografy;
    }

    /**
     * Set the value of biografia
     *
     * @return  self
     */ 
    public function setBiografy($biografy)
    {
        $this->biografy = $biografy;

        return $this;
    }

    /**
     * Get the value of estilo
     */ 
    public function getEstilo()
    {
        return $this->estilo;
    }

    /**
     * Set the value of estilo
     *
     * @return  self
     */ 
    public function setEstilo($estilo)
    {
        $this->estilo = $estilo;

        return $this;
    }

    /**
     * Get the value of critica
     */ 
    public function getCritica()
    {
        return $this->critica;
    }

    /**
     * Set the value of critica
     *
     * @return  self
     */ 
    public function setCritica($critica)
    {
        $this->critica = $critica;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of detalles_id
     */ 
    public function getDetalles_id()
    {
        return $this->detalles;
    }

    /**
     * Set the value of detalles_id
     *
     * @return  self
     */ 
    public function setDetalles_id($detalles)
    {
        $this->detalles = $detalles;

        return $this;
    }
}

?>