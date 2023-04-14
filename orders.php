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
                            <th colspan="8" style="background-color:black; color:white;">Orders</th>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        <?php
                        if (isset($_SESSION['login_user_id'])) {
                            $data = "where u.user_id = '" . $_SESSION['login_user_id'] . "' ";
                        } else {
                            $ip = isset($_SERVER['HTTP_CLIENT_IP'])
                                ? $_SERVER['HTTP_CLIENT_IP']
                                : (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
                                    ? $_SERVER['HTTP_X_FORWARDED_FOR']
                                    : $_SERVER['REMOTE_ADDR']);
                            $data = "where c.client_ip = '" . $ip . "' ";
                        }

                            $qry = "SELECT *, OL.order_id as num, P.name as pname, OL.qty as qty, O.status as stat, OL.amount as amount from user_info u
                                    JOIN orders O
                                    JOIN order_list OL ON OL.order_id = O.id
                                    JOIN product_list P ON P.id = OL.product_id ".$data;
                            

                        $get = $conn->query($qry);
                        while ($row = $get->fetch_assoc()) :
                        ?>
                            <tr class="cell-1">
                                <td class="text-center">
                                </td>

                                <td><?php echo $row['num'] ?></td>
                                <td><?php echo $row['pname'] ?></td>
                                <td><?php echo $row['qty'] ?></td>
                                <?php if ($row['status'] == 1) : ?>
								<td class="text-center"><span class="badge badge-primary">Processing</span></td>
							<?php elseif ($row['status'] == 2) : ?>
								<td class="text-center"><span class="badge badge-warning">Ready to be Claim</span></td>
							<?php elseif ($row['status'] == 3) : ?>
								<td class="text-center"><span class="badge badge-success">Claimed</span></td>
							<?php else : ?>
								<td class="text-center"><span class="badge badge-secondary">Pending</span></td>
							<?php endif; ?>
							<td>
                                <td><span><?php echo $row['stat'] ?></span></td>
                                <td><?php echo $row['amount'] ?></td>
                                <!--<td>Today</td>-->
                                <td><i class="fa fa-ellipsis-h text-black-50"></i></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

     

    </div>
    </div>
    </div>

</body>

</html>