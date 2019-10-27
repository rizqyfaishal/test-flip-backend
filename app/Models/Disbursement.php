<?php 

namespace App\Models;

use App\Models\Model;

class Disbursement extends Model {
  protected $tableName = 'disbursements';

  protected $fillable = 
    ['id', 'amount', 'status', 'timestamp', 'bank_code', 'account_number',
    'beneficiary_name', 'remark', 'receipt', 'time_served', 'fee'];


  protected $visible = ['id', 'amount', 'status', 'timestamp', 'bank_code', 'account_number',
    'beneficiary_name', 'remark', 'receipt', 'time_served', 'fee'];


  static function all() {
    $visible = ['id', 'amount', 'status', 'timestamp', 'bank_code', 'account_number',
      'beneficiary_name', 'remark', 'receipt', 'time_served', 'fee'];

    return self::allQuery('disbursements', $visible);
  }

  static function find($id) {
    $visible = ['id', 'amount', 'status', 'timestamp', 'bank_code', 'account_number',
      'beneficiary_name', 'remark', 'receipt', 'time_served', 'fee'];

    return self::findQuery($id, 'disbursements', $visible);
  }


}
