<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link rel="icon" type="image/x-icon" href="../../admin/assets/img/nav-logo-1.png">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="../admin/assets/font-awesome/css/all.min.css">


    <!-- Vendor CSS Files -->
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../admin/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../admin/assets/vendor/owl.carousel/../admin/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../admin/assets/DataTables/datatables.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="../admin/assets/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../admin/assets/css/jquery-te-1.4.0.css">

    <script src="../admin/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/assets/DataTables/datatables.min.js"></script>
    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../admin/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../admin/assets/vendor/php-email-form/validate.js"></script>
    <script src="../admin/assets/vendor/venobox/venobox.min.js"></script>
    <script src="../admin/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../admin/assets/vendor/counterup/counterup.min.js"></script>
    <script src="../admin/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../admin/assets/font-awesome/js/all.min.js"></script>
    <script type="text/javascript" src="../admin/assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>Order Date</th>
                            <th>Name</th>
                            <th>Room No.</th>
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        include '../admin/db_connect.php';

                        // $qry = $conn->query("SELECT *, bd.user_name as bduname, o.address as addrs, o.status as stat FROM orders o 
                        // join user_info ui on ui.user_id = o.user_id
                        // join booking_order bo on bo.user_id = ui.user_id
                        // join booking_details bd on bd.booking_id = bo.booking_id");
                        
                        $qry = $conn->query("SELECT *, o.order_id as oid FROM orders o
					join booking_order bo on bo.booking_id = o.booking_id
					join booking_details bd on bd.booking_id = bo.booking_id");

                        while ($row = $qry->fetch_assoc()):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++ ?>
                                </td>
                                <td>
                                    <?php echo $row['date'] ?>
                                </td>
                                <td>
                                    <?php echo $row['user_name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['room_no'] ?>
                                </td>



                                <?php if ($row['status'] == 1): ?>
                                    <td class="text-center"><span class="badge badge-primary">Processing</span></td>
                                <?php elseif ($row['status'] == 2): ?>
                                    <td class="text-center"><span class="badge badge-warning">Ready to be Claim</span></td>
                                <?php elseif ($row['status'] == 3): ?>
                                    <td class="text-center"><span class="badge badge-success">Claimed</span></td>
                                <?php else: ?>
                                    <td class="text-center"><span class="badge badge-secondary">Pending</span></td>
                                <?php endif; ?>
                                <td>
                                    <button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>"
                                        data-orderid="<?php echo $row['oid'] ?>">View Order</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
</body>
<script>
	 window.start_load = function(){
    $('body').prepend('<div id="preloader2"></div>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
  $('.view_order').click(function () {
            uni_modal('Order', 'view_orders.php?id=' + $(this).attr('data-id') + '&order_id=' + $(this).attr('data-orderid'))
        })
</script>	
</body>

</html>