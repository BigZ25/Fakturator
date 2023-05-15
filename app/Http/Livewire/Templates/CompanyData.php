<?php

namespace App\Http\Livewire\Templates;

use App\Models\Modules\Customers\Customer;
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
    public $datalist;
    public $data;
    public $lists;
    public $customers;

    public function mount($prefix = null, $entity = null, $datalist = false)
    {
        if ($prefix) {
            $prefix = $prefix . "_";
        }

        $this->prefix = $prefix;
        $this->entity = $entity;
        $this->datalist = $datalist;

        $this->lists = [
            'customers' => Customer::getSelectList(),
        ];
        $this->customers = Customer::query()
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        if ($entity) {
            $this->data = [
                'nip' => $entity[$prefix . 'nip'],
                'name' => $entity[$prefix . 'name'],
                'address' => $entity[$prefix . 'address'],
                'postcode' => $entity[$prefix . 'postcode'],
                'city' => $entity[$prefix . 'city'],
                'connect' => true,
                'customer_id' => null,
            ];
        } else {
            $this->data = [
                'nip' => null,
                'name' => null,
                'address' => null,
                'postcode' => null,
                'city' => null,
                'connect' => true,
                'customer_id' => null,
            ];
        }
    }

    public function render()
    {
        if ($this->datalist === true) {
            $this->checkName();
        }

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

                $this->data['nip'] = $gusReport->getNip();
                $this->data['name'] = $gusReport->getName();
                $this->data['address'] = $gusReport->getStreet() . ' ' . $gusReport->getPropertyNumber() . ($gusReport->getApartmentNumber() ? '/' . $gusReport->getApartmentNumber() : '');
                $this->data['postcode'] = $gusReport->getZipCode();
                $this->data['city'] = $gusReport->getPostCity();

            } catch (InvalidUserKeyException $e) {
                throw new Exception('Usługa niedostępna');
            } catch (NotFoundException $e) {
                throw new Exception('Nie ma takiego numeru NIP');
            }
        } else {
            throw new Exception($validator->getMessageBag()->getMessages()['nip'][0]);
        }
    }

    private function checkName()
    {
        if ((bool)$this->data['connect'] === true) {
            $customer = $this->customers->firstWhere('name', '=', $this->data['name']);

            if ($customer) {
                $this->data['customer_id'] = $customer->id;
                $this->data['nip'] = $customer->nip;
                $this->data['address'] = $customer->address;
                $this->data['postcode'] = $customer->postcode;
                $this->data['city'] = $customer->city;
            } else {
                $this->data['customer_id'] = null;
            }
        }
    }

    public function setLock()
    {
        $this->data['connect'] = !(bool)$this->data['connect'];

        if ($this->data['connect'] === false) {
            $this->data['customer_id'] = null;
        }
    }
}
