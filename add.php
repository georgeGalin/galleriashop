<?php
function add($id,$qt,$vt) {

//Ottengo la lunghezza dell'array
$position=count($this->id);
$trovato=0;

for ($i=0;$i<count($this->id);$i++) {
//Verifico se il prodotto è presente nel carrello
if ($this->id[$i]==$id) $trovato=1;
}

//Se il prodotto è già presente aggiorno quantità e variante
if ($trovato==1) $this->update($id,$qt,$vt);
else {//altrimenti aggiungo il prodotto al carrello
$this->id[$position]=$id;
$this->qt[$position]=$qt;
$this->vt[$position]=$vt;
}

}


// La funzione update che mi permetterà di modificare la quantità dei prodotti o, eventualmente, delle varianti:

    function update($id,$qt,$vt) {

        $position = -1;
        
        for ($i=0;$i<count($this->id);$i++) {
        //Prelevo la posizione del prodotto nell'array
        if ($this->id[$i]==$id) $position=$i;
        }
        
        //Aggiorno le informazioni del prodotto
        $this->qt[$position]=$qt;
        $this->vt[$position]=$vt;
        
        if ($position==-1) echo "Impossibile aggiornare il prodotto,
        prodotto non trovato!<br><br>";
        
        }

//La funzione delete che mi permetterà di eliminare prodotti dal carrello:

    
        function delete($id) {

            $position = -1;
            
            for ($i=0;$i<count($this->id);$i++) {
            if ($this->id[$i]==$id) $position=$i;
            }
            
            if ($position!=-1) {
            
            $cont=0;
            
            for ($i=0;$i<count($this->id);$i++) {
            
            if ($this->id[$i]!=$id) {
            $app_id[$cont]=$this->id[$i];
            $app_qt[$cont]=$this->qt[$i];
            $app_vt[$cont]=$this->vt[$i];
            $cont++;
            }
            
            }
            
            unset($this->id);
            unset($this->qt);
            unset($this->vt);
            
            for ($i=0;$i<count($app_id);$i++) {
            $this->id[$i]=$app_id[$i];
            $this->qt[$i]=$app_qt[$i];
            $this->vt[$i]=$app_vt[$i];
            }
            
            }
            else echo "Impossibile cancellare il prodotto,
            prodotto non trovato!<br><br>";
            
            }




            // output a video
            function printcart() {

for ($i=0;$i<count($this->id);$i++) {

    echo "<b>ID:</b> " .$this->id[$i] ."<br>";
    echo "<b>QT:</b> " .$this->qt[$i] ."<br>";
    echo "<b>VT:</b> " .$this->vt[$i] ."<br><br>";
    
    }
    
    }


    //Vediamo come includere la classe in un nostro progetto ed effettuiamo un test:

    include("cart.php");

//Inizializziamo la classe
$cart = new cart();

//Aggiungo l'elemento con id 1
$cart->add(1,1,0);

//Aggiorno la quantità dell'elemento 1
$cart->update(1,2,1);

//Aggiungo l'elemento con id 2
$cart->add(2,1,0);

//Aggiungo l'elemento con id 3
$cart->add(3,1,0);

//Elimino l'elemento con id 2
$cart->delete(2);

//Stampo il contenuto del carrello
$cart->printcart();



?>