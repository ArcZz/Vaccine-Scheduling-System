 <div class="header">
     <div class="header-left">
         <a href="javascript:void(0)" class="logo">
             <span> Vaccine schedule </span>
         </a>
     </div>
     <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
     <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>

     <ul class="nav user-menu float-right">

         <li class="nav-item dropdown has-arrow">
             <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">

                 <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
                     <span class="status online"></span></span>
                 <span> <?php echo $identity; ?></span>
             </a>
             <div class="dropdown-menu">
                 <?php
if ($identity == "Provider") {
    echo ' <a class="dropdown-item" href="settings.php">Information</a>';
} else {
    echo ' <a class="dropdown-item" href="profile.php">My Profile</a>';
}
?>
                 <a class="dropdown-item" href="../">Logout</a>
             </div>
         </li>
     </ul>
     <div class="dropdown mobile-user-menu float-right">
         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                 class="fa fa-ellipsis-v"></i></a>
         <div class="dropdown-menu dropdown-menu-right">
             <?php
if ($identity == "Provider") {
    echo ' <a class="dropdown-item" href="settings.php">Information</a>';
} else {
    echo ' <a class="dropdown-item" href="profile.php">My Profile</a>';
}
?>

             <a class="dropdown-item" href="../">Logout</a>
         </div>
     </div>
 </div>

 <?php
if ($identity == "Provider") {
    echo ' <a class="dropdown-item" href="settings.php">Information</a>';
} else {
    echo ' <a class="dropdown-item" href="profile.php">My Profile</a>';
}
?>
 <?php if ($identity == "Provider") {?>
 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div id="sidebar-menu" class="sidebar-menu">
             <ul>
                 <li class=" menu-title">Menu</li>
                 <li <?php if ($num == 0) {
        echo ' class="active"';
}
    ?>>
                     <a href="settings.php"><i class="fa fa-user-md"></i> <span>Information</span></a>
                 </li>
                 <li <?php if ($num == 1) {
        echo ' class="active"';
    }
    ?>>
                     <a href="main.php"><i class="fa fa-calendar"></i> <span>History </span></a>
                 </li>
                 <li <?php if ($num == 2) {
        echo ' class="active"';
    }
    ?>>
                     <a href="add-appointment.php"><i class="fa fa-plus"></i> <span>Add Appointment</span></a>
                 </li>
                 <li <?php if ($num == 3) {
        echo ' class="active"';
    }
    ?>>
                     <a href="appoffer.php"><i class="fa fa-address-book-o"></i> <span>Patients Offer</span></a>
                 </li>
             </ul>
         </div>
     </div>
 </div>
 <?php } else {?>

 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div id="sidebar-menu" class="sidebar-menu">
             <ul>
                 <li class=" menu-title">Menu</li>
                 <li <?php if ($num == 0) {
        echo ' class="active"';
}
    ?>>
                     <a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a>
                 </li>
                 <li <?php if ($num == 1) {
        echo ' class="active"';
    }
    ?>>
                     <a href="slot.php"><i class="fa fa-calendar-check-o "></i> <span>Availability</span></a>
                 </li>
                 <li <?php if ($num == 2) {
        echo ' class="active"';
    }
    ?>>
                     <a href="offer.php"><i class="fa fa-envelope-o "></i> <span>Vaccine Offers</span></a>
                 </li>


             </ul>
         </div>
     </div>
 </div>

 <?php }
;?>