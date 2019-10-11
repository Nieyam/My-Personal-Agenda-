<?php
    require 'includes/connection.php';
    $options = "";
    $stmt = $conn->query("SELECT DISTINCT Color FROM color");
    while ($row = $stmt->fetch()){
        $options = $options."<option>$row[0]</option>";
    }

    if (isset($_POST['submit'])) {

        // $_SESSION['dashmessage'] = '';

        $taskName  = $time = $endTime = $date = $priority = $description = '';

        $taskName = $_POST['taskName'];
        
        $time = $_POST['time'];

        $endTime = $_POST['endTime'];

        $date = $_POST['date'];

        $priority = $_POST['range'];
        
        $description = $_POST['description'];

        $color_name = $_POST['Color'];
            
        
        $query = $conn->prepare("SELECT Color_ID FROM Color WHERE Color=?");
        $query->execute(array($color_name));
        $row = $query->fetch(PDO::FETCH_BOTH);
        if($query->rowCount() > 0) {
            $color_id = $row['Color_ID'];
        }
        try {
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO task (Task, Priority, User_ID, Description, Color_ID, Date, Time, End_time) 
                    VALUES ('$taskName','$priority','$id', '$description', '$color_id', '$date', '$time', '$endTime')";
            // use exec() because no results are returned
            $conn->exec($sql); 
            $taskOutput = 'Task added on date:' . ' '. $date . ' ' . 'at' . ' ' . $time;
            $_SESSION['dashmessage'] = $taskOutput;
            header("Location: index.php?page=dashboard");
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    } 
?>
<div class="left">
    <section id="dashMessage">
        <div id="messageHolder">
            <h3>Most recent added task:</h3>
            <div id="messageOutput">
                <?php 
                       if (isset($_SESSION['dashmessage'])) {
                            echo $_SESSION['dashmessage'];
                       }
                ?>
                
            </div>
        </div>
    </section>
    <?php 

        include 'pages/agenda.php';
    
    ?>
</div>
<section id="dashboard">
    <form action="" method="post">
        <div id="dashControls">
            <div class="dashInfo">
                <h3 class="title">Task name</h3>
                <input type="text" name="taskName" id="taskName" placeholder="Enter your task name" required>
            </div>
            <div class="dashInfo">
                <h3 class="title">Time</h3>
                <div class="timeHolder">
                    <h5 id="startLabel">Start:</h5>
                    <input type="time" name="time" class="taskTime" required>
                </div>
                
                <div class="timeHolder">
                   <h5 id="finishedLabel">finished:</h5>
                <input type="time" name="endTime" class="taskTime" required> 
                </div>
            </div>
            <div class="dashInfo">
                <h3 class="title">Date</h3>
                <input type="date" name="date" id="date" required>
            </div>
            <div class="dashInfo">
                <h3 class="title">Priority</h3>
                <input type="range" name="range" id="priority" min="1" max="5" required>
            </div>
            <div id="discription">
                <h3>Description</h3>
                <textarea name="description" id="taskDisc" rows="8" required></textarea>
            </div>
            <div class="dashInfo">
                <h3>Colour</h3>
                
                <select placeholder="Choose a colour" name="Color" id="color" required>
                    <option value="" disabled selected >Select your colour</option>
                    <option><?php echo $options;?></option>
                </select>
            </div>
            <button id="goButton" type="submit" name="submit">Go</button>
            <button id="stopButton">Cancel</button>
        </div>
    </form>
</section>