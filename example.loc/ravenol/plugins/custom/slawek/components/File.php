<?php
namespace Custom\Slawek\Components;

use Cms\Classes\ComponentBase;
use Custom\Slawek\Classes\CustomMediaManager;
use Illuminate\Pagination\LengthAwarePaginator;


class File extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'File',
            'description' => 'File manager'
        ];
    }

    public function defineProperties()
    {
        return [
            'path' => [
                'description'       => 'Path where plugin will list them (sholuld be located in \media)',
                'title'             => 'Path',
                'default'           => 'custom-media',
                'type'              => 'string',
            ],
            'per-page' => [
                'description'       => 'Pagination param',
                'title'             => 'Per page',
                'default'           => 10,
                'type'              => 'string',
            ]
        ];
    }

    public function onFilesCustomSearch()
    {
        $search=post('search',[]);
        $per_page = $this->property('per-page');
        $path = $this->property('path');
        $sortBy = array("by" => "title", "direction" => "asc");
        $mediaLib =  CustomMediaManager::instance();
        $files = $mediaLib->listFolderContents($path, $sortBy, '', false);

        if($search) {
            $files = $mediaLib->findFilesCustom($path, $search,  $sortBy,'');
        }
        foreach ($files as $file) {
            $file->filename = basename($file->path);
            preg_match('/(?<=^Pi_)([\d]+)(?<!_)/', $file->filename, $matches);
            $file->art = $matches[0] ?? '-';
        }
        $collection = collect($files);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageResults = $collection->slice(($currentPage-1) * $per_page, $per_page)->all();
        $result = new LengthAwarePaginator($currentPageResults, count($collection), $per_page);
        $result->setPath($this->currentPageUrl());
        $this->page['filelist'] = $result;
    }

    public function onGalleryCustomSearch()
    {
        $search=post('search',[]);
        $per_page = $this->property('per-page');
        $path = $this->property('path');
        $sortBy = array("by" => "title", "direction" => "asc");
        $mediaLib =  CustomMediaManager::instance();
        $files = $mediaLib->listFolderContents($path, $sortBy, '', false);

        if($search) {
            $files = $mediaLib->findFilesCustom($path, $search,  $sortBy,'');
        }

        foreach ($files as $file) {
            $file->filename = pathinfo($file->path, PATHINFO_FILENAME);
        }

        $collection = collect($files);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageResults = $collection->slice(($currentPage-1) * $per_page, $per_page)->all();
        $result = new LengthAwarePaginator($currentPageResults, count($collection), $per_page);
        $result->setPath($this->currentPageUrl());
        $this->page['filelist'] = $result;
    }

}
