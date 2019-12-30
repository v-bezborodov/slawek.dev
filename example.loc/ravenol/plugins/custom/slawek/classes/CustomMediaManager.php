<?php
namespace Custom\Slawek\Classes;


use Url;
use Str;
use Lang;
use Cache;
use Config;
use Storage;
use Request;
use System\Classes\MediaLibraryItem;
use System\Classes\MediaLibrary;
use ApplicationException;
use SystemException;

class CustomMediaManager extends MediaLibrary
{

    public function findFilesCustom($path, $searchTerm, $sortBy = 'title', $filter = null)
    {
        $words = explode(' ', Str::lower($searchTerm));
        $result = [];

        $findInFolder = function ($folder) use (&$findInFolder, $words, &$result, $sortBy, $filter) {
            $folderContents = $this->listFolderContents($folder, $sortBy, $filter);

            foreach ($folderContents as $item) {
                if ($item->type == MediaLibraryItem::TYPE_FOLDER) {
                    $findInFolder($item->path);
                }
                elseif ($this->pathMatchesSearch($item->path, $words)) {
                    $result[] = $item;
                }
            }
        };

        $findInFolder($path);

        /*
         * Sort the result
         */

        if ($sortBy !== false) {
            $this->sortItemList($result, $sortBy);
        }

        return $result;
    }


}