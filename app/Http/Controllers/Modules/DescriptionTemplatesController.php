<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;
use App\Enum\Modules\DescriptionTemplates\DescriptionTemplateParametersEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\DescriptionTemplates\DescriptionTemplateRequest;
use App\Models\Modules\DescriptionTemplates\DescriptionTemplate;
use Exception;
use Illuminate\Validation\ValidationException;

class DescriptionTemplatesController extends Controller
{
    public function store(DescriptionTemplateRequest $request)
    {
        $descriptionTemplate = DescriptionTemplate::first();

        $text = $request->input('text');

        $matches = [];
        $parameters = DescriptionTemplateParametersEnum::getList();

        preg_match_all('/[<][[:ascii:]]+[>]/', $text, $matches);

        foreach ($matches[0] as $match) {
            if (!in_array(str_replace(["<", ">"], "", $match), $parameters)) {
                throw new Exception("Nieznany parametr " . $match);
            }
        }

        if (!$descriptionTemplate) {
            DescriptionTemplate::create($request->validated());
        } else {
            $descriptionTemplate->update($request->validated());
        }

        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('description_template.index'));
    }
}
