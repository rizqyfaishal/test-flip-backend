<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
</head>
<body>
  <form method="POST" action="/disbursements">
    <p>Create new disbursement</p>
    <div class="field">
      <fieldset>
        <input name="bank_code" placeholder="Bank Code" required />
        <input name="account_number" placeholder="Account Number" required />
        <input name="amount" placeholder="Amount" required />
        <input name="remark" placeholder="Remark" required />
        <input type="submit" name="create" value="Create">
      </fieldset>
      <?php if(isset($error)) { echo "Error. Something Happen"; }?>
    </div>
    
  </form>
  <div class="list">
    <table>
      <thead>
        <tr>
          <td>ID</td>
          <td>Amount</td>
          <td>Status</td>
          <td>Timestamp</td>
          <td>Bank Code</td>
          <td>Account Number</td>
          <td>Beneficiary Name</td>
          <td>Remark</td>
          <td>Receipt</td>
          <td>Time Served</td>
          <td>Fee</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($disbursements as $disbursement ) {
        ?>
            <tr>
              <td><?php echo $disbursement['id']; ?></td>
              <td><?php echo $disbursement['amount']; ?></td>
              <td><?php echo $disbursement['status']; ?></td>
              <td><?php echo $disbursement['timestamp']; ?></td>
              <td><?php echo $disbursement['bank_code']; ?></td>
              <td><?php echo $disbursement['account_number']; ?></td>
              <td><?php echo $disbursement['beneficiary_name']; ?></td>
              <td><?php echo $disbursement['remark']; ?></td>
              <td><?php echo $disbursement['receipt']; ?></td>
              <td><?php echo $disbursement['time_served']; ?></td>
              <td><?php echo $disbursement['fee']; ?></td>
              <td><a href="/disbursements/<?php echo $disbursement['id']; ?>">View</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php if(!$disbursements) {
      echo '<p>No data</p>';
    }?>
  </div>
  <style type="text/css">
    form {
      max-width: 300px;
    }

    div.list {
      margin-top: 2rem;
    }

    div.list table {
      width: 100%;
      border: 1px solid #000;
      border-collapse: separate;

    }

    div.list p {
      text-align: center;
    }

    div.list table tr > td{
      border: 1px solid #000;
    }
  </style>
</body>
</html>
