
<?php
$table=(string)"programme";
$pagin=pagination($table, 20, true);
$result=$con->query("SELECT * FROM programme ORDER BY id ASC LIMIT ".$pagin["limit"]." OFFSET ".$pagin["offset"]." ");

?>


<!-- insert table-->
<h5 class="text-center p-2 m-0">ახალი მონაცემები</h5>
<hr>
<table class="table table-striped table-bordered table-hover" data-input style="font-family: 'Roboto Light'; font-size: 1.1em;">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Items</th>
        <th scope="col">პროგრამის დასახელება</th>
        <th scope="col">აღწერა</th>
        <th scope="col">ქალაქი</th>
        <th scope="col">ჩატარების ადგილი</th>
        <th scope="col">ადგილი რუქაზე(Map Url)</th>
        <th scope="col">თარიღი: YYYY-mm-dd / დრო: HH:ii</th>
        <th scope="col">ფუნქცია</th>
    </tr>
    </thead>
    <tbody class="table-sm">
    <tr class="bg-white" data-input>
        <td class="align-middle"><?=$result->num_rows?></td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm my-2 px-1" name="ka_prog_title" placeholder="დასახელება ქართ." data-get>
            <input type="text" class="form-control form-control-sm my-2 px-1" name="en_prog_title" placeholder="დასახელება ინგ." data-get>
            <input type="text" class="form-control form-control-sm my-2 px-1" name="ru_prog_title" placeholder="დასახელება რუს." data-get>
        </td>
        <td class="align-middle">
            <textarea type="text" class="form-control form-control-sm  my-2 px-1" name="ka_desc" placeholder="აღწერა ქართ." data-get></textarea>
            <textarea type="text" class="form-control form-control-sm my-2 px-1" name="en_desc" placeholder="აღწერა ინგ." data-get></textarea>
            <textarea type="text" class="form-control form-control-sm my-2 px-1" name="ru_desc" placeholder="აღწერა რუს." data-get></textarea>
        </td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm  my-2 px-1" name="ka_city" placeholder="ქალაქი ქართ." data-get>
            <input type="text" class="form-control form-control-sm my-2 px-1" name="en_city" placeholder="ქალაქი ინგ." data-get>
            <input type="text" class="form-control form-control-sm my-2 px-1" name="ru_city" placeholder="ქალაქი რუს." data-get>
        </td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm  my-2 px-1" name="ka_loc_name" placeholder="ჩატარების ადგილი ქართ." data-get>
            <input type="text" class="form-control form-control-sm my-2 px-1" name="en_loc_name" placeholder="ჩატარების ადგილი ინგ." data-get>
            <input type="text" class="form-control form-control-sm my-2 px-1" name="ru_loc_name" placeholder="ჩატარების ადგილი რუს." data-get>
        </td>
        <td class="align-middle">
            <input type="text" class="form-control form-control-sm my-2 px-1" name="loc_url" placeholder="ადგილი რუქაზე" data-get>
        </td>
        <td class="align-middle text-center">
            <input type="text" class="form-control form-control-sm my-2 px-1" name="date" placeholder="თარიღი: YYYY-mm-dd" data-get>
            <input type="text" class="form-control form-control-sm my-2 px-1" name="time" placeholder="დრო: HH:ii" data-get>
        </td>
        <td class="align-middle text-center">
            <input class="SAVCHECK" type="checkbox" data-toggle="toggle" data-on="აქტიური" data-off="არააქტიური" data-size="small">
            <button type="button" class="btn btn-success btn-sm SAVEPROG">
                <i class="material-icons">add</i>
            </button>
        </td>
    </tr>
    </tbody>
</table>

<!-- tabs -->
<h5 class="text-center p-2 mb-0" style="margin-top: 80px;">პროგრამა</h5>
<hr>
<ul class="nav nav-tabs nav-justified" id="langtab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active bg-dark text-white" id="ka-tab" data-toggle="tab" href="#ka" role="tab" aria-controls="ka" aria-selected="true">GEO</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white bg-secondary" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false">ENG</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white bg-secondary" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="false">RUS</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="ka" role="tabpanel" aria-labelledby="ka">
        <!-- data table-->
        <table class="table table-striped table-bordered table-hover" style="font-family: 'Roboto Light'; font-size: 1.1em;">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">პროგრამის დასახელება</th>
                <th scope="col">აღწერა</th>
                <th scope="col">ქალაქი</th>
                <th scope="col">ჩატარების ადგილი</th>
                <th scope="col">ადგილი რუქაზე(Map Url)</th>
                <th scope="col">თარიღი: YYYY-mm-dd / დრო: HH:ii</th>
                <th scope="col">ფუნქცია</th>
            </tr>
            </thead>
            <tbody class="table-sm">
            <?php
            $count=1;
            $res=$result->fetch_all(MYSQLI_ASSOC);
            foreach ($res as $r  ){
                ?>
                <tr>
                    <td class="align-middle"><?=$count?></td>
                    <td class="align-middle"><?=$r["id"]?></td>
                    <td class="align-middle">
                        <div class="align-middle p-2 font-weight-bold"><?=$r["ka_prog_title"]?></div>
                    </td>

                    <td class="align-middle">
                        <div class="align-middle p-2 font-weight-bold"><?=$r["ka_desc"]?></div>
                    </td>
                    <td class="align-middle">
                        <div class="align-middle p-2 font-weight-bold"><?=$r["ka_city"]?></div>

                    </td>
                    <td class="align-middle">
                        <div class="align-middle p-2 font-weight-bold"><?=$r["ka_loc_name"]?></div>
                    </td>
                    <td class="align-middle"><?=$r["loc_url"]?></td>
                    <td class="align-middle">
                        <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">თარიღი: <?=$r["eventdate"]?></div>
                        <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">დრო:<?=$r["time"]?></div>
                    </td>
                    <td class="align-middle text-center">
                        <input type="checkbox" data-toggle="toggle" data-on="აქტიური" data-off="არააქტიური" data-size="small" data-activate data-col="enabled" data-t="<?=$table?>" data-id="<?=$r["id"]?>" <?=($r["enabled"])?"checked":""?>>
                        <button type="button" class="btn btn-success btn-sm EDITPROG"  data-id="<?=$r["id"]?>">
                            <i class="material-icons">create</i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm my-1 DELPROG" data-id="<?=$r["id"]?>">
                            <i class="material-icons">delete</i>
                        </button>
                    </td>
                </tr>
                <?php
                $count++;
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="en" role="en" aria-labelledby="en">
        <table class="table table-striped table-bordered table-hover" style="font-family: 'Roboto Light'; font-size: 1.1em;">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Programme name</th>
                <th scope="col">Description</th>
                <th scope="col">city</th>
                <th scope="col">event place</th>
                <th scope="col"> Google Map Url</th>
                <th scope="col">Date: YYYY-mm-dd / Time: HH:ii</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="table-sm">
            <?php
            $count=1;
            foreach ($res as $r  ){

                ?>
                <tr>
                    <td class="align-middle"><?=$count?></td>
                    <td class="align-middle"><?=$r["id"]?></td>
                    <td class="align-middle">
                        <div class="align-middle p-2 font-weight-bold"><?=$r["en_prog_title"]?></div>
                    </td>

                    <td class="align-middle">
                        <div class="align-middle p-2 font-weight-bold"><?=$r["en_desc"]?></div>
                    </td>
                    <td class="align-middle">
                        <div class="align-middle p-2 font-weight-bold"><?=$r["en_city"]?></div>
                    </td>
                    <td class="align-middle">
                        <div class="align-middle p-2 font-weight-bold"><?=$r["en_loc_name"]?></div>
                    </td>
                    <td class="align-middle"><?=$r["loc_url"]?></td>
                    <td class="align-middle">
                        <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">Date: <?=$r["eventdate"]?></div>
                        <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">Time:<?=$r["time"]?></div>
                    </td>
                    <td class="align-middle text-center">
                        <input type="checkbox" data-toggle="toggle" data-on="აქტიური" data-off="არააქტიური" data-size="small" data-activate data-col="enabled" data-t="<?=$table?>" data-id="<?=$r["id"]?>" <?=($r["enabled"])?"checked":""?>>
                        <button type="button" class="btn btn-success btn-sm EDITPROG"  data-id="<?=$r["id"]?>">
                            <i class="material-icons">create</i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm my-1 DELPROG" data-id="<?=$r["id"]?>">
                            <i class="material-icons">delete</i>
                        </button>
                    </td>
                </tr>
                <?php
                $count++;
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="ru" role="ru" aria-labelledby="ru">
        <table class="table table-striped table-bordered table-hover" style="font-family: 'Roboto Light'; font-size: 1.1em;">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Название программы</th>
                <th scope="col">Описание</th>
                <th scope="col">город</th>
                <th scope="col">Место проведения</th>
                <th scope="col">Разместить на карте(Map Url)</th>
                <th scope="col">Дата: YYYY-mm-dd / Время: HH:ii</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody class="table-sm">
            <?php
            $count=1;
            foreach ($res as $r  ){

                ?>
                <tr>
                    <td class="align-middle"><?=$count?></td>
                    <td class="align-middle"><?=$r["id"]?></td>
                    <td class="align-middle">
                        <div class="align-middle border-secondary p-2 font-weight-bold"><?=$r["ru_prog_title"]?></div>
                    </td>

                    <td class="align-middle">
                        <div class="align-middle border-secondary p-2 font-weight-bold"><?=$r["ru_desc"]?></div>
                    </td>
                    <td class="align-middle">
                        <div class="align-middle border-secondary p-2 font-weight-bold"><?=$r["ru_city"]?></div>
                    </td>
                    <td class="align-middle">
                        <div class="align-middle border-secondary p-2 font-weight-bold"><?=$r["ru_loc_name"]?></div>
                    </td>
                    <td class="align-middle"><?=$r["loc_url"]?></td>
                    <td class="align-middle">
                        <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">Дата: <?=$r["eventdate"]?></div>
                        <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">Время:<?=$r["time"]?></div>
                    </td>
                    <td class="align-middle text-center">
                        <input type="checkbox" data-toggle="toggle" data-on="აქტიური" data-off="არააქტიური" data-size="small" data-activate data-col="enabled" data-t="<?=$table?>" data-id="<?=$r["id"]?>" <?=($r["enabled"])?"checked":""?>>
                        <button type="button" class="btn btn-success btn-sm EDITPROG"  data-id="<?=$r["id"]?>">
                            <i class="material-icons">create</i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm my-1 DELPROG" data-id="<?=$r["id"]?>">
                            <i class="material-icons">delete</i>
                        </button>
                    </td>
                </tr>
                <?php
                $count++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<!--end of tabs-->
<!--<table class="table table-striped table-bordered table-hover" style="font-family: 'Roboto Light'; font-size: 1.1em;">-->
<!--    <thead class="thead-dark">-->
<!--    <tr>-->
<!--        <th scope="col">#</th>-->
<!--        <th scope="col">Id</th>-->
<!--        <th scope="col">პროგრამის დასახელება</th>-->
<!--        <th scope="col">აღწერა</th>-->
<!--        <th scope="col">ქალაქი</th>-->
<!--        <th scope="col">ჩატარების ადგილი</th>-->
<!--        <th scope="col">ადგილი რუქაზე(Map Url)</th>-->
<!--        <th scope="col">თარიღი: YYYY-mm-dd / დრო: HH:ii</th>-->
<!--        <th scope="col">ფუნქცია</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody class="table-sm">-->
<!--    --><?php
//    $count=1;
//    while ($r=$result->fetch_array(MYSQLI_ASSOC)){
//
//        ?>
<!--        <tr>-->
<!--            <td class="align-middle">--><?//=$count?><!--</td>-->
<!--            <td class="align-middle">--><?//=$r["id"]?><!--</td>-->
<!--            <td class="align-middle">-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">GE:--><?//=$r["ka_prog_title"]?><!--</div>-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">EN:--><?//=$r["en_prog_title"]?><!--</div>-->
<!--                <div class="align-middle border-secondary p-2 font-weight-bold">RU:--><?//=$r["ru_prog_title"]?><!--</div>-->
<!--            </td>-->
<!---->
<!--            <td class="align-middle">-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">GE:--><?//=$r["ka_desc"]?><!--</div>-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">EN:--><?//=$r["en_desc"]?><!--</div>-->
<!--                <div class="align-middle border-secondary p-2 font-weight-bold">RU:--><?//=$r["ru_desc"]?><!--</div>-->
<!--            </td>-->
<!--            <td class="align-middle">-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">GE:--><?//=$r["ka_city"]?><!--</div>-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">EN:--><?//=$r["en_city"]?><!--</div>-->
<!--                <div class="align-middle border-secondary p-2 font-weight-bold">RU:--><?//=$r["ru_city"]?><!--</div>-->
<!--            </td>-->
<!--            <td class="align-middle">-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">GE:--><?//=$r["ka_loc_name"]?><!--</div>-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">EN:--><?//=$r["en_loc_name"]?><!--</div>-->
<!--                <div class="align-middle border-secondary p-2 font-weight-bold">RU:--><?//=$r["ru_loc_name"]?><!--</div>-->
<!--            </td>-->
<!--            <td class="align-middle">--><?//=$r["loc_url"]?><!--</td>-->
<!--            <td class="align-middle">-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">თარიღი: --><?//=$r["eventdate"]?><!--</div>-->
<!--                <div class="align-middle border-bottom border-secondary p-2 font-weight-bold">დრო:--><?//=$r["time"]?><!--</div>-->
<!--            </td>-->
<!--            <td class="align-middle text-center">-->
<!--                <input type="checkbox" data-toggle="toggle" data-on="აქტიური" data-off="არააქტიური" data-size="small" data-activate data-col="enabled" data-t="--><?//=$table?><!--" data-id="--><?//=$r["id"]?><!--" --><?//=($r["enabled"])?"checked":""?><!-->-->
<!--                <button type="button" class="btn btn-danger btn-sm my-1 DELPROG" data-id="--><?//=$r["id"]?><!--">-->
<!--                    <i class="material-icons">delete</i>-->
<!--                </button>-->
<!--            </td>-->
<!--        </tr>-->
<!--        --><?php
//        $count++;
//    }
//    ?>
<!--    <tr class="bg-white">-->
<!--        <td class="align-middle">--><?//=$result->num_rows?><!--</td>-->
<!--        <td class="align-middle">--><?//=$r["id"]?><!--</td>-->
<!--        <td class="align-middle">-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="ka_prog_title" placeholder="დასახელება ქართ." data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="en_prog_title" placeholder="დასახელება ინგ." data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="ru_prog_title" placeholder="დასახელება რუს." data-get>-->
<!--        </td>-->
<!--        <td class="align-middle">-->
<!--            <input type="text" class="form-control form-control-sm  my-2 px-1" name="ka_desc" placeholder="აღწერა ქართ." data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="en_desc" placeholder="აღწერა ინგ." data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="ru_desc" placeholder="აღწერა რუს." data-get>-->
<!--        </td>-->
<!--        <td class="align-middle">-->
<!--            <input type="text" class="form-control form-control-sm  my-2 px-1" name="ka_city" placeholder="ქალაქი ქართ." data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="en_city" placeholder="ქალაქი ინგ." data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="ru_city" placeholder="ქალაქი რუს." data-get>-->
<!--        </td>-->
<!--        <td class="align-middle">-->
<!--            <input type="text" class="form-control form-control-sm  my-2 px-1" name="ka_loc_name" placeholder="ჩატარების ადგილი ქართ." data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="en_loc_name" placeholder="ჩატარების ადგილი ინგ." data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="ru_loc_name" placeholder="ჩატარების ადგილი რუს." data-get>-->
<!--        </td>-->
<!--        <td class="align-middle">-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="loc_url" placeholder="ადგილი რუქაზე" data-get>-->
<!--        </td>-->
<!--        <td class="align-middle text-center">-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="date" placeholder="თარიღი: YYYY-mm-dd" data-get>-->
<!--            <input type="text" class="form-control form-control-sm my-2 px-1" name="time" placeholder="დრო: HH:ii" data-get>-->
<!--        </td>-->
<!--        <td class="align-middle text-center">-->
<!--            <input class="SAVCHECK" type="checkbox" data-toggle="toggle" data-on="აქტიური" data-off="არააქტიური" data-size="small">-->
<!--            <button type="button" class="btn btn-success btn-sm SAVEPROG">-->
<!--                <i class="material-icons">add</i>-->
<!--            </button>-->
<!--        </td>-->
<!--    </tr>-->
<!--    </tbody>-->
<!--</table>-->
<div class="col-12">
    <?php
    pagination($table,20);
    ?>
</div>


