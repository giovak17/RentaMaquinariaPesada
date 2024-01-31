<label for="lang">Lenguaje</label>
    <select name="lenguajes" id="lang">
        <?php
            include('modelos.php');
            $miModelos = new Actor ();
            $dataSet = $miModelos -> getAllModelos();
            if ($dataSet != 'wrong'){
                while ($rs = mysqli_fetch_assoc($dataSet)){
                        echo "<br>";
                        //echo print_r($registro[actor_id]);
                        echo ($rs['actor_id'])." .- ";
                        echo "<option value='".$rs['numModelo']."'>".$rs['numModelo']."</option>"
                    }
                }
        ?>
    </select>
