<?php

if(isset($_SERVER['HTTPS'])){

    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";

}

else{

    $protocol = 'http';

}

$base=$protocol . "://" . $_SERVER['HTTP_HOST']."/admin";

// pagination
function pagination(string $table=null, int $limit=10,bool $nohtml=false, $where=""){
    global $base,$PG,$con;
    $q="SELECT * FROM ".$table." ".$where;
    $result=$con->query($q);
    $last=$result->num_rows;
    $page=(int)htmlspecialchars(stripslashes(trim($_GET["p"]??1)));
    $pages=ceil($last/$limit);
    $offset=(($page-1)*$limit <1)?0:($page-1)*$limit;
    if(!$nohtml){

    ?>
    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="<?=$base,"/?page=".$PG."&p=".(($page>1)?($page-1):1)?>">Previous</a></li>
            <?php
            $dots=false;
            $pnum=1;
            while ($pnum <=$pages){
                if($pnum==1 || $pnum==$pages || ($pnum-2<=$page)&&($page<=$pnum+2)){
                    $dots=true;
                    ?>
                    <li class="page-item <?=($page===$pnum)?"active":""?>"><a class="page-link" href="<?=$base,"/?page=".$PG."&p=".$pnum?>"><?=$pnum?></a></li>
                    <?php
                }elseif($dots){
                    echo "...";
                    $dots=false;
                }
                $pnum++;
            }
            ?>
        <li class="page-item"><a class="page-link" href="<?=$base,"/?page=".$PG."&p=".(($page<$pnum-1)?($page+1):($page!=1)?($pnum-1):1)?>">Next</a></li>
    </ul>
    </nav>
    <?php
    }
    return array("limit"=>$limit,"offset"=>$offset);
}
// sanitize data
    function sanit_data($data){
    return htmlspecialchars(stripslashes(trim($data)));
    }

