<?php
/**
 * Created by PhpStorm.
 * User: AnhDuc
 * Date: 6/20/16
 * Time: 9:59 PM
 */

abstract class Coupon
{
    public function getExpiryDate()
    {

    }

    public function getDiscountMoney()
    {

    }
}

class FacebookCoupon extends Coupon
{

}
class EmailCoupon extends Coupon
{

}
class CouponFactory
{
    /**
     * @var SimpleFactory $simpleFactory
     */
    public $simpleFactory;

    public function __construct()
    {
        $this->simpleFactory = new SimpleFactory();
    }

    public function procedureCoupon($type)
    {
        $coupon = $this->simpleFactory->processCoupon($type);

        $coupon->getExpiryDate();
        $coupon->getDiscountMoney();

        return $coupon;
    }
}
class SimpleFactory
{
    public function processCoupon($type)
    {
        switch ($type) {
            case 'facebook':
                $coupon = new FacebookCoupon() ;
                break;
            case 'email':
                $coupon = new EmailCoupon() ;
                break;
            default:
                $coupon = null;
        }

        $coupon->getDiscountMoney();
        $coupon->getExpiryDate();

        return $coupon ;
    }
}


//Test
$facebookCoupon = new CouponFactory();
$facebookCoupon->procedureCoupon('facebook');