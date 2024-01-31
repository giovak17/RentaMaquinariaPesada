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
</form>

<form action="#">
      <label for="lang">Lenguaje</label>
      <select name="lenguajes" id="lang">
        <option value="javascript">JavaScript</option>
        <option value="php">PHP</option>
        <option value="java">Java</option>
        <option value="golang">Golang</option>
        <option value="python">Python</option>
        <option value="c#">C#</option>
        <option value="C++">C++</option>
        <option value="erlang">Erlang</option>
      </select>
      <input type="submit" value="Enviar" />
</form>
