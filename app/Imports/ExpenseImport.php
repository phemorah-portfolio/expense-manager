<?php

namespace App\Imports;

use App\Models\Expense;
use App\Models\Merchant;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Phpoffice\PhpSpreadsheet\Shared\Date;

class ExpenseImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $row['date'] = Date::excelToDateTimeObject($row['date'])->format('Y-m-d');

        $model = new Merchant();
        $model->name = $row['merchant'];

        $merchant = Merchant::where(['name' => $row['merchant']])->first();
        if($merchant){
            $merchant_id = $merchant->id;
        }
        else{
            $model->save();
            $merchant_id = $model->id;
        }

        return new Expense([
            'total' => $row['total'],
            'merchant_id' => $merchant_id,
            'date' => $row['date'],
            'status' => $row['status'],
            'comment' => $row['comment'],
        ]);
    }
}
