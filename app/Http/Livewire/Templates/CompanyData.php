<?php

namespace App\Http\Livewire\Templates;

use Exception;
use GusApi\Exception\InvalidUserKeyException;
use GusApi\Exception\NotFoundException;
use GusApi\GusApi;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CompanyData extends Component
{
    public $prefix;
    public $entity;
    public $data;

    public function mount($prefix = null, $entity = null)
    {
        if ($prefix) {
            $prefix = $prefix . "_";
        }

        if ($entity->id) {
            $this->data = [
                'nip' => $entity[$prefix . 'nip'],
                'name' => $entity[$prefix . 'name'],
                'address' => $entity[$prefix . 'address'],
                'postcode' => $entity[$prefix . 'postcode'],
                'city' => $entity[$prefix . 'city'],
            ];
        } else {
            $this->data = [
                'nip' => null,
                'name' => null,
                'address' => null,
                'postcode' => null,
                'city' => null,
            ];
        }

        $this->prefix = $prefix;
        $this->entity = $entity;
    }

    public function render()
    {
        return view('templates.company_data.form', [
            'entity' => $this->entity,
        ]);
    }

    /**
     * @throws Exception
     */
    public function searchByNIP()
    {
        $nipToCheck = $this->data['nip'];

        $validator = Validator::make(['nip' => $nipToCheck], [
            'nip' => nipRules()
        ]);

        if (!$validator->fails()) {
            $gus = new GusApi(env('GUS_API_KEY'));

            try {
                $gus->login();

                $gusReports = $gus->getByNip($nipToCheck);
                $gusReport = $gusReports[0];

                $this->data = [
                    'nip' => $gusReport->getNip(),
                    'name' => $gusReport->getName(),
                    'address' => $gusReport->getStreet() . ' ' . $gusReport->getPropertyNumber() . ($gusReport->getApartmentNumber() ? '/' . $gusReport->getApartmentNumber() : ''),
                    'postcode' => $gusReport->getZipCode(),
                    'city' => $gusReport->getPostCity(),
                ];
            } catch (InvalidUserKeyException $e) {
                throw new Exception('Usługa niedostępna');
            } catch (NotFoundException $e) {
                throw new Exception('Nie ma takiego numeru NIP');
            }
        } else {
            throw new Exception($validator->getMessageBag()->getMessages()['nip'][0]);
        }
    }
}
