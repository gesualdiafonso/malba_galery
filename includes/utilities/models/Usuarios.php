<?php
class Usuarios
{
    private $id;
    private $user_name;
    private $name;
    private $email;
    private $password;
    private $role;
    private $activo;
    private $created_at;
    private $updated_at;

    /**
     * Encuentra un usuario por su username
     * @param string $user_name El nombre del usuario
     */
    public static function usuario_username(string $user_name): ?Usuarios
    {
        $connective = Connection::getConnection();
        $query = "SELECT * FROM usuarios WHERE user_name = ?";
        
        $PDOStatement = $connective->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$user_name]);
        
        $result = $PDOStatement->fetch();
        
        if (!$result) {
            return null;
        }
        return $result;
    }

    // /**
    //  * Toma todos los datos de Usuario
    //  * @return array|null
    //  */
    // public static function getAllUsuarios(): ?array
    // {
    //     $connective = Connection::getConnection();
    //     $query = "SELECT * FROM usuarios";
        
    //     $PDOStatement = $connective->prepare($query);
    //     $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    //     $PDOStatement->execute();
        
    //     $result = $PDOStatement->fetchAll();
        
    //     if (!$result) {
    //         return null;
    //     }
    //     return $result;
    // }


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
     * Get the value of user_name
     */ 
    public function getUser_name()
    {
        return $this->user_name;
    }

    /**
     * Set the value of user_name
     *
     * @return  self
     */ 
    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;

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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of activo
     */ 
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of activo
     *
     * @return  self
     */ 
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
