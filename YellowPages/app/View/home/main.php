<?php
if(!isset($_SESSION))
{session_start();}
$colnum=5;
@$_SESSION['userId'] = $_GET['id'];
if(isset($_GET['id'])){
    $colnum=6;
}?>
<html>
    <head>
        <head>
            <link href="/../css/style.css" rel="stylesheet">
            <link href="/../css/bootstrap.min.css" rel="stylesheet">
        </head>
    </head>
    <body class="categ-page">
        <h1 class="main-h1">Companies</h1>
        <?php if(isset($_GET['id'])): ?>
            <a href="/index/addCompany"><button style="margin-bottom: 40px;" class="btn btn-danger add-btn">Logout</button></a>
            <a href="/index/addCompany"><button style="margin-bottom: 40px;" class="btn btn-info add-btn">Add new company</button></a>
        <?php endif;?>
        <table class="table table-responsive table-bordered">

            <thead>
                <th class="table-th">Name</th>
                <th class="table-th">Phone Number</th>
                <th class="table-th">Categoyies</th>
                <th class="table-th">City Location</th>
                <th class="table-th">area Location</th>
                <?php if(isset($_GET['id'])):?>
                    <th class="table-th">Operation</th>
                <?php endif; ?>
            </thead>

            <?php $i=0; while ($i < $CompNum): ?>
                <tr>
                    <td><?php echo $CompName[$i]; ?></td>
                    <td><?php echo $CompPhone[$i]; ?></td>
                    <td><?php for($y = 0; $y < $CategLen[$i]; $y++)
                        echo $CompanyCategory[$i][$y]['Category_Name']. ",";
                    ?></td>
                    <td><?php echo $CompCity[$i]; ?></td>
                    <td><?php echo $CompArea[$i];?></td>
                    <?php if(isset($_GET['id'])):?>
                        <td class="table-th">
                            <a href="/home/update/?compId=<?php echo "{$CompanyId[$i]}"; ?>"><button class="btn btn-info">Edit</button></a>
                            <a href="/home/delete/?compId=<?php echo "{$CompanyId[$i]}"; ?>"><button class="btn btn-danger">delete</button></a>
                        </td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td colspan=<?php echo $colnum; $i++;?>></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>