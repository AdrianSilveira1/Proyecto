<?php 
class Cita {
    private string $nombre_cliente;
    private string $apellido1;
    private string $apellido2;
    private string $servicio;
    private \DateTime $fecha;
    private int $telefono;
  
    public function __construct(string $nombre_cliente, string $apellido1, string $apellido2, string $servicio, \DateTime $fecha, int $telefono) {
      $this->nombre_cliente = $nombre_cliente;
      $this->apellido1 = $apellido1;
      $this->apellido2 = $apellido2;
      $this->servicio = $servicio;
      $this->fecha = $fecha;
      $this->telefono = $telefono;
    }
  
    public function getNombreCliente(): string {
      return $this->nombre_cliente;
    }
  
    public function setNombreCliente(string $nombre_cliente): void {
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
  
    public function getServicio(): string {
      return $this->servicio;
    }
  
    public function setServicio(string $servicio): void {
      $this->servicio = $servicio;
    }
  
    public function getFecha(): \DateTime {
      return $this->fecha;
    }
  
    public function setFecha(\DateTime $fecha): void {
      $this->fecha = $fecha;
    }
  
    public function getTelefono(): int {
      return $this->telefono;
    }
  
    public function setTelefono(int $telefono): void {
      $this->telefono = $telefono;
    }
  }

?>