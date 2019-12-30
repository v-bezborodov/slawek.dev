<?php
namespace Custom\Slawek;

use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;



/**
 * slawek Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'slawek',
            'description' => 'Custom plugin for managing Custom Theme',
            'author'      => 'custom',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        UserModel::extend(function ($model) {
            $model->addFillable([
                'company',
                'city',
                'phone',
            ]);
        });

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            \Custom\Slawek\Components\User::class => 'user',
            \Custom\Slawek\Components\File::class => 'fileCustom',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'custom.slawek.some_permission' => [
                'tab' => 'slawek',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'slawek' => [
                'label'       => 'slawek',
                'url'         => Backend::url('custom/slawek/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['custom.slawek.*'],
                'order'       => 500,
            ],
        ];
    }
}
