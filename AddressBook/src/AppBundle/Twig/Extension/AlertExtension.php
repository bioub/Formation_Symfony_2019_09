<?php


namespace AppBundle\Twig\Extension;


use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Twig\Extension\AbstractExtension;

class AlertExtension extends AbstractExtension
{
    /** @var FlashBagInterface */
    protected $flashBag;

    public function __construct(FlashBagInterface $flashBag)
    {
        $this->flashBag = $flashBag;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('alertSuccess', [$this, 'getAlertSuccess'], ['is_safe' => ['html']])
        ];
    }

    public function getAlertSuccess()
    {
        $html = '';

        foreach ($this->flashBag->get('success') as $message) {
            $html .= "<div class=\"alert alert-success\">$message</div>";
        }

        return $html;
    }
}