<?php

$pagin=pagination("category", 20, true);

$result=$con->query("SELECT * FROM category LIMIT ".$pagin["limit"]." OFFSET ".$pagin["offset"]." ");

?>
<table class="table table-striped table-bordered table-hover" style="font-family: 'Roboto Light'; font-size: 1.1em;">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Id</th>
        <th scope="col">დასახელება ქართ.</th>
        <th scope="col">დასახელება ინგ.</th>
        <th scope="col">გვერდი</th>
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
        <td class="align-middle"><?=$r["ka_cat_name"]?></td>
        <td class="align-middle"><?=$r["en_cat_name"]?></td>
        <td class="align-middle"><?=$r["page"]?></td>
        <td class="align-middle text-center">
            <button type="button" class="btn btn-danger btn-sm DELCAT" data-id="<?=$r["id"]?>">
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
            <input type="text" class="form-control form-control-sm my-2 px-1 ka_CATNAME" name="ka_catname" placeholder="კატეგორიის დასახელება ქართ.">
        </td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm  my-2 px-1 en_CATNAME" name="en_catname" placeholder="კატეგორიის დასახელება ინგ.">
        </td>
        <td class="align-middle">
            <select class="form-control form-control-sm PGNAME">
                <option value="">აირჩიეთ გვერდი</option>
            <?php
            $pages=array("news"=>"სიახლე","gallery"=>"გალერეა","archive"=>"არქივი","partners"=>"პარტნიორები");
            foreach ($pages as $id=>$pg){
                ?>

                    <option value="<?=$id?>"><?=$pg?></option>
                <?php
            }
            ?>
            </select>
        </td>
        <td class="align-middle text-center">
            <button type="button" class="btn btn-success btn-sm SAVCAT">
                <i class="material-icons">add</i>
            </button>
        </td>
    </tr>
    </tbody>
</table>
<div class="col-12">
    <?php
    pagination("category",20);
    ?>
</div>
