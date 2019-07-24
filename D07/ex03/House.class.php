<?php 
    abstract class House {
        abstract public function getHouseName();
        abstract public function getHouseMotto();
        abstract public function getHouseSeat();
        public function introduce()
        {
            echo "House ";
            echo $this->getHouseName();
            echo " of ";
            echo $this->getHouseSeat();
            echo " : \"";
            echo $this->getHouseMotto();
            echo "\"".PHP_EOL;
        }

    }
?>