<?php
/**
 * Created by PhpStorm.
 * User: AnhDuc
 * Date: 6/26/16
 * Time: 10:26 PM
 */

class ClientData
{
    private $facebookId;
    private $email;
    private $phoneNumber;

    public function __construct($facebookId, $email, $phoneNumber)
    {
        $this->facebookId = $facebookId;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @param mixed $facebookId
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}

class Users
{

}

abstract class AbstractLoginProcess
{
    /**
     * @var AbstractLoginProcess $abstractLoginProcess
     */
    private $nextAbstractLoginProcess;

    /**
     * Set next process
     * @param AbstractLoginProcess $abstractLoginProcess
     */
    public function setNextProcessValidate(AbstractLoginProcess $abstractLoginProcess)
    {
        $this->nextAbstractLoginProcess = $abstractLoginProcess;
    }

    public function getNextProcess()
    {
        return $this->nextAbstractLoginProcess;
    }

    abstract function tryLogin(ClientData $clientData);

    public function updateProfileUser(Users $user, ClientData $clientData)
    {
        echo 'Begin update profile with this user' . '<br>';
    }

    public function responseLoginSuccess()
    {
        echo 'Login success' . '<br>';
    }
}

class ValidateEmail extends AbstractLoginProcess
{


    function tryLogin(ClientData $clientData)
    {

        echo 'Begin validate with email ' . $clientData->getEmail(). '<br>';

        echo 'Validate with email fail <br>';

        echo '<br>';

        $nextProcess = $this->getNextProcess();

        if ( null !=  $nextProcess ) {
            $this->getNextProcess()->tryLogin($clientData);
        }
    }


}

class ValidatePhoneNumber extends AbstractLoginProcess
{
    function tryLogin(ClientData $clientData)
    {

        echo 'Begin validate with mobile phone ' . $clientData->getPhoneNumber() . '<br>';

        if (true) {
            echo 'Found user with this phoneNumber' . '<br>';
            $user = new Users();
            $this->updateProfileUser($user, $clientData);
            $this->responseLoginSuccess();

        } else {


            echo 'Validate with mobile phone fail<br>';

            echo '<br>';

            $nextProcess = $this->getNextProcess();

            if ( null !=  $nextProcess ) {
                $this->getNextProcess()->tryLogin($clientData);
            }
        }

    }

}

class ValidateFacebookId extends  AbstractLoginProcess
{

    function tryLogin(ClientData $clientData)
    {
        echo 'Begin validate with facebookId ' . $clientData->getFacebookId() . '<br>';

        if (false) {

        } else {

            echo 'Validate with facebookId fail<br>';
            echo '<br>';

            $nextProcess = $this->getNextProcess();

            if ( null !=  $nextProcess ) {
                $this->getNextProcess()->tryLogin($clientData);
            }
        }
    }

}


$clientData = new ClientData(12324, 'anhduc.bkhn@gmail.com', 984624542);

$facebookValidate = new ValidateFacebookId();
$phoneNumberValidate = new ValidatePhoneNumber();
$emailValidate = new ValidateEmail();

$facebookValidate->setNextProcessValidate($phoneNumberValidate);
$phoneNumberValidate->setNextProcessValidate($emailValidate);

$facebookValidate->tryLogin($clientData);

