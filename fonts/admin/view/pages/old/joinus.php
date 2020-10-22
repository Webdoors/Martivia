<?php ob_start() ?>
<div class="col-md-12">
  <br><br>
  <a href="?page=vacancy" class="btn btn-default">Add Vacancy</a>
</div>
<br><br><br><br><br>
<?php
$sql = "SELECT * FROM join_us";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>

<div class="col-md-12 LIS">
  <div class="col-md-8"><?=$row["titleen"]?></div>
  <div class="col-md-2"><a href="?page=vacancy&id=<?=$row["id"]?>"class="btn btn-default">რედაქტირება</a></div>
  <div class="col-md-2"><a href="?page=joinus&delete=<?=$row["id"]?>" class="btn btn-default">წაშლა</a></div>
</div>
<?php } ?>

<?php
if (mysqli_real_escape_string($con, $_GET['delete'])) {
  $id = mysqli_real_escape_string($con, $_GET['delete']);
  $sql_delete_vacancy = "DELETE FROM join_us WHERE id = $id";
  $result_delete_vacancy = mysqli_query($con, $sql_delete_vacancy);
  header("Location: ?page=joinus");
}
?>
