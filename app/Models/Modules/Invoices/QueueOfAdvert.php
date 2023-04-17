<?php

namespace App\Models\Modules\Invoices;

use App\Enum\Modules\Invoices\InvoiceOperationsEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueueOfInvoice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'params',
        'operation',
        'response_code',
        'response_message',
        'created_at',
        'executed_at',
    ];

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'id', 'invoice_id')->withTrashed();
    }

    public function getOperationTextAttribute()
    {
        return InvoiceOperationsEnum::getList($this->operation);
    }

    public function getSuccessTextAttribute()
    {
        if ($this->response_code === null) {
            return "-";
        }

        if ($this->response_code === 200) {
            return "Tak";
        }

        return "Nie";
    }

    public function getData()
    {

    }

    public static function searchField()
    {
        return "( SELECT CONCAT_WS(' ','Funko Pop',production,production_number,name,`condition`,CONCAT('#',item_number)) FROM invoices WHERE invoices.id = invoice_id)";
    }

}
