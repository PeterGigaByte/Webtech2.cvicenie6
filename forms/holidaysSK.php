<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
include_once "config/config.php";
$country_query = "SELECT * FROM countries WHERE country_name = 'SK' LIMIT 1";
$result = mysqli_query($db, $country_query);
$result = mysqli_fetch_assoc($result);
$id_country =$result["id"];

$holidays_query = "SELECT * FROM holidays WHERE country_id='$id_country' ";
$result = mysqli_query($db, $holidays_query);
$holidays = mysqli_fetch_all($result);
echo '
<h1 class="display-2">Sviatky na Slovensku</h1>
 <div class="input-group mb-3">
    <div class="mx-auto">
        <div class="input-group input-group-lg ">
         <table  id="table" >
                        <thead>
                        <tr>
                            <th>Dátum</th>
                            <th>Názov</th>
                        </tr>
                        </thead>
                            <tbody>';
                            foreach ($holidays as $holiday){
                                echo '<tr>';
                                $day = get_day($holiday[1],$db);
                                $date = $day["day"].".".$day["month"].".";
                                echo '<td>'.$date.'</td>';
                                echo '<td>'.$holiday[3].'</td>';
                                echo '</tr>';
                            }
                           echo '</tbody>
                    </table>
        </div>
    </div>
</div>
';
function get_day($id_day,$db){
    $day_query = "SELECT * FROM days WHERE id = '$id_day'LIMIT 1 ";
    $result = mysqli_query($db, $day_query);
    $result = mysqli_fetch_assoc($result);
    return $result;
}