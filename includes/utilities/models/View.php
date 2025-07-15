<?php
class View {
    
    private $id;
    private $name;
    private $title;
    private $description;
    private $activa;
    private $restringida;

    /**
     * Valida el identificador de una vista y devuelve un objeto con los datos  
     * @param ?string $views el identificador de la vista, o null
     * 
     * @return View un array con los datos de la vista, o null si no se encuentra
     */

    public static function validate_views(?string $identifier)
    {

        $conective = Connection::getConnection();
        $query = "SELECT * FROM views WHERE name = ?";

        $PDOStatement = $conective->prepare($query);
        $PDOStatement->setFetchMOde(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$identifier]);

        $viewData = $PDOStatement->fetch();
        
        if($viewData){
            if($viewData->getActiva()){
                $resultado = $viewData;
            } else {
                $viewNoDisponible = new self();

                $viewNoDisponible->name = 'no_disponible';
                $viewNoDisponible->title = 'Vista no disponible';
                $viewNoDisponible->description = 'La vista solicitada no está disponible en este momento.';
                
                $resultado = $viewNoDisponible;
            }
        } else {
            $notFound = new self();
            $notFound->name = '404';
            $notFound->title = 'Página no encontrada';
            $notFound->description = 'La página que estás buscando no existe o ha sido movida.';
            $resultado = $notFound;
        }
        return $resultado;
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
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Get the value of active
     */ 
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($activa)
    {
        $this->activa = $activa;

        return $this;
    }

    /**
     * Get the value of restringida
     */ 
    public function getRestringida()
    {
        return $this->restringida;
    }

    /**
     * Set the value of restringida
     *
     * @return  self
     */ 
    public function setRestringida($restringida)
    {
        $this->restringida = $restringida;

        return $this;
    }
}
?>