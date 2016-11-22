<?php
/**
 * Created by PhpStorm.
 * User: anhduckhn
 * Date: 11/22/16
 * Time: 1:57 PM
 */

class Appointment
{
    public function __construct($appointmentID)
    {
        echo "init new appointment <br>" ;
    }
}

class Order
{
    public function __construct(Appointment $appointment)
    {
        echo "init new order <br>";
    }
}

class Reception
{
    public function __construct(Order $order)
    {
        echo "init new reception <br>";
    }
}

//Bad code

$id = 1;

$newAppointment = new Appointment($id);
$newOrder = new Order($newAppointment);
$newReception = new Reception($newOrder);

//Better code
class AppointmentFacade
{
    private $appointment;
    private $order;

    public function __construct($appointmentId)
    {
        echo "-----init facade-----<br>";
        $this->appointment = new Appointment($appointmentId);
    }

    public function processAppointment()
    {
        $this->processOrder();
        $this->processReception();
    }

    private function processOrder()
    {
        $this->order = new Order($this->appointment);
    }

    private function processReception()
    {
        new Reception($this->order);
    }
}

$idAppointment = 1;

$appointmentFacade = new AppointmentFacade($idAppointment);
$appointmentFacade->processAppointment();





