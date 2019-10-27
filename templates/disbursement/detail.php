<!DOCTYPE html>
<html>
<head>
  <title>Disbursement - <?php echo $id; ?></title>
</head>
<body>
  <h2>Disbursement - <?php echo $disbursement['id']; ?></h2>
  <form method="POST" action="/disbursements/<?php echo $disbursement['id']; ?>">
    <input type="submit" value="Refresh Status" />
  </form>

  <table>
    <tr>
      <td>ID</td>
      <td><?php echo $disbursement['id']; ?></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><?php echo $disbursement['amount']; ?></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><?php echo $disbursement['status']; ?></td>
    </tr>
    <tr>
      <td>Timestamp</td>
      <td><?php echo $disbursement['timestamp']; ?></td>
    </tr>
    <tr>
      <td>Bank Code</td>
      <td><?php echo $disbursement['bank_code']; ?></td>
    </tr>
    <tr>
      <td>Account Number</td>
      <td><?php echo $disbursement['account_number']; ?></td>
    </tr>
    <tr>
      <td>Beneficiary Name</td>
      <td><?php echo $disbursement['beneficiary_name']; ?></td>
    </tr>
    <tr>
      <td>Remark</td>
      <td><?php echo $disbursement['remark']; ?></td>
    </tr>
    <tr>
      <td>Receipt</td>
      <td><?php echo $disbursement['receipt']; ?></td>
    </tr>
    <tr>
      <td>Time Served</td>
      <td><?php echo $disbursement['time_served']; ?></td>
    </tr>
    <tr>
      <td>Fee</td>
      <td><?php echo $disbursement['fee']; ?></td>
    </tr>
  </table>
  <a href="/disbursements">Back to list</a>
  <style type="text/css">
    table {
      margin-top: 1rem;
      border: 1px solid #000;
      border-collapse: separate;

    }

    table tr td {
      border: 1px solid #000;
    }
  </style>
</body>
</html>
