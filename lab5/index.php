<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
		<?
            $queryTab = "os";
            $headText = "Таблица Операционные системы";
            $arrayTitle = array("№","Название", "Тип оборудования", "Разрядность", "Разработчик", "Количество пользователей", "Редактировать", "Удалить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            echo("<div> <a href='new.php?Index=$queryTab'> Добавить новую ОС</a> </div>");
            echo("</div>");
            
            $queryTab = "dm";
            $headText = "Таблица Цифровые магазины";
            $arrayTitle = array("№","Название", "url", "Редактировать", "Удалить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            echo("<div> <a href='new.php?Index=$queryTab'> Добавить новый Цифровой магазин</a> </div>");
            echo("</div>");
             
            $queryTab = "dk_info";
            $headText = "Таблица Цифровые ключи";
            $arrayTitle = array("№","Дата приобретения", "Дата окончания", "ОС", "Цифровой магазин", "Стоимость", "Ключ",  "Редактировать", "Удалить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div>");
            echo("<div> <a href='new.php?Index="."dk"."'> Добавить Цифровой ключ</a> </div>");
            echo("</div>");
            
            echo("<br>");
            echo("<div> <a href='gen_pdf.php'> Открыть pdf </a> </div>");
            echo("<div> <a href='gen_xls.php'> Открыть xls </a> </div>");
            echo("</div>");


		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>