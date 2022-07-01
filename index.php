<?php

abstract class Payment{
    abstract public function Remittance(): Money;

    public function payment()
    {
        $network= $this->Remittance();
        $network->operation();
    }
}

class Cash extends Payment
{
    public function Remittance(): Money
    {
        return new Cash();
    }
}

class PayPal extends Payment
{
    public function Remittance(): Money
    {
        return new PayPal();
    }
}
interface Money
{
    public function operation();
}

class Cash implements Money
{
    public function operation()
    {
        return "{Result of Cash payment}";
    }
}

class PayPal implements Money
{
    public function operation()
    {
        return"{Result of PayPal payment}";
    }
}

function clientCodes(Creator $creator){
    echo "Client: I'm not aware of the creator's class, but it still works.\n"
        . $creator->payment();
}

clientCodes(new Cash());
clientCodes(new PayPal());