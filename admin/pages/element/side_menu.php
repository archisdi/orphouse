<?php ?>
<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">Menu</li>
    <!-- Optionally, you can add icons to the links -->
    <li>
        <a href="home.php">
            <i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-plus"></i> <span>Add</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="add_orph.php">Add Orphanage</a></li>
            <li><a href="add_child.php">Add Child</a></li>
        </ul>
    </li>    
    <li class="treeview">
        <a href="#"><i class="fa fa-minus"></i> <span>Delete</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="delete_orph.php">Delete Orphanage</a></li>
            <li><a href="delete_child.php">Delete Child</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-edit"></i> <span>Edit</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="edit_orph.php">Edit Orphanage</a></li>
            <li><a href="edit_child.php">Edit Child</a></li>
        </ul>
    </li>
    <li>
        <a href="view_orph.php">
            <i class="fa fa-eye"></i> <span>View</span>
        </a>
    </li>
</ul>
<!-- /.sidebar-menu -->
<?php ?>
