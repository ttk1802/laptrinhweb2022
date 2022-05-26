
<?php

    include "includes/categories.php";
    include "includes/database.php";

    $database = new Database();
    $db = $database->connect();

    $category = new Category($db);
    $result = $category->read();

    $num = $result->rowCount();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vinhs blog</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <?php  
            include "header.php";
        ?>
        <!--/. NAV TOP  -->
        <?php  
            include "sidebar.php";
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            CATEGOTY
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Categories
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="">
                                            <div class="form-group ">
                                                <label>Category Tilte</label>
                                                <input class="form-control" name="Category_Tilte" placeholder="Enter Category tilte">
                                            </div>
                                            <div class="form-group">
                                                <label>Category Meta Tilte</label>
                                                <input class="form-control" name="Category_Meta_Tilte" placeholder="Enter Category meta tilte">
                                            </div>
                                            <div class="form-group">
                                                <label>Category Path</label>
                                                <input class="form-control" name="Category_Path" placeholder="Enter Category Path">
                                            </div>
                                        <button type="submit" class="btn btn-default"> Add Category</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!--    Context Classes  -->
                        <div class="panel panel-default">
                        
                            <div class="panel-heading">
                                All Categories Blog
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Meta Title</th>
                                                <th>Path</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($num > 0){
                                                while($rows = $result->fetch())
                                                {
                                            ?>
                                            <tr>
                                                <td><?php echo  $rows['n_category_id']; ?>           </td>
                                                <td><?php echo  $rows['v_category_title']; ?>        </td>
                                                <td><?php echo  $rows['v_category_meta_title']; ?>   </td>
                                                <td><?php echo  $rows['v_category_path'];?>          </td>
                                                <td>
                                                    <button class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>
											        <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo  $rows['n_category_id']; ?>"  ><i class="fa fa-edit " ></i> Edit</button>
											        <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                                        <!-- Click  Launch Demo Modal -->
                                                    <div class="modal fade" id="edit<?php echo  $rows['n_category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form role="form" action="">
                                                                    <div class="form-group ">
                                                                        <label>Category Tilte</label>
                                                                        <input class="form-control" name="Category_Tilte" placeholder="Enter Category tilte" value="<?php echo  $rows['v_category_title']; ?> ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Category Meta Tilte</label>
                                                                        <input class="form-control" name="Category_Meta_Tilte" placeholder="Enter Category meta tilte" value="<?php echo  $rows['v_category_meta_title']; ?> ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Category Path</label>
                                                                        <input class="form-control" name="Category_Path" placeholder="Enter Category Path" value="<?php echo  $rows['v_category_path']; ?> ">
                                                                    </div>
                                                                </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--  end  Context Classes  -->
                    </div>
                </div>
                <!-- /. ROW  -->
				<footer><p>&copy;2022</p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>