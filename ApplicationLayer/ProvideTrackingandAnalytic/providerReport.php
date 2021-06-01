
<?php
session_start();
    // $_SESSION = [];
require_once '../../BusinessServiceLayer/controller/paymentController.php';
require_once '../../BusinessServiceLayer/controller/customerController.php';
require_once '../../BusinessServiceLayer/controller/runnerController.php';
require_once '../../BusinessServiceLayer/controller/trackingController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
$tracking = new trackingController();
$tracking_data = $tracking->viewTrackingList();
$runner_id = "";
$date = "";
if (is_array($tracking_data) || is_object($tracking_data)){
foreach ($tracking_data as $row1) {
  $tracking_id = $row1['tracking_ID'];
  $runner_id = $row1['runner_id'];
}
$status_data = $tracking->viewStatus($tracking_id);
foreach ($status_data as $roww) {
  $date = $roww['tracking_date'];
}

}
$runner = new runnerController();
$runner_data = $runner->viewRunner($runner_id);
$runner_name = "";
$runner_phone = "";

if (is_array($runner_data) || is_object($runner_data)){
foreach ($runner_data as $row2) {
  $runner_name = $row2['runner_name'];
  $runner_phone = $row2['runner_phone'];
}
}

$customer = new customerController();
$cust_data = $customer->viewCustomer();
foreach ($cust_data as $row3) {
  $name = $row3['cust_name'];
  $phone = $row3['cust_phone'];
}

$payment = new paymentController();
$data = $payment->viewPayment();
// $data = $cart->viewAll();



?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>

<title>Report</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<style>
table.table-dark {
  border-collapse: collapse;
  width: 75%;
  border: 1px solid #ddd;
}
</style>


<?php include"../../includes/head.php";?>
<body>
  <div class="wrapper" id="wrapper">
    <?php 
    include "../../includes/header.php";
    ?>
      
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title"><b>Service Provider</b></h2>
              <nav class="bradcaump-inner">
                
                <span class="breadcrumb-item active">Service Provider Report</span>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="container-fluid">
          <div class="card-heading">
            <h2 class="title">Report</h2>
          </div>
          <div class="card-body">
            <center>
              <form action="" method="POST">
              <table class="table table-bordered table-dark">
                <thead>
                  <th>Date</th>
                  <th>Customer Name</th>
                  <th>Phone</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Runner Name</th>
                  <th>Runner Phone</th>
                  <th>Status</th>
                  
                  
              </div>
                </thead>
                <?php
                if ($row['order_status'] = 1) {
                  $status = "Paid";
                }
                $i = 1;
                if (is_array($data) || is_object($data)){
                  foreach($data as $row){
                    $image =  $row['product_image'];
                    $isrc = "../../images/"; ?>
                    <form action="" method="POST">
                    <?php
                    echo "<tr>"
                    . "<td>".$date."</td>"
                    . "<td>".$name."</td>"
                    . "<td>".$phone."</td>"
                    . "<td>".$row['product_name']."</td>"
                    . "<td><img src=\"" .$isrc. $row['product_image'] . "\" height=\"130\" width=\"150\"> </td>"
                    . "<td>".$runner_name."</td>"
                    . "<td>".$runner_phone."</td>"
                    . "<td>".$status."</td>";    ?>                     
                    </td>
                    <?php
                    $i++;
                    echo "</tr>";
                    ?>


                    </form>
                    <?php
                  }
                }                
                ?>



                
              </table>
              
              <br></br>
              <div class="text-centre">
                   <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
                </div>
            </form>
            
            
              </div>

            </center>
          </div>
        </div>
      </div>
    </section>
  </center>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

