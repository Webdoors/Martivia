<?php

if(isset($_SESSION['MGuserID'])){
$a=mysqli_real_escape_string($con,$_POST["a"]);
$qs=mysqli_query($con,"SELECT * FROM scoring WHERE id='".$a."' ORDER BY id DESC LIMIT 1");
$rs=mysqli_fetch_array($qs);
$q1=mysqli_query($con,"SELECT * FROM matrix WHERE scoringid='".$a."' ORDER BY id DESC LIMIT 1");
$r1=mysqli_fetch_array($q1);
$q12=mysqli_query($con,"SELECT permissions,matrix FROM permissions WHERE adminid='".$_SESSION['MGuserID']."'");
$r12=mysqli_fetch_array($q12);
if($r12["matrix"]==1){
?>	
	<table class="t1 table table-striped table-bordered dataTable">
			
			<thead>
			<tr>
				<td>სახელი | საიდენტიფიკაციო</td>
				<td><?=$rs["tavname"]?> | <?=$rs["CID"]?></td>
			</tr>
			<tr>
				<th>პარამეტრები</th>
				<th>მნიშვნელობები</th>
			</tr>
			</thead>
			<tbody>
	<?php
	echo "<tr><td>1 vatrevenue</td><td>".$r1["vatrevenue"]."</td></tr>";
	echo "<tr><td>2 income</td><td>".$r1["income"]."</td></tr>";
	echo "<tr><td>3 paidcash</td><td>".$r1["paidcash"]."</td></tr>";
	echo "<tr><td>4 paidcash4</td><td>".$r1["paidcash4"]."</td></tr>";
	echo "<tr><td>5 chosen</td><td>".$r1["chosen"]."</td></tr>";
	echo "<tr><td>6 gdp</td><td>".$r1["gdp"]."</td></tr>";
	echo "<tr><td>7 gdpvalue</td><td>".$r1["gdpvalue"]."</td></tr>";
	echo "<tr><td>8 gdpscore</td><td>".$r1["gdpscore"]."</td></tr>";
	echo "<tr><td>9 npl</td><td>".$r1["npl"]."</td></tr>";
	echo "<tr><td>10 nplvalue</td><td>".$r1["nplvalue"]."</td></tr>";
	echo "<tr><td>11 nplscore</td><td>".$r1["nplscore"]."</td></tr>";
	echo "<tr><td>12 crinfo</td><td>".$r1["crinfo"]."</td></tr>";
	echo "<tr><td>13 crinfovalue</td><td>".$r1["crinfovalue"]."</td></tr>";
	echo "<tr><td>14 crinfoscore</td><td>".$r1["crinfoscore"]."</td></tr>";
	echo "<tr><td>15cid movaleta</td><td>".$r1["cidmovaleta"]."</td></tr>";
	echo "<tr><td>16cid movalval</td><td>".$r1["cidmovalval"]."</td></tr>";
	echo "<tr><td>17cid movalscore</td><td>".$r1["cidmovalscore"]."</td></tr>";
	echo "<tr><td>18 15 inpl4</td><td>".$r1["inpl4"]."</td></tr>";
	echo "<tr><td>19 inpl4value</td><td>".$r1["inpl4value"]."</td></tr>";
	echo "<tr><td>20 inpl4score</td><td>".$r1["inpl4score"]."</td></tr>";
	echo "<tr><td>21 qcashloan</td><td>".$r1["qcashloan"]."</td></tr>";
	echo "<tr><td>22 qcashloanvalue</td><td>".$r1["qcashloanvalue"]."</td></tr>";
	echo "<tr><td>23 qcashloanscore</td><td>".$r1["qcashloanscore"]."</td></tr>";
	echo "<tr><td>24 companyold</td><td>".$r1["companyold"]."</td></tr>";
	echo "<tr><td>25 companyoldvalue</td><td>".$r1["companyoldvalue"]."</td></tr>";
	echo "<tr><td>26 companyoldscore</td><td>".$r1["companyoldscore"]."</td></tr>";
	echo "<tr><td>27 cashrevenuesales</td><td>".$r1["cashrevenuesales"]."</td></tr>";
	echo "<tr><td>28 cashrevenuesalesvalue</td><td>".$r1["cashrevenuesalesvalue"]."</td></tr>";
	echo "<tr><td>29 cashrevenuesalesscore</td><td>".$r1["cashrevenuesalesscore"]."</td></tr>";
	echo "<tr><td>30 taxpayable</td><td>".$r1["taxpayable"]."</td></tr>";
	echo "<tr><td>31 taxpayablevalue</td><td>".$r1["taxpayablevalue"]."</td></tr>";
	echo "<tr><td>32 taxpayablescore</td><td>".$r1["taxpayablescore"]."</td></tr>";
	echo "<tr><td>33 yadagagir</td><td>".$r1["yadagagir"]."</td></tr>";
	echo "<tr><td>34 yadagagirvalue</td><td>".$r1["yadagagirvalue"]."</td></tr>";
	echo "<tr><td>35 yadagagirscore</td><td>".$r1["yadagagirscore"]."</td></tr>";
	echo "<tr><td>36 foundercrinfo</td><td>".$r1["foundercrinfo"]."</td></tr>";
	echo "<tr><td>37 foundercrinfovalue</td><td>".$r1["foundercrinfovalue"]."</td></tr>";
	echo "<tr><td>38 foundercrinfoscore</td><td>".$r1["foundercrinfoscore"]."</td></tr>";
	echo "<tr><td>39 movaleta</td><td>".$r1["movaleta"]."</td></tr>";
	echo "<tr><td>40 movaletavalue</td><td>".$r1["movaletaval"]."</td></tr>";
	echo "<tr><td>41 movaletascore</td><td>".$r1["movaletascore"]."</td></tr>";
	echo "<tr><td>42 paymentrevenue</td><td>".$r1["paymentrevenue"]."</td></tr>";
	echo "<tr><td>43 paymentrevenuevalue</td><td>".$r1["paymentrevenuevalue"]."</td></tr>";
	echo "<tr><td>44 paymentrevenuescore</td><td>".$r1["paymentrevenuescore"]."</td></tr>";
	echo "<tr><td>45 profitable</td><td>".$r1["profitable"]."</td></tr>";
	echo "<tr><td>46 profitablevalue</td><td>".$r1["profitablevalue"]."</td></tr>";
	echo "<tr><td>47 profitablescore</td><td>".$r1["profitablescore"]."</td></tr>";
	echo "<tr><td>48 scocor</td><td>".$r1["scocor"]."</td></tr>";
	echo "<tr><td>49 prescore</td><td>".$r1["prescore"]."</td></tr>";	
	echo "<tr><td>50 scocorvalue</td><td>".$r1["scocorvalue"]."</td></tr>";
	echo "<tr><td>51 score</td><td>".$r1["score"]."</td></tr>";
	echo "<tr><td>52 tanxa</td><td>".($r1["tanxa"]==""?0:$r1["tanxa"]).($r1["mloan"]!=""&&$r1["mloan"]!="0"?" quickashloan ".$r1["qloan"]:"")."</td></tr>";
	?>
		</tbody>
	</table>
<?php
}else{
?>	
	<table class="t1 table table-striped table-bordered dataTable">
			
			<thead>
			<tr>
				<th>პარამეტრები</th>
				<th>მნიშვნელობები</th>
			</tr>
			</thead>
			<tbody>
	<?php
	echo "<tr><td>1</td><td>".$r1["vatrevenue"]."</td></tr>";
	echo "<tr><td>2</td><td>".$r1["income"]."</td></tr>";
	echo "<tr><td>3</td><td>".$r1["paidcash"]."</td></tr>";
	echo "<tr><td>4</td><td>".$r1["paidcash4"]."</td></tr>";
	echo "<tr><td>5</td><td>".$r1["chosen"]."</td></tr>";
	echo "<tr><td>6</td><td>".$r1["gdp"]."</td></tr>";
	echo "<tr><td>7</td><td>".$r1["gdpvalue"]."</td></tr>";
	echo "<tr><td>8</td><td>".$r1["gdpscore"]."</td></tr>";
	echo "<tr><td>9</td><td>".$r1["npl"]."</td></tr>";
	echo "<tr><td>10</td><td>".$r1["nplvalue"]."</td></tr>";
	echo "<tr><td>11</td><td>".$r1["nplscore"]."</td></tr>";
	echo "<tr><td>12</td><td>".$r1["crinfo"]."</td></tr>";
	echo "<tr><td>13</td><td>".$r1["crinfovalue"]."</td></tr>";
	echo "<tr><td>14</td><td>".$r1["crinfoscore"]."</td></tr>";
	echo "<tr><td>15</td><td>".$r1["cidmovaleta"]."</td></tr>";
	echo "<tr><td>16</td><td>".$r1["cidmovalval"]."</td></tr>";
	echo "<tr><td>17</td><td>".$r1["cidmovalscore"]."</td></tr>";
	echo "<tr><td>18</td><td>".$r1["inpl4"]."</td></tr>";
	echo "<tr><td>19</td><td>".$r1["inpl4value"]."</td></tr>";
	echo "<tr><td>20</td><td>".$r1["inpl4score"]."</td></tr>";
	echo "<tr><td>21</td><td>".$r1["qcashloan"]."</td></tr>";
	echo "<tr><td>22</td><td>".$r1["qcashloanvalue"]."</td></tr>";
	echo "<tr><td>23</td><td>".$r1["qcashloanscore"]."</td></tr>";
	echo "<tr><td>24</td><td>".$r1["companyold"]."</td></tr>";
	echo "<tr><td>25</td><td>".$r1["companyoldvalue"]."</td></tr>";
	echo "<tr><td>26</td><td>".$r1["companyoldscore"]."</td></tr>";
	echo "<tr><td>27</td><td>".$r1["cashrevenuesales"]."</td></tr>";
	echo "<tr><td>28</td><td>".$r1["cashrevenuesalesvalue"]."</td></tr>";
	echo "<tr><td>29</td><td>".$r1["cashrevenuesalesscore"]."</td></tr>";
	echo "<tr><td>30</td><td>".$r1["taxpayable"]."</td></tr>";
	echo "<tr><td>31</td><td>".$r1["taxpayablevalue"]."</td></tr>";
	echo "<tr><td>32</td><td>".$r1["taxpayablescore"]."</td></tr>";
	echo "<tr><td>33</td><td>".$r1["yadagagir"]."</td></tr>";
	echo "<tr><td>34</td><td>".$r1["yadagagirvalue"]."</td></tr>";
	echo "<tr><td>35</td><td>".$r1["yadagagirscore"]."</td></tr>";
	echo "<tr><td>36</td><td>".$r1["foundercrinfo"]."</td></tr>";
	echo "<tr><td>37</td><td>".$r1["foundercrinfovalue"]."</td></tr>";
	echo "<tr><td>38</td><td>".$r1["foundercrinfoscore"]."</td></tr>";
	echo "<tr><td>39</td><td>".$r1["movaleta"]."</td></tr>";
	echo "<tr><td>40</td><td>".$r1["movaletaval"]."</td></tr>";
	echo "<tr><td>41</td><td>".$r1["movaletascore"]."</td></tr>";
	echo "<tr><td>42</td><td>".$r1["paymentrevenue"]."</td></tr>";
	echo "<tr><td>43</td><td>".$r1["paymentrevenuevalue"]."</td></tr>";
	echo "<tr><td>44</td><td>".$r1["paymentrevenuescore"]."</td></tr>";
	echo "<tr><td>45</td><td>".$r1["profitable"]."</td></tr>";
	echo "<tr><td>46</td><td>".$r1["profitablevalue"]."</td></tr>";
	echo "<tr><td>47</td><td>".$r1["profitablescore"]."</td></tr>";
	echo "<tr><td>48</td><td>".$r1["scocor"]."</td></tr>";
	echo "<tr><td>49</td><td>".$r1["prescore"]."</td></tr>";	
	echo "<tr><td>50</td><td>".$r1["scocorvalue"]."</td></tr>";	
	echo "<tr><td>51</td><td>".$r1["score"]."</td></tr>";
	echo "<tr><td>52</td><td>".$r1["tanxa"]."</td></tr>";
	?>
		</tbody>
	</table>
<?php
}
?>
<?php
}
?>