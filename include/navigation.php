<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Vinra</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user">&nbsp;</i><?php echo $user; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="include/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/vinra/users/view_user.php';?>" >View User</a>
            </li>
            <li>
                <a href="#bookMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Books
                <i class="fa fa-caret-down pull-right"></i>
                </a>
                <ul class="collapse list-unstyled" id="bookMenu">
                    <li>
                        <a href="#">View Books</a>
                    </li>
                    <li>
                        <a href="#">Add Book</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#categoryMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categories <i class="fa fa-caret-down pull-right"></i></a>
                <ul class="collapse list-unstyled" id="categoryMenu">
                    <li>
                        <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/vinra/categories/view_categories.php';?>" >View Category</a>
                    </li>
                    <li>
                        <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/vinra/categories/add_category.php';?>" >Add Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#categoryPayment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Payments <i class="fa fa-caret-down pull-right"></i></a>
                <ul class="collapse list-unstyled" id="categoryPayment">
                    <li>
                        <a href="#">View Payments</a>
                    </li>
                    <li>
                        <a href="#">Add Payment</a>
                    </li>
                    <li>
                        <a href="#">Edit Payment</a>
                    </li>
                    <li>
                        <a href="#">Delete Payment</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="">Item in Carts</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>