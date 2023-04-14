<?php

class Compra {
  // private $alimentos;
  // private $utensilios;

  // public function __construct($alimentos, $utensilios) {
  //   $this->alimentos = $alimentos;
  //   $this->utensilios = $utensilios;
  // }

  // public function imprimirTicket() {
  //   $total = 0;
  //   echo "Lista de productos comprados:\n";
  //   echo "------------------------------\n";
  //   foreach ($this->alimentos as $alimento) {
  //     echo $alimento->getNombreProducto() . " - " . $alimento->dimeTipo() . " - Precio: $" . $alimento->getPrecio() . "\n";
  //     $total += $alimento->getPrecio();
  //   }
  //   foreach ($this->utensilios as $utensilio) {
  //     echo $utensilio->getNombreProducto() . " - " . $utensilio->dimeTipo() . " - Precio: $" . $utensilio->getPrecio() . "\n";
  //     $total += $utensilio->getPrecio();
  //   }
  //   echo "------------------------------\n";
  //   echo "Total: $" . $total . "\n";
  // }

    private $productos = [];
  
    public function __construct(array $alimentos, array $utensilios) {
      // AÃ±adir los alimentos y utensilios a la lista de productos
      $this->productos = array_merge($alimentos, $utensilios);
    }
  
    public function getProductos(): array {
      return $this->productos;
    }
  }

