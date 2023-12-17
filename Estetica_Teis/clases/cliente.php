<?php 
class Cliente {
    private string $nombre_cliente;
    private string $apellido1;
    private string $apellido2;
    private int $telefono;
  
    public function __construct(string $nombre_cliente, string $apellido1, string $apellido2, int $telefono) {
      $this->nombre_cliente = $nombre_cliente;
      $this->apellido1 = $apellido1;
      $this->apellido2 = $apellido2;
      $this->telefono = $telefono;
    }
  
    public function getNombre(): string {
      return $this->nombre_cliente;
    }
  
    public function setNombre(string $nombre_cliente): void {
      $this->nombre_cliente = $nombre_cliente;
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
  
    public function getTelefono(): int {
      return $this->telefono;
    }
  
    public function setTelefono(int $telefono): void {
      $this->telefono = $telefono;
    }
  }

?>