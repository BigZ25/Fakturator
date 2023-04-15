<?php


use App\Enum\App\FileTypesEnum;

function groupBy($key, $data): array
{
    $result = array();

    foreach ($data as $val) {
        $result[$val[$key]][] = $val;
    }

    return $result;
}

function fileCategoryName($category)
{
    return FileTypesEnum::getList($category);
}

function removeFileFromListById($files, $id)
{
    foreach ($files as $index => $file) {
        if ($file['id'] === $id) {
            unset($files[$index]);
        }
    }

    return $files;
}

//function groupedFilesIds($files)
//{
//    $ids = [];
//
//    foreach ($files as $i => $category) {
//        foreach ($category as $j => $file) {
//            $ids[] = $file['id'];
//        }
//    }
//
//    return $ids;
//}
