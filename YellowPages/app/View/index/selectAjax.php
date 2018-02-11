
<?php
$data=new AddCompanyModel();
echo json_encode($data->getArea($_POST['id']));
?>

