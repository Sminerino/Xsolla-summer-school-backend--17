<?php
	switch ($_SERVER['REQUEST_METHOD'])
	{
		case 'HEAD':
			if(!empty($_GET["file"]))
			{
				if(file_exists($_GET["file"]))
				{
					echo "Размер " .$_GET["file"]. ":".filesize($_GET["file"])." байт."; 
				}
				else
					echo "Файл с таким названием не существует.";
			}
			else echo "Название файла не передано.";		
		break;
		case 'GET':
			if(!empty($_GET["file"])){
				echo "Содержимое файла: ";
				echo readfile($_GET[file]);
			}	
			else echo "Название файла не передано.";
		break;
		case 'POST':
			if(!empty($_GET["file"]) && !empty($_POST["new_data"])){
				if(file_exists($_GET["file"])){
					$strm=fopen($_GET["file"],'w');	
					$res=fwrite($strm, $_POST["new_data"]);
					
					if($res) echo "Данные перезаписаны.";
					else echo "Ошибка записи.";
					
					fclose($strm);
				}
				else echo "Файл с таким названием не существует.";
			}
			else echo "Название файла либо данные не переданы.";
		break;
		case 'DELETE':
			if(!empty($_GET["file"])){
				if(file_exists($_GET["file"]))
				{
					if (unlink($_GET["file"])) 
						echo "Файл удален.";
					else echo "Ошибка удаления.";
				}
				else echo "Файл с таким названием не существует.";
			}
			else echo "Название файла не передано.";
		break;
		case 'PATCH':
		parse_str(file_get_contents('php://input'), $dta);
			if(!empty($_GET["file"]) && !empty($dta)){
				if(file_exists($_GET["file"])){
					
					$strm=fopen($_GET["file"],'a');
					$res=fwrite($strm, $dta["add_data"]);
					
					if($res) echo "Данные добавлены.";
					else echo "Ошибка записи.";
					
					fclose($strm);
				}
				else echo "Файл с таким названием не существует.";
			}
			else echo "Название файла либо данные не переданы.";
		break;
		default:
			echo "err";
		break;
	}
?>