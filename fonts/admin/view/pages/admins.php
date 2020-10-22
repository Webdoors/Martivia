
<?php
$pagin=pagination("admins", 20, true);
$result=$con->query("SELECT * FROM admins ORDER BY id ASC LIMIT ".$pagin["limit"]." OFFSET ".$pagin["offset"]." ");

?>

<table class="table table-striped table-bordered table-hover" style="font-family: 'Roboto Light'; font-size: 1.1em;">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Id</th>
        <th scope="col">სახელი</th>
        <th scope="col">გვარი</th>
        <th scope="col">მომხმარებელი</th>
        <th scope="col">პაროლი</th>
        <th scope="col">ფუნქცია</th>
    </tr>
    </thead>
    <tbody class="table-sm">
    <?php
    $count=1;
    while ($r=$result->fetch_array(MYSQLI_ASSOC)){

        ?>
        <tr>
            <td class="align-middle"><?=$count?></td>
            <td class="align-middle"><?=$r["id"]?></td>
            <td class="align-middle"><?=$r["name"]?></td>
            <td class="align-middle"><?=$r["lastname"]?></td>
            <td class="align-middle"><?=$r["user"]?></td>
            <td class="align-middle">********</td>
            <td class="align-middle text-center">
                <button type="button" class="btn btn-danger btn-sm DGA" n='admins' d="<?=$r["id"]?>">
                    <i class="material-icons">delete</i>
                </button>
            </td>
        </tr>
        <?php
        $count++;
    }
    ?>
    <tr class="bg-white">
        <td class="align-middle"><?=$result->num_rows?></td>
        <td class="align-middle"><?=$r["id"]?></td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm my-2 px-1 ADN" name="name" placeholder="სახელი">
        </td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm  my-2 px-1 ADL" name="surname" placeholder="გვარი">
        </td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm  my-2 px-1 ADA" name="user" placeholder="მომხმარებელი">
        </td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm  my-2 px-1 ADP" name="password" placeholder="პაროლი">
        </td>
        <td class="align-middle text-center">
            <button type="button" class="btn btn-success btn-sm ADB">
                <i class="material-icons">add</i>
            </button>
        </td>
    </tr>
    </tbody>
</table>
<div class="col-12">
    <?php
    pagination("admins",20);
    ?>
</div>


