<?php

function alert($tit, $msg,$tempo = 3,$corfundo = 'rgb(100 180 100)',$corfonte = 'white')
{
	echo '<style>.not{

		justify-content: center;
		flex-wrap: wrap;
		background-color:'.$corfundo.';
	color:'.$corfonte.';
	display: flex;
    flex-wrap: wrap;
	flex: 1;
	padding:3px;
	transition: all 1s linear;</style>
	<center>
	<div style="flex: 1;border-radius:25px;left:25%;width:50%;position: fixed;background-color:transparent;">
	<div style="border-radius:15px 15px 0 0" id="not1" class="not">'.$tit.'<br></div>
	<div style="border-radius:0px 0px 15px 15px" id="not2" class="not">'.$msg.'</div>
	</div>
	</center>
	<script>var boleta = true;var boleta2 = true;setInterval(()=>{
	setInterval(()=>{if(boleta === true){document.getElementById("not1").style.opacity = "0";
	document.getElementById("not2").style.opacity = "0";boleta = false;boleta2 = true;
	}if(boleta2 === true){setInterval(()=>{if(document.getElementById("not1").style.opacity === "0")
	{document.getElementById("not1").style.display = "none";document.getElementById("not2").style.display = "none";
	boleta = false;boleta2 = false;}},3000);}},'.($tempo * 1000).');},1);</script>
	';
}


?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junk Code Generator</title>
</head>
<style>
    * {
        background-color: #333;
        color: aliceblue;
        margin: 0;
    }

    .ct {
        width: 90%;
    }

    textarea{
        color: #999;
    }

    textarea,
    table,
    select {
        width: 95%;
        resize: none;
        margin: 3px;
        max-height: 100px;
    }

    input {
        width: 90%;
        resize: none;
    }

    td {
        text-align: center;
    }

    table,
    tr,
    td,
    th { 
        border: 1px solid red;
    }

    button {
        margin: 5px;
        width: 90%;
        border: none;
        background-color: #666;
    }
</style>

<body>
    <center>
        <div class="ct">

            <form action="" method="get">
                <table>
                    <tr>
                        <th colspan=2>Breso JunkCode Generator</th>
                    </tr>
                    <tr>
                        <td>Padrao de Nomes:</td>
                        <td><input type="text" name="variavel" id="" value="BresoDEV" required></td>
                    </tr>
                    <tr>
                        <td><label for="linguagem">Linguagem</label></td>
                        <td>
                            <select name="linguagem" id="">
                                <?php
                                $dir = 'code';
                                if (is_dir($dir)) {
                                    // Abre o diretório
                                    if ($dh = opendir($dir)) {
                                        // Loop pelos arquivos no diretório
                                        while (($file = readdir($dh)) !== false) {
                                            // Verifica se o item é um arquivo e não um diretório
                                            if (is_file($dir . '/' . $file)) {
                                                // Obtém o nome do arquivo sem a extensão
                                                $filenameWithoutExtension = pathinfo($file, PATHINFO_FILENAME);

                                                // Exibe o nome do arquivo sem a extensão
                                                echo '<option>'.$filenameWithoutExtension . "</option>";
                                            }
                                        }
                                        // Fecha o diretório
                                        closedir($dh);
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=2><button type="submit">Gerar Junk Code</button></td>
                    </tr>



                </table>

            </form>
            <br>

            <?php
            if (isset($_GET['variavel'])) 
            {
                alert("Sucesso","Codigo gerado com sucesso");
                echo '
                <table>
                    <tr>
                        <th colspan=2>Variaveis:</th> 
                    </tr>
                    <tr>
                        <td>
                            <textarea name="" id="var" cols="30" rows="10">';
                            echo str_replace("BresoDEV",$_GET['variavel'], file_get_contents('vars/'.$_GET['linguagem'].'.txt'));
                             
                            echo '</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2><button onclick="CopiarVars()">Copiar Codigo</button></td>
                    </tr>
                </table>


                <table>
                    <tr>
                        <th colspan=2>Codigo:</th> 
                    </tr>
                    <tr>
                        <td>
                            <textarea name="" id="code" cols="30" rows="10">';
                            echo str_replace("BresoDEV",$_GET['variavel'], file_get_contents('code/'.$_GET['linguagem'].'.txt'));
                            echo '</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2><button onclick="CopiarCode()">Copiar Codigo</button></td>
                    </tr>
                </table>
                ';
            }

            ?>

            










        </div>
    </center>
</body>
<script>
    function CopiarVars()
    {
        document.getElementById("var").select();
        document.execCommand("copy");
    } 
    function CopiarCode()
    {
        document.getElementById("code").select();
        document.execCommand("copy");
    }

</script>
</html>