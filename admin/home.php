<?php include('db_connect.php'); ?>
<html>

<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    .custom-menu {
      z-index: 1000;
      position: absolute;
      background-color: #ffffff;
      border: 1px solid #0000001c;
      border-radius: 5px;
      padding: 8px;
      min-width: 13vw;
    }

    a.custom-menu-list {
      width: 100%;
      display: flex;
      color: #4c4b4b;
      font-weight: 600;
      font-size: 1em;
      padding: 1px 11px;
    }

    span.card-icon {
      position: absolute;
      font-size: 3em;
      bottom: .2em;
      color: #ffffff80;
    }

    .file-item {
      cursor: pointer;
    }

    a.custom-menu-list:hover,
    .file-item:hover,
    .file-item.active {
      background: #80808024;
    }

    table th,
    td {
      /*border-left:1px solid gray;*/
    }

    a.custom-menu-list span.icon {
      width: 1em;
      margin-right: 5px
    }

    .candidate {
      margin: auto;
      width: 23vw;
      padding: 0 10px;
      border-radius: 20px;
      margin-bottom: 1em;
      display: flex;
      border: 3px solid #00000008;
      background: #8080801a;

    }

    .candidate_name {
      margin: 8px;
      margin-left: 3.4em;
      margin-right: 3em;
      width: 100%;
    }

    .img-field {
      display: flex;
      height: 8vh;
      width: 4.3vw;
      padding: .3em;
      background: #80808047;
      border-radius: 50%;
      position: absolute;
      left: -.7em;
      top: -.7em;
    }

    .candidate img {
      height: 100%;
      width: 100%;
      margin: auto;
      border-radius: 50%;
    }

    .vote-field {
      position: absolute;
      right: 0;
      bottom: -.4em;
    }
  </style>
</head>

<body>

  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">

      </div>
    </div>

    <div class="row mt-3 ml-3 mr-3">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body" style="text-align: center; color: red;">
            <h1>
              <?php echo "Welcome " . $_SESSION['login_name'] . "!" ?>
            </h1>

          </div>
        </div>

        <header class="w3-container" style="padding-top:22px">
          <h5 style="color:white;"><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        <div class="w3-row-padding w3-margin-bottom">
          <div class="w3-quarter">
            <div class="w3-container w3-red w3-padding-16">
              <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
              <div class="w3-right">
                <h3>52</h3>
              </div>
              <div class="w3-clear"></div>
              <h4>Messages</h4>
            </div>
          </div>
          <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
              <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
              <div class="w3-right">
                <h3>99</h3>
              </div>
              <div class="w3-clear"></div>
              <h4>Views</h4>
            </div>
          </div>
          <div class="w3-quarter">
            <div class="w3-container w3-teal w3-padding-16">
              <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
              <div class="w3-right">
                <h3>23</h3>
              </div>
              <div class="w3-clear"></div>
              <h4>Shares</h4>
            </div>
          </div>
          <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
              <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
              <div class="w3-right">
                <h3>50</h3>
              </div>
              <div class="w3-clear"></div>
              <h4>Users</h4>
            </div>
          </div>
        </div>

        <?php
        try {
          $sql = "SELECT * FROM category_list";
          $result = $conn->query($sql);
          $category_name = array();
          while ($row = $result->fetch_assoc()) {
            $category_name[] = $row['name'];
          }
        } catch (Exception $e) {
          echo "Error: " . $e->getMessage();
        }
        ?>
        
        <div class="w3-container">
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

        <script>
          
          var xValues = <?php echo json_encode($category_name); ?>;
          var yValues = [55, 49, 44, 24, 15];
          var barColors = ["red", "green", "blue", "orange", "brown"];

          new Chart("myChart", {
            type: "bar",
            data: {
              labels: xValues,
              datasets: [{
                backgroundColor: barColors,
                data: yValues
              }]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: "World Wine Production 2018"
              }
            }
          });
        </script>

      </div>
    </div>
  </div>

  </div>


</body>

</html>