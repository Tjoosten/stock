<?php namespace Codivex\Generator;

use Carbon\Carbon;
use Form;

class GenerateService {
    protected static function typeGenerator($type){
        $out = "";
        switch($type)
        {
            case 0:
            case 'registration':
                $out = array('icon' => 'glyphicon-tag',
                    'title' => 'Product aangemaakt',
                    'status' => 'Geregistreerd'
                );
                break;
            case 1:
            case 'checkin':
                $out = array('icon' => 'glyphicon-ok',
                    'title' => 'Checkin stock',
                    'status' => 'Checkin'
                );
                break;
            case 2:
            case 'checkout':
                $out = array('icon' => 'glyphicon-send',
                    'title' => 'Checkout klant',
                    'status' => 'Checkout');
                break;
            case 3:
            case 'reparation':
                $out = array('icon' => 'glyphicon-wrench',
                    'title' => 'Product herstelling',
                    'status' => 'Herstelling');
                break;
            case 4:
            case 'replacement':
                $out = array('icon' => 'glyphicon-retweet',
                    'title' => 'Product vervanging',
                    'status' => 'Vervanging');
                break;
            case 5:
            case 'movement':
                $out = array('icon' => 'glyphicon-road',
                    'title' => 'Product overname',
                    'status' => 'Verplaatst');
                break;
            case 6:
            case 'comment':
                $out = array('icon' => 'glyphicon-comment',
                    'title' => 'Opmerking',
                    'status' => 'Opmerking');
                break;
            case 7:
            case 'forward':
                $out = array('icon' => 'glyphicon-send',
                    'title' => 'Forward',
                    'status' => 'Forward');
                break;
            case 8:
            case 'checkout-leverancier':
                $out = array('icon' => 'glyphicon-print',
                    'title' => 'Checkout leverancier',
                    'status' => 'Checkout leverancier');
                break;
        }
        return $out;
    }

    public static function getStatus($status)
    {
        $config = static::typeGenerator($status);
        return $config['status'];
    }

    public static function Log($type, $date, $message, $edit = null, Array $deleteLink = null)
    {
        $config = static::typeGenerator($type);
        $dateObject = new \DateTime($date);
        // Linux sudo locale -a doen
        setlocale(LC_TIME, 'nl_BE.utf8');
        $date = strftime("%A %e %B %Y", $dateObject->getTimestamp());

        $out = '<article><div class="date"><span class="glyphicon ' . $config['icon'] . '"></span></div>';
        $out .= '<div class="arrow-left"></div><div class="articleblock">';
        $out .= "<small class=\"pull-right\">$date</small>";
        $out .= '<h3>' . $config['title'] . '</h3>';
        $out .= '<p>' . $message . '</p>';

        if(isset($edit))
        {
            $out .= '<div class="pull-right"><a href="'. $edit .'">Wijzigen</a></div><div class="clearfix"></div>';
        }
        if(isset($deleteLink))
        {
            $out .= '<div class="pull-right"><a href="' . action($deleteLink[0], $deleteLink[1]) . '" data-method="delete" data-confirm="Bent u zeker? Dit event zal verwijderd worden.">Delete</a></div>';
            $out .= '<div class="clearfix"></div>';
            /*$out .= Form::open(array('action' => $deleteLink, 'method' => 'delete'));
            $out .= '<div class="pull-right">' . Form::submit('delete', ['class' => 'btn btn-codivex']) . '</div><div class="clearfix"></div>';
            $out .= Form::close();//*/
        }

        $out .= '</div></article>';
        return $out;
    }
}