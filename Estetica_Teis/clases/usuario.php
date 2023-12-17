<?php 
class Usuario {
    private string $id;
    private string $nombre_usuario;
    private string $apellido1;
    private string $apellido2;
    private string $contraseña;
    private int $administrador;
  
    public function __construct(string $id, string $nombre_usuario, string $apellido1, string $apellido2, string $contraseña, int $administrador) {
        $this->id = $id;
      $this->nombre_usuario = $nombre_usuario;
      $this->apellido1 = $apellido1;
      $this->apellido2 = $apellido2;
      $this->contraseña = $contraseña;
      $this->administrador = $administrador;
    }
  
    public function getId(): string {
        return $this->id;
      }
    
      public function setId(string $id): void {
        $this->id = $id;
      }

    public function getNombre(): string {
      return $this->nombre_usuario;
    }
  
    public function setNombre(string $nombre_cliente): void {
      $this->nombre_usuario = $nombre_cliente;
    }
  
    public function getApellido1(): string {
      return $this->apellido1;
    }
  
    public function setApellido1(string $apellido1): void {
      $this->apellido1 = $apellido1;
    }
  
    public function getApellido2(): string {
      return $this->apellido2;
    }
  
    public function setApellido2(string $apellido2): void {
      $this->apellido2 = $apellido2;
    }
  

    public function getContraseña(): string {
        return $this->contraseña;
      }
    
      public function setContraseña(string $contraseña): void {
        $this->contraseña = $contraseña;
      }

      public function getAdministrador(): int {
        return $this->administrador;
      }
    
      public function setAdministrador(int $administrador): void {
        $this->administrador = $administrador;
      }
  }

?>