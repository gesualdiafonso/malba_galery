<?php
class DetallesArtista
{
    private $id;
    private $artista_id;
    private $premiacion;
    private $curiosidad;
    private $ano_inicio;
    private $ano_fallecimiento;
    private $nacionalidad;
    
    /**
     * Busca los detalles de un artista por su ID.
     * @param int $id
     * @return DetallesArtista
     */
    public static function getById(int $id): ?DetallesArtista
    {
        $connective = Connection::getConnection();
        $query = "SELECT * FROM detalles_artista WHERE artista_id = ?";
        
        $PDOStatement = $connective->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        return $PDOStatement->fetch() ?: null;
    }

    /**
     * Inserta un nuevo detalles del artista a la base de datos.
     * @param int $artista_id
     * @param string $premiacion
     * @param string $curiosidad
     * @param string $ano_inicio
     * @param string $ano_fallecimiento
     * @param string $nacionalidad
     */
    public static function insert(int $artista_id, string $premiacion, string $curiosidad, int $ano_inicio, ?int $ano_fallecimiento, string $nacionalidad)
    {
        $connective = Connection::getConnection();
        $query = "INSERT INTO detalles_artista
        (`artista_id`,`premiacion`, `curiosidad`, `ano_inicio`, `ano_fallecimiento`, `nacionalidad`)
        VALUES (:artista_id, :premiacion, :curiosidad, :ano_inicio, :ano_fallecimiento, :nacionalidad)";

        $PDOStatement = $connective->prepare($query);
        $PDOStatement->execute([
            ':artista_id' => $artista_id,
            ':premiacion' => $premiacion,
            ':curiosidad' => $curiosidad,
            ':ano_inicio' => $ano_inicio,
            ':ano_fallecimiento' => $ano_fallecimiento,
            ':nacionalidad' => $nacionalidad
        ]);
    }

    /**
     * Edita los datos de detalles del artista en la base de datos
     * @param int $artista_id
     * @param string $premiacion
     * @param string $curiosidad
     * @param string $ano_inicio
     * @param string $ano_fallecimiento
     * @param string $nacionalidad
     */
    public function edit($artista_id, $premiacion, $curiosidad, $ano_inicio, ?string $ano_fallecimiento, $nacionalidad)
    {
        $conective = Connection::getConnection();

        $query = "UPDATE detalles_artista
        SET premiacion = :premiacion, 
            curiosidad = :curiosidad, 
            ano_inicio = :ano_inicio, 
            ano_fallecimiento = :ano_fallecimiento, 
            nacionalidad = :nacionalidad
        WHERE artista_id = :artista_id";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->execute(
            [
                'premiacion' => $premiacion,
                'curiosidad' => $curiosidad,
                'ano_inicio' => $ano_inicio,
                'ano_fallecimiento' => $ano_fallecimiento,
                'nacionalidad' => $nacionalidad,
                'artista_id' => $artista_id,
            ]
        );
    }

    /**
     * Elimina la instancia en la base de datos
     */
    public function delete()
    {
        $conective = Connection::getConnection();
        $query = "DELETE FROM detalles_artista WHERE artista_id = artista_id";

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
     * Get the value of artista_id
     */ 
    // public function getArtista_id()
    // {
    //     $detallesArtista = (new Artista())->getById($this->id);

    //     return $detallesArtista->getId();
    // }
    public function getArtista_id()
    {
        return $this->artista_id;
    }

    /**
     * Set the value of artista_id
     *
     * @return  self
     */ 
    public function setArtista_id($artista_id)
    {
        $this->artista_id = $artista_id;

        return $this;
    }

    /**
     * Get the value of premiacion
     */ 
    public function getPremiacion()
    {
        return $this->premiacion;
    }

    /**
     * Set the value of premiacion
     *
     * @return  self
     */ 
    public function setPremiacion($premiacion)
    {
        $this->premiacion = $premiacion;

        return $this;
    }

    /**
     * Get the value of curiosidad
     */ 
    public function getCuriosidad()
    {
        return $this->curiosidad;
    }

    /**
     * Set the value of curiosidad
     *
     * @return  self
     */ 
    public function setCuriosidad($curiosidad)
    {
        $this->curiosidad = $curiosidad;

        return $this;
    }

    /**
     * Get the value of ano_inicio
     */ 
    public function getAno_inicio()
    {
        return $this->ano_inicio;
    }

    /**
     * Set the value of ano_inicio
     *
     * @return  self
     */ 
    public function setAno_inicio($ano_inicio)
    {
        $this->ano_inicio = $ano_inicio;

        return $this;
    }

    /**
     * Get the value of ano_fallecimiento
     */ 
    public function getAno_fallecimiento()
    {
        return $this->ano_fallecimiento;
    }

    /**
     * Set the value of ano_fallecimiento
     *
     * @return  self
     */ 
    public function setAno_fallecimiento($ano_fallecimiento)
    {
        $this->ano_fallecimiento = $ano_fallecimiento;

        return $this;
    }

    /**
     * Get the value of nacionalidad
     */ 
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set the value of nacionalidad
     *
     * @return  self
     */ 
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }
}