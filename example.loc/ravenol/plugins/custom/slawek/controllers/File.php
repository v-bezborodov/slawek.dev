<?php namespace Custom\Slawek\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * File Back-end Controller
 */
class File extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Custom.Slawek', 'slawek', 'file');
    }

    public function searchFiles()
    {
        return Redirect::to('/registration' );
//        return View::make('acme.blog::greeting', ['name' => 'Charlie']);
    }

    public function index()
    {
        return dd(123);
    }

}
