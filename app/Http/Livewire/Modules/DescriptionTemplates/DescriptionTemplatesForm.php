<?php

namespace App\Http\Livewire\Modules\DescriptionTemplates;

use App\Enum\Modules\DescriptionTemplates\DescriptionTemplateParametersEnum;
use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\DescriptionTemplates\DescriptionTemplate;

class DescriptionTemplatesForm extends BaseFormComponent
{
    public function mount()
    {
        $this->title = 'Edycja wzoru opisu';
        $this->view_path = 'modules.description_templates.form';
        $this->currentModule = 'description_template';

        $descriptionTemplate = DescriptionTemplate::first();

        if (!$descriptionTemplate) {
            $descriptionTemplate = new DescriptionTemplate();
        }

        $parameters = DescriptionTemplateParametersEnum::getTranslations();

        $this->data = compact('descriptionTemplate','parameters');
    }

    public function render()
    {
        return parent::render();
    }
}
