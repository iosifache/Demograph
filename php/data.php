<?php
    if(isset($_GET['region']) && isset($_GET['sex']) && isset($_GET['age'])){

        // GET data
        $region = iconv('UTF-8', 'ASCII//TRANSLIT', $_GET['region']);
        $sex = $_GET['sex'];
        $age = $_GET['age'];

        // Clasa varsta
        if ($age%10 < 5){
            $age_inf=$age - $age%10;
            $age_sup=$age_inf + 5;
        }
        else{
            $age_inf=$age - $age%10 +5;
            $age_sup=$age_inf + 5;
        }
        $age_in = "intre " . $age_inf . " si " . $age_sup . " ani";

        // Populatie
        $data = [0,0,0,0,0];
        $conn = mysqli_connect("localhost", "root", "", "demo");
        $query = "SELECT * FROM `populatie_varsta` WHERE `varsta` LIKE '%{$age_inf}%'";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $data[0] = $row['populatie'];
        }

        // Durata
        $query = "SELECT * FROM durata_judet WHERE judet='$region'";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $data[1] = $row['durata'];
        }

        // Nascuti
        $query = "SELECT * FROM nascuti_judet WHERE judet='$region'";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $data[2] = $row['nascuti'];
        }

        // Decedati
        $query = "SELECT * FROM `decedati_judet` WHERE `judet`='$region'";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $data[3] = $row['decedati'];
        }

        // Decedati pe clasa de varsta
        $query = "SELECT * FROM `decedati_varsta` WHERE `varsta` LIKE '%{$age_inf}%'";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $data[4] = $row['decedati'];
        }

        // Echo data
        echo json_encode($data);

    }
?>
