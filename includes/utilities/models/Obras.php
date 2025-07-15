<?php
class Obras{
    private $id;
    private $name; 
    private Artista $artista;
    private Categoria $categoria;
    private Coleccion $coleccion;
    private array $tecnicas;
    private $description;
    private $informe;
    private $publication;
    private $image;
    private $price;

    // Lista static cara crear las instancias
    private static $createValues = ['id', 'name', 'description', 'informe', 'publication', 'image', 'price'];


    /**
     * Devuelve una instancia del objeto Obras, con las propiedades ya configuradas
     * @return Obras
     */
    private static function createObras($galeriaData): Obras
    {

        // Creamos una intancia del objeto
        $galeria = new self();
        foreach(self::$createValues as $value){
            $galeria->{$value} = $galeriaData[$value];
        }

        // Creo el objeto correspondientes con los datos para ser asignado
        $galeria->categoria = Categoria::getCategoriaId($galeriaData['categoria_id']);
        $galeria->coleccion = Coleccion::getColeccionId($galeriaData['coleccion_id']);
        $galeria->artista = Artista::getById($galeriaData['artista_id']);

        /* Vamos Asignas obras a galeria tecnica a las prop */
        $GLTs = !empty($galeriaData['galeria_tecnica']) ? explode(",", $galeriaData['galeria_tecnica']) : [];

        $galeriaTecnica = [];
        foreach($GLTs as $GLT) {
            $galeriaTecnica[] = Tecnica::getTecnicaId($GLT);
        }

        $galeria->tecnicas = $galeriaTecnica;

        return $galeria;

    }

    /**
     * Devuelve el listado de obras completas de productos
     * 
     * @return Obra[] un array con todas las obras 
     */
    public static function galeria_completa():array
    {
        $connective = new Connection();
        $db = $connective->getConnection();
        $query = "SELECT galeria.id,
       galeria.name,
       galeria.artista_id,
       galeria.categoria_id,
       galeria.coleccion_id,
       galeria.description,
       galeria.informe,
       galeria.publication,
       galeria.image,
       galeria.price,
       STRING_AGG(tec.tecnica_id::TEXT, ',' ORDER BY tec.tecnica_id) AS galeria_tecnica
FROM galeria
LEFT JOIN galeria_tecnica AS tec ON galeria.id = tec.galeria_id
GROUP BY galeria.id, galeria.name, galeria.artista_id, galeria.categoria_id, galeria.coleccion_id,
         galeria.description, galeria.informe, galeria.publication, galeria.image, galeria.price";

        $PDOStatement = $db->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $galeria = [];

        while($result = $PDOStatement->fetch()) {
            $galeria[] = self::createObras($result);
        }

        return $galeria;
    }

    /**
     * Devuelve el valor del artista_id para una galeria por artista
     * 
     * @param int $artistaId - ID del artista seleccionado
     * 
     * @return array - lista de objetos de tipo obras
     */

    public static function galeriaPorAutor($artistaId): array
    {
        $connective = (new Connection())->getConnection();
    
        $query = "SELECT  g.id,
        g.name,
        g.artista_id,
        g.categoria_id,
        g.coleccion_id,
        g.description,
        g.informe,
        g.publication,
        g.image,
        g.price,
        STRING_AGG(t.tecnica_id::TEXT, ',' ORDER BY t.tecnica_id) AS galeria_tecnica
  FROM  galeria                AS g
  LEFT  JOIN galeria_tecnica   AS t ON g.id = t.galeria_id
 WHERE  g.artista_id = :artista_id
GROUP BY g.id, g.name, g.artista_id, g.categoria_id, g.coleccion_id,
         g.description, g.informe, g.publication, g.image, g.price";
    
        $PDOStatement = $connective->prepare($query);
        $PDOStatement->bindParam(':artista_id', $artistaId, PDO::PARAM_INT);
        $PDOStatement->execute();
    
        $resultados = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    
        $galeria = [];
    
        foreach ($resultados as $obraData) {
            $galeria[] = self::createObras($obraData);
        }
    
        return $galeria;
    }

    /**
     * Devuelve el valor de la obra por su categoria_id
     * 
     * @param int $categoriaId - Id de la categoria que ha sido filtrada
     * 
     * @return array - lista de objetos de tipo obras
     */
    public static function galeria_x_categoria($categoriaId): array
    {
        $connective = new Connection();
        $db = $connective->getConnection();
    
        $query = "SELECT galeria.id,
                 galeria.name,
                 galeria.artista_id,
                 galeria.categoria_id,
                 galeria.coleccion_id,
                 galeria.description,
                 galeria.informe,
                 galeria.publication,
                 galeria.image,
                 galeria.price,
                 STRING_AGG(tec.tecnica_id::TEXT, ',' ORDER BY tec.tecnica_id) AS galeria_tecnica
          FROM galeria
          LEFT JOIN galeria_tecnica AS tec ON galeria.id = tec.galeria_id
          WHERE galeria.categoria_id = ?
          GROUP BY galeria.id, galeria.name, galeria.artista_id, galeria.categoria_id,
                   galeria.coleccion_id, galeria.description, galeria.informe,
                   galeria.publication, galeria.image, galeria.price";
    
        $PDOStatement = $db->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$categoriaId]);
    
        $galeria = [];
    
        while($result = $PDOStatement->fetch()) {
            $galeria[] = self::createObras($result);
        }
    
        return $galeria;
    }

    /**
     * Devuelve el listado de obras por su id 
     * 
     * @param int $id El id de la obra deseada
     * 
     * @return ?Obra un array con todas las obras del id seleccionado
     */
    public static function galeria_id(int $obraId): ?Obras
    {
        $connective = (new Connection())->getConnection();

        $query = "SELECT galeria.*, 
                        STRING_AGG(tec.tecnica_id::TEXT, ',' ORDER BY tec.tecnica_id) AS galeria_tecnica
                FROM galeria
                LEFT JOIN galeria_tecnica AS tec ON galeria.id = tec.galeria_id
                WHERE galeria.id = ?
                GROUP BY galeria.id";

        $PDOStatement = $connective->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$obraId]);

        $result = $PDOStatement->fetch();

        return $result ? self::createObras($result) : null;
    }

    /**
     * Inserta una nueva obra a la base de datos
     * @param string $name
     * @param int $artista_id
     * @param int $categoria_id
     * @param int $coleccion_id
     * @param string $description
     * @param string $informe
     * @param int $publication
     * @param string $image con la ruta para archivo .jpg o .png
     * @param int $price
     */
    public static function insert(string $name, int $artista_id, int $categoria_id, int $coleccion_id, string $description, string $informe, int $publication, string $image, int $price)
    {
        $connective = Connection::getConnection();
        $query = "INSERT INTO galeria
          (name, artista_id, categoria_id, coleccion_id, description, informe, publication, image, price)
          VALUES
          (:name, :artista_id, :categoria_id, :coleccion_id, :description, :informe, :publication, :image, :price)
          RETURNING id";

$PDOStatement = $connective->prepare($query);
$PDOStatement->execute([
                'name' => $name,
                'artista_id' => $artista_id,
                'categoria_id' => $categoria_id,
                'coleccion_id' => $coleccion_id,
                'description' => $description,
                'informe' => $informe,
                'publication' => $publication,
                'image' => $image,
                'price' => $price
            ]
        );
        $newId = $PDOStatement->fetchColumn();
        return $newId;
    }

    /**
     * Edita los datos de un artista en la base de datos
     * @param string $name
     * @param int $artista_id
     * @param int $categoria_id
     * @param int $coleccion_id
     * @param string $description
     * @param string $informe
     * @param int $publication
     * @param string $image ruta de un archivo .jpg o .png
     * @param int $price
     */
    public function edit(string $name, int $artista_id, int $categoria_id, int $coleccion_id, string $description, string $informe, int $publication, string $image, int $price): void
    {
        
        $connective = Connection::getConnection();
        $query = "UPDATE galeria
        SET name = :name, artista_id = :artista_id, categoria_id = :categoria_id, coleccion_id = :coleccion_id, 
            description = :description, informe = :informe, publication = :publication, image = :image, price = :price
        WHERE id = :id";
        
        $PDOStatement = $connective->prepare($query);
        $PDOStatement->execute([
                'name' => $name,
                'artista_id' => $artista_id,
                'categoria_id' => $categoria_id,
                'coleccion_id' => $coleccion_id,
                'description' => $description,
                'informe' => $informe,
                'publication' => $publication,
                'image' => $image,
                'price' => $price,
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
        $query = "DELETE FROM galeria WHERE id = ?";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Devolve um valor reducido de la biografia
     * 
     * @param int $limit
     * 
     */
    public function description_reducida(int $limit = 20): string
    {
        $texto = $this->description;

        $array = explode(" ", $texto);
        if (count($array) <= $limit){
            $resultado = $texto;
        } else{
            array_splice($array, $limit);
            $resultado = implode(" ", $array). "...";
        }

        return $resultado;
    }

    /**
     * Vai devolver a quantidade de obras segundo o id do artista para apresentar no Dashboard
     * @param int $artistaId
     * @return int
     * 
     */
    public static function contarObrasPorArtista(int $artistaId): int
    {
        $connective = Connection::getConnection();
        $query = "SELECT COUNT(*) FROM galeria WHERE artista_id = ?";

        $PDOStatement = $connective->prepare($query);
        $PDOStatement->execute([$artistaId]);

        return (int) $PDOStatement->fetchColumn();
    }

    /**
     * Devulve las obras filtradas por precio en un Rango y ordenadas según preferencia.
     * 
     * @param float $min Precio minimo
     * @param float $max Precio maximo
     * @param string $order Orden de la consulta, puede ser 'asc' o 'desc'
     * 
     * @return Obra[] - Lista de objetos Obras filtrados por precio
     */
    public static function galeriaPrecioRango(float $min, float $max, string $orden = 'ASC'): array
    {
        $connective = Connection::getConnection();
        $orden = strtoupper($orden) === 'DESC' ? 'DESC' : 'ASC'; // whitelisting
$query = "
  SELECT galeria.*,
         STRING_AGG(tec.tecnica_id::TEXT, ',' ORDER BY tec.tecnica_id) AS galeria_tecnica
    FROM galeria
    LEFT JOIN galeria_tecnica AS tec ON galeria.id = tec.galeria_id
   WHERE galeria.price BETWEEN :min AND :max
GROUP BY galeria.id
ORDER BY galeria.price $orden";

        $PDOStatement = $connective->prepare($query);
        $PDOStatement->bindParam(':min', $min, PDO::PARAM_STR);
        $PDOStatement->bindParam(':max', $max, PDO::PARAM_STR);
        $PDOStatement->execute();

        $galeria = [];

        while($result = $PDOStatement->fetch(PDO::FETCH_ASSOC)) {
            $galeria[] = self::createObras($result);
        }

        return $galeria;
    }

    /**
    /*  * Devuelve el listado de precio de las obras en formato
    */
    public function getFormattedPrice(): string
    {
        return '$ ' . number_format($this->price, 2, ',', '.');
    }

    // Getter y setter de toda las clases
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
     * Get the value of artista_id
     */ 
    public function getArtista_id()
    {
        return $this->artista;
    }

    /**
     * Set the value of artista_id
     *
     * @return  self
     */ 
    public function setArtista_id($artista)
    {
        $this->artista = $artista;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        // $categoria = (new Categoria())->getCategoriaId($this->categoria_id);

        // return $categoria->getName();
        return $this->categoria;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of coleccion_id
     */ 
    public function getColeccion_id()
    {
        return $this->coleccion;
    }

    /**
     * Set the value of coleccion_id
     *
     * @return  self
     */ 
    public function setColeccion_id($coleccion)
    {
        $this->coleccion = $coleccion;

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

    /**
     * Get the value of informe
     */ 
    public function getInforme()
    {
        return $this->informe;
    }

    /**
     * Set the value of informe
     *
     * @return  self
     */ 
    public function setInforme($informe)
    {
        $this->informe = $informe;

        return $this;
    }
    /**
     * Get the value of publication
     */ 
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set the value of publication
     *
     * @return  self
     */ 
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }
    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of tecnica
     * 
     */
    public function getTecnicas()
    {
        return $this->tecnicas;
    }

    /**
     * Set the value of tecnicas
     */
    public function setTecnicas($tecnicas)
    {
        $this->tecnicas = $tecnicas;

        return $this;
    }
}
    
?>