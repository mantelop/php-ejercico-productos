<?php
// Clase Producto
class Producto {
  protected $id;
  protected $nombreProducto;
  protected $precio;

  public function __construct($id, $nombreProducto, $precio) {
    $this->id = $id;
    $this->nombreProducto = $nombreProducto;
    $this->precio = $precio;
  }

  public function getId() {
    return $this->id;
  }

  public function getNombreProducto() {
    return $this->nombreProducto;
  }

  public function getPrecio() {
    return $this->precio;
  }

  public static function aplicarDescuento25($precio) {
    return $precio * 0.75;
  }

  public function dimeTipo() {
    // return "Producto";
  }
}







