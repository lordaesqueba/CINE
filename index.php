<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Entradas al cine</title>

   
</head>
    <body>
    <h1>VENTA DE ENTRADAS</h1>
    
    
    <form method="POST">
        <label for="ticketType">Tipo de entrada:</label>
        <select id="ticketType" name="ticketType">
        <option value="Niño">Niño</option>
        <option value="Adulto">Adulto</option>
        <option value="Adulto Mayor">Adulto mayor</option>
        </select>

        <br>

        <label for="quantity">Cantidad:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1">

        <br>

        <button type="submit">Comprar</button>
       
    </form>
    </body>
    </html>

    <br><br><br>

    <?php
    
    class Ticket {
        private $ticketType;
        private $quantity;
        private $discount;

        public function __construct($ticketType, $quantity) {
        $this->ticketType = $ticketType;
        $this->quantity = $quantity;
        $this->calculateDiscount();
        }

        private function calculateDiscount() {
        switch ($this->ticketType) {
            case 'Niño':
            $this->discount = 0.3;
            break;
            case 'Adulto':
            $this->discount = 0.05;
            break;
            case 'Adulto Mayor':
            $this->discount = 0.55;
            break;
        }
        }

        public function getTotalPrice() {
        $ticketPrice = 20; // Precio de la entrada
        return $ticketPrice * $this->quantity * (1 - $this->discount);
        }

        public function displayTicket() {
        echo '<div class="ticket">';
        echo '<img src="img/cine.jpg">'; 
        echo '<h2>Boleta de compra</h2>';        
        echo '<p>Tipo de entrada: ' . ucfirst($this->ticketType) . '</p>';
        echo '<p>Cantidad: ' . $this->quantity . '</p>';
        echo '<p>Precio por entrada: $20</p>';
        echo '<p>Descuento: ' . ($this->discount * 100) . '%</p>';
        echo '<p>Total a pagar: $' . $this->getTotalPrice() . '</p>';
        echo '</div>';
        }
    }

    // Verificacio envio  formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener el tipo de entrada y la cantidad
        $ticketType = $_POST['ticketType'];
        $quantity = $_POST['quantity'];

        // Crear objeto de la entrada y mostrar la boleta
        $ticket = new Ticket($ticketType, $quantity);
        $ticket->displayTicket();
    }
    ?>
