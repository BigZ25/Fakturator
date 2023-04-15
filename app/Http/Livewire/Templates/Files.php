<?php

namespace App\Http\Livewire\Templates;

use Livewire\Component;
use Livewire\WithFileUploads;

class Files extends Component
{
    use WithFileUploads;

    public $files = [];
    public $files_count_max;
    public $allowed_extensions;

    public function mount($files_count_max = null, $allowed_extensions = null)
    {
        $this->files_count_max = $files_count_max;
        $this->allowed_extensions = $allowed_extensions;
    }

    public function render()
    {
        if ($this->files_count_max !== null && count($this->files) > $this->files_count_max) {
            $this->removeLastFiles();
        }

        return view('templates.files');
    }

//    public function addMessage()
//    {
//        if (!empty($this->files)) {
//            foreach ($this->files as $uploadFile) {
//                $file = new File();
//
//                $fileName = md5(Str::random(32));
//
//                if ($this->categories === true) {
//                    $file->category = $this->fileCategory;
//                } else {
//                    $file->category = FileTypesEnum::OTHER;
//                }
//
//                $file->name = $fileName;
//                $file->original_name = str_replace('.' . $uploadFile->getClientOriginalExtension(), '', $uploadFile->getClientOriginalName());
//                $file->extension = $uploadFile->getClientOriginalExtension();
//                $file->size = formatBytes($uploadFile->getSize(), 2);
//                $file->key = md5(Str::random(32));
//                $file->save();
//
//                $fileName = $file->id . '_' . md5(Str::random(32));
//
//                $file->update(['name' => $fileName]);
//
//                $uploadFile->storeAs(null, $fileName, 'uploads');
//
//                MessageFile::create(['message_id' => $message->id, 'file_id' => $file->id]);
//            }
//        }
//
//        $this->files = [];
//        $this->text = '';
//    }

    public function removeFile($index)
    {
        array_splice($this->files, $index);
    }

    public function removeLastFiles()
    {
        foreach ($this->files as $index => $file) {
            if ($index >= $this->files_count_max) {
                $this->removeFile($index);
            }
        }
    }
}
