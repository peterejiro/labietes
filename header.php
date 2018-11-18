<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="assets/images/random-avatar7.jpg" alt=""> </div>
            <div class="admin-action-info"> <span>Welcome</span>

                <?php

                $sql = "SELECT * FROM lab_attendant WHERE username = '$username'";

                $result = mysqli_query($myConn, $sql);
                $row=  mysqli_fetch_array($result, MYSQLI_BOTH);
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];


                ?>
                <h3><?php echo $first_name."  ".$last_name; ?></h3>

            </div>
            <div class="quick-stats">
                <a href="logout" class="btn btn-raised g-bg-red">Log Out </a>

            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active open"><a href="home"><i class="zmdi zmdi-home"></i><span>Diabetes Diagnosis Tool</span></a></li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Patients</span> </a>
                    <ul class="ml-menu">
                        <li><a href="patients">All Patients</a></li>
                        <li><a href="add-patient">Add Patient</a></li>
                        <li><a href="test-report">Patients Test Report</a></li>
                      </ul>
                </li>

                   </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->

</section>