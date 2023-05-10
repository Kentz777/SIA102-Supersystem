<html>

<body>

    <head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Assistant');

            body {
                background: #eee;
                font-family: Assistant, sans-serif;
                margin: 130px;
            }

            .cell-1 {
                border-collapse: separate;
                border-spacing: 0 4em;
                background: #fff;
                border-bottom: 5px solid transparent;
                /*background-color: gold;*/
                background-clip: padding-box;
            }

            thead {
                background: #dddcdc;
            }

            .toggle-btn {
                width: 40px;
                height: 21px;
                background: grey;
                border-radius: 50px;
                padding: 3px;
                cursor: pointer;
                -webkit-transition: all 0.3s 0.1s ease-in-out;
                -moz-transition: all 0.3s 0.1s ease-in-out;
                -o-transition: all 0.3s 0.1s ease-in-out;
                transition: all 0.3s 0.1s ease-in-out;
            }

            .toggle-btn>.inner-circle {
                width: 15px;
                height: 15px;
                background: #fff;
                border-radius: 50%;
                -webkit-transition: all 0.3s 0.1s ease-in-out;
                -moz-transition: all 0.3s 0.1s ease-in-out;
                -o-transition: all 0.3s 0.1s ease-in-out;
                transition: all 0.3s 0.1s ease-in-out;
            }

            .toggle-btn.active {
                background: blue !important;
            }

            .toggle-btn.active>.inner-circle {
                margin-left: 19px;
            }
        </style>
    </head>

    <div class="col-md-10">
        <div class="rounded">
            <div class="table-responsive table-borderless">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="9" style="background-color:black; color:white;">Orders</th>
                        </tr>
                        <tr>
                            <th class="text-center">


                            </th>
                            <th>Order #</th>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>status</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        <?php
                        if (isset($_SESSION['login_user_id'])) {
                            $data = "where bd.room_no = '" . $_SESSION['login_room_no'] . "' ";
                        } else {
                            $ip = isset($_SERVER['HTTP_CLIENT_IP'])
                                ? $_SERVER['HTTP_CLIENT_IP']
                                : (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
                                    ? $_SERVER['HTTP_X_FORWARDED_FOR']
                                    : $_SERVER['REMOTE_ADDR']);
                            $data = "where c.client_ip = '" . $ip . "' ";
                        }

                        // $qry = "SELECT ol.order_id as orderid, pl.name as prodname, ol.qty as qty, o.status as stat, ol.amount as amount, o.date as date FROM user_info ui
                        // join booking_order bd on bd.user_id = ui.user_id
                        // join orders o on o.user_id = bd.user_id
                        // join order_list ol on ol.order_id = o.order_id
                        // join product_list pl on pl.id = ol.product_id ".$data;
                        
                        $qry = "SELECT ol.order_id as orderid, pl.name as prodname, ol.qty as qty, o.status as stat, ol.amount as amount, o.date as date FROM booking_details bd
                            join booking_order bo on bd.booking_id = bo.booking_id
                            join orders o on o.user_id = bo.user_id
                            join order_list ol on ol.order_id = o.order_id
                            join product_list pl on pl.id = ol.product_id " . $data;


                        $get = $conn->query($qry);
                        while ($row = $get->fetch_assoc()): ?>
                            <tr class="cell-1">
                                <td class="text-center"></td>
                                <td>
                                    <?php echo $row['orderid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['prodname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['qty'] ?>
                                </td>
                                <td id="status-<?php echo $row['orderid'] ?>" class="text-center">
                                    <?php if ($row['stat'] == 1): ?>
                                        <span class="badge badge-primary">Processing</span>
                                    <?php elseif ($row['stat'] == 2): ?>
                                        <span class="badge badge-warning">Ready to be Claim</span>
                                    <?php elseif ($row['stat'] == 3): ?>
                                        <span class="badge badge-success">Claimed</span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary">Pending</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php echo $row['amount'] ?>
                                </td>
                                <td>
                                    <?php echo $row['date'] ?>
                                </td>
                                <?php if ($row['stat'] != 3): ?>
                                    <td>
                                        <?php if ($row['stat'] == 2): ?>
                                            <button class="status-btn" data-orderid="<?php echo $row['orderid'] ?>"
                                                data-status="<?php echo $row['stat'] ?>">Claim in 1 min</button>
                                        <?php else: ?>
                                            <button class="status-btn" data-orderid="<?php echo $row['orderid'] ?>">Claim</button>
                                        <?php endif; ?>
                                    </td>
                                <?php else: ?>
                                    <td><button class="status-btn" disabled
                                            data-orderid="<?php echo $row['orderid'] ?>">Claimed</button>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.status-btn').click(function () {
                var orderId = $(this).attr('data-orderid');
                var button = $(this);
                var orderStatus = $(this).attr('data-status');

                if (confirm('Are you sure you want to claim this order?')) {
                    button.attr('disabled', 'disabled').text('Claiming...');
                    $.ajax({
                        url: 'update_status.php',
                        method: 'POST',
                        data: { orderId: orderId },
                        success: function (response) {
                            console.log(response);
                            $('#status-' + orderId).html('<span class="badge badge-success">Claimed</span>');
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        }
                    });
                }
                if (orderStatus == 2) {
                    setTimeout(function () {
                        $.ajax({
                            url: 'update_status.php',
                            method: 'POST',
                            data: { orderId: orderId },
                            success: function (response) {
                                console.log(response);
                                $('#status-' + orderId).html('<span class="badge badge-success">Claimed</span>');
                                button.attr('disabled', true).text('Claimed');
                            },
                            error: function (xhr, status, error) {
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            }
                        });
                    }, 60000);
                }
            });
        });
    </script>

</body>

</html>