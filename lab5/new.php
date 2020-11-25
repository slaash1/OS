<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
			if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "os":
                        echo("<fieldset><legend><H2>Добавить новую ОС:</H2></legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        echo("Введите Название: <input name='name' type='text' maxlength='16'/> <br>");
                        echo("Введите Тип оборудования: <input name='type' type='text' maxlength='16'/> <br>");
                        echo("Введите Разрядность: <input name='bit' type='text' maxlength='4'/> <br>");
                        echo("Введите Разработчик: <input name='dev' type='text' maxlength='16'/> <br>");
                        echo("Введите Количество пользователей: <input name='num' type='number' min='1' max='999999999' value='1'/> <br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "dm":
                        echo("<fieldset><legend><H2>Добавить новый Цифровой магазин:</H2></legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        echo("Введите Название: <input name='name' type='text' maxlength='16'/> <br>");
                        echo("Введите url: <input name='url' type='text' maxlength='128'/> <br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "dk":
                        $queryTab_0 = "os";
                        $queryTab_1 = "dm";
                        $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                        $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                        $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                        $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend><H2>Добавить Цифровой ключ:</H2></legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите дата приобретения: <input name='date_b' type='date'/> <br>");
                        echo("Введите дата окончания: <input name='date_e' type='date'/> <br>");
                        
                        $id_0 = "os_select";
                        echo("<label for='$id_0'>Список ОС: </label>");
                        echo("<select id='$id_0' name='$id_0'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_0)){
                            echo("<option value='$row[0]'> $row[0]. $row[1]|$row[2]</option>");
                        }
                        echo("</select><br>");
                        $id_1 = "dm_select";
                        echo("<label for='$id_1'>Список Цифровых магазинов: </label>");
                        echo("<select id='$id_1' name='$id_1'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_1)){
                            echo("<option value='$row[0]'> $row[0]. $row[1]|$row[2]</option>");
                        }
                        echo("</select><br>");
                        
                        
                        echo("Введите стоимость: <input name='cost' type='number'min='0' max='999999' value='2500' /> <br>");
                        echo("Введите ключ: <input name='dkey' type='text' maxlength='32' /> <br>");
                        
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                }
			   
			}
		?>
		<a href="index.php"> Вернуться к списку </a> 
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>