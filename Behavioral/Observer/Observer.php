<?php
/**
 * Created by PhpStorm.
 * User: anhduckhn
 * Date: 12/21/16
 * Time: 10:20 AM
 */

class EmailNotification implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo 'Email is listening... serviceName is: ' . $subject->getName() . '<br>';
    }
}

class SlackNotification implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo 'Slack is listening... serviceName is: ' . $subject->getName() . '<br>';
    }
}

class Logger implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.

        echo 'Logger is listening... serviceName is: ' . $subject->getName() . '<br>';
    }
}

class Service implements SplSubject
{
    private $storageObServer;
    private $serviceName;

    public function __construct($name)
    {
        $this->serviceName = $name;
        $this->storageObServer = [];
    }

    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
        $this->storageObServer[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.

        foreach ( $this->storageObServer as $key => $server)
        {
            if ($observer == $server) {
                unset($this->storageObServer[$key]);
            }
        }
    }

    public function notify()
    {
        // TODO: Implement notify() method.

        foreach ($this->storageObServer as $obServer)
        {
            $obServer->update($this);
        }
    }

    public function save()
    {
        $this->notify();
    }

    public function getName()
    {
        return $this->serviceName;
    }

}

// Run test
$service = new Service('Spa body');

$service->attach(new EmailNotification());
$service->attach(new SlackNotification());
$service->attach(new Logger());

$service->save();
