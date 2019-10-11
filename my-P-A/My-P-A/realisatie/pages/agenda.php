<section id="agenda">
   <div class="grid-container">
       <div class="day">
        <div class="Time-stamp">
            <h4>Time <br>
                stamp:</h4>
            <div class="\30 0">01:00</div>
            <div class="\30 1">02:00</div>
            <div class="\30 2">03:00</div>
            <div class="\30 3">04:00</div>
            <div class="\30 4">05:00</div>
            <div class="\30 5">06:00</div>
            <div class="\30 6">07:00</div>
            <div class="\30 7">08:00</div>
            <div class="\30 8">09:00</div>
            <div class="\30 9">10:00</div>
            <div class="\31 0">11:00</div>
            <div class="\31 1">12:00</div>
            <div class="\31 2">13:00</div>
            <div class="\31 3">14:00</div>
            <div class="\31 4">15:00</div>
            <div class="\31 5">16:00</div>
            <div class="\31 6">17:00</div>
            <div class="\31 7">18:00</div>
            <div class="\31 8">19:00</div>
            <div class="\31 9">20:00</div>
            <div class="\32 0">21:00</div>
            <div class="\32 1">22:00</div>
            <div class="\32 2">23:00</div>
            <div class="\32 3">00:00</div>
            <br>
            </div>
        </div>
        <?php 

            $id = $_SESSION['id'];
            $day = date('w');
            $day = $day - 1;
            $week_start = date("Y/m/d", strtotime('-'.$day.' days'));
            $startdate = strtotime($week_start);
            $currentdate = strtotime($week_start);
            $currentDate =  date("Y/m/d", $currentdate);
            $enddate = strtotime("+7 days", $startdate);
            while ($startdate < $enddate) {
?>
                <div class="day">
                    <h4>
                        <?php  
                            echo date("l", $startdate);
                            ?>
                            <br>
                            <?php
                            echo date("Y/m/d", $startdate);
                        ?>
                    </h4> 
                    <div class="<?php echo date("l", $startdate);
                    if ( date("l") === date("l", $startdate)){
                        echo ' currentDay ';
                    }
                    
                    ?> lane">
<?php 
                        $dayQuery = $conn->prepare("SELECT * FROM task WHERE Date=? and User_ID = ? ORDER BY DATE(Time) DESC, Time ASC");
                        $dayQuery->execute(array(date("Y/m/d", $startdate),$id));
                        $result2 = $dayQuery->setFetchMode(PDO::FETCH_ASSOC); 
                        if($dayQuery->rowCount() > 0) {
                            while($row = $dayQuery->fetch(PDO::FETCH_ASSOC)){
?>
                                    <?php
                                        $color_id = $row['Color_ID'];
                                        $query = $conn->prepare("SELECT Color FROM Color WHERE Color_ID=?");
                                        $query->execute(array($color_id));
                                        $row2 = $query->fetch(PDO::FETCH_BOTH);
                                        if($query->rowCount() > 0) {
                                            $color_name = $row2['Color'];
                                        } 
                                    ?>
                                    <div class="task <?php echo $color_name; ?> >">
                                        <div class="taskWrapper">
                                            <div class="agendaTime">
                                                <h6><?php 
                                                    // echo $row['Time'];
                                                ?></h6>
                                            </div>
                                            <div class="nameHolder">
                                                <h5><?php 
                                                    echo $row['Task'];
                                                ?></h5>
                                            </div>
                                            <div class="agendaTime">
                                                <h6><?php 
                                                    // echo $row['End_time'];  
                                                ?></h6>
                                            </div>  
                                        </div>                                              
                                    </div>
<?php
                            }
                        } 
                    $startdate = strtotime("+1 day", $startdate);
?>
                        </div>
                    </div>
<?php
            }
?>
    </div>
</section>
