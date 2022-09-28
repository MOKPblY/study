
<?php 


    require('file_init.php');
    $edit = false;
    if(isset($_GET['id'])){
        $f = file(FNAME);
        $values = explode($delimeter, $f[$_GET['id']]);
        $edit = true;

        $datanames = [
            'id',
            'surname',
            'name',
            'patro',
            'grad_date', 
            'tel',
            'email', 
            'prog', 
            'score', 
            'file', 
            'univer',
            'red', 
            'gto', 
            'olymp', 
            'dorm'
        ];
        
        $data = [];

        foreach ($datanames as $i => $value) {
            $data[$datanames[$i]] = $values[$i];
        }
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="2.css">
</head>
<body>
    <div class="container">
        <h1 >Поступление в ВУЗ</h1>
        
        <?php
            
            if ($edit) {
                $action = "update.php";
            } else {
                $action = "add.php";
            }
        ?>

        <form method="POST" action= <?php echo $action?> >

        
            <table>
                <tr>

                    <td rowspan="2" id = "c11">

                        <?php

                            $names = [
                                'id',
                                'surname',
                                'name',
                                'patro'
                            ];
                            $labels = [
                                'Номер записи',
                                'Фамилия',
                                'Имя',
                                'Отчество'
                            ];

                            foreach($names as $i => $name) {
                                
                                $value = "";
                                $extra = "";

                                if($i == 0){    //Выбор значения номера
                                    $pattern = "[1-9][0-9]{0,12}";
                                    if ($edit) {
                                        $value = $data['id'];    
                                    } else {
                                        $value = count(file(FNAME));
                                    }
                                    
                                    $extra = " readonly ";
                                } else {
                                    $pattern = "[А-Я][a-я]{1,16}";
                                    if ($edit) {
                                        $key = $names[$i];
                                        $value = $data[$key];
                                    };
                                };                                

                                echo "<label for = $name>$labels[$i]:</label>
                                <input type=\"text\" name = $name 
                                pattern = $pattern 
                                maxlength = \"17\" value = \"$value\" $extra required ><br>";
                            };
                        
                        ?>

                    </td>

                    <td  id = "c121">
                        <label for="grad_date">Дата окончания школы:</h3>
                        <input type="date" name = "grad_date" value = "<?php if ($edit) { echo $data['grad_date']; } 
                        else { echo "2021-07-31"; }; ?>" max = "19.09.2022" required><br>
                        <label for="tel">Телефон:</label>
                        <input type="tel" name="tel" placeholder = "+7-XXX-XXX-XXXX" pattern="\+7(-)?(49|92)\d(-)?\d{3}(-)?\d{4}" maxlength = "15" value = "<?php if ($edit) { echo $data['tel']; };?>"><br>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" placeholder = "vasyapupkin@dom.ru" pattern="[a-z][0-9a-z_]{2,14}@[a-z]{2,10}\.[a-z]{2,3}" maxlength = "30" value = "<?php if ($edit) { echo $data['email']; }; ?>" required>
                    </td>   





                    <td rowspan="2" id = "c13">
                        <label>Программа обучения:<br><br></label>
                            <?php

                                $names = [
                                    'bac',
                                    'mag',
                                    'spec',
                                    'asp'
                                ];

                                $lables = [
                                    'Бакалавриат',
                                    'Магистратура',
                                    'Специалитет',
                                    'Аспирантура'
                                ];

                                if ($edit) { 

                                    foreach($lables as $i => $lable) {
                                        echo "<span>$lable</span>
                                        <input type=\"radio\" name = \"prog\" id= $names[$i] value = $lable";
                                        if ($data['prog'] == $lable) {
                                            echo " checked ";
                                        };
                                        echo "><br>";
                                    };

                                } else {

                                    foreach($lables as $i => $lable) {
                                        echo "<span>$lable</span>
                                        <input type=\"radio\" name = \"prog\" id= $names[$i] value = $lable";
                                        if ($i == 0) {
                                            echo " checked ";
                                        };
                                        echo "><br>";
                                    };
                                    
                                };

                            ?>

                    </td>
                    
                </tr>
                <tr>
                    <td id = "c122">
                        <label for="score">Количество баллов:</label><br>
                        <span>1</span>
                        <input type="range" name="score" min="1" max="400" value = "<?php if ($edit) { echo $data['score']; }; ?>">
                        <span>400</span>
                    </td>


                <tr>
                    <td rowspan="2" id = "c21">
                        <label for="file">Загрузить аттестат:<br></label>
                        <label id="flabel">Выберите файл<input type="file" name = "file"></label>
                        
                    </td>
                    <td id = "c221">
                        <label for="univer">ВУЗ</label><br>
                            
                        <select name = "univer">

                            <?php

                                    $options = [
                                        'МЭИ', 
                                        'МГТУ', 
                                        'МФТИ', 
                                        'МИРЭА', 
                                        'МТУСИ', 
                                        'МГУ'
                                    ];
                                    
                                    foreach($options as $i=>$value){
                                        echo "<option ";
                                        if ($edit and $data['univer'] == $value){
                                            echo "selected";
                                        };
                                        echo ">$value</option>";
                                    };
                                    
                            ?>
                        </select>
                    </td>
                    <td rowspan="2" id="c23">

                        <label>Дополнительные баллы:</label><br><br>
                            
                            <?php

                                $boxes = [
                                    'red' => 'Красный аттестат',
                                    'gto' => 'ГТО',
                                    'olymp' => 'Олимпиада'
                                ];

                                
                                foreach($boxes as $name=>$label){
                                    echo "<span>$label</span>
                                    <input type=\"hidden\" name = $name>
                                    <input type=\"checkbox\" name = $name value=\"Да\" ";
                                    if ($edit and $data[$name] == 'Да') {
                                        echo " checked ";
                                    };
                                    echo "><br>";
                                };
                            ?>

                    </td>
                </tr>
                <tr>
                    <td id="c222">
                        <label for="dorm">Общежитие</label>
                        <input type="hidden" name = "dorm">
                        <input type="checkbox" name="dorm" value="Да" <?php if ($edit and $data['dorm'] == 'Да') { echo "checked";}; ?>>
                    </td>
                <tr>
                    <td colspan="3" id="c30">
                        <input type="submit" name = "send" value =         
                            <?php
            
                                if ($edit) {
                                    $value = "Сохранить";
                                } else {
                                    $value = "Добавить";
                                }
                                echo $value;
                            ?> >
                        <input type="reset">
                    </td>
                </tr>
                
            </table>
        </form>
        
        <table>
                <tr>
                    <form action = "changes.php" method = "POST">
                        <td colspan="3" id="c30">
                            <label for="number">Номер редактируемой строки: </label>
                            <input type="text" name = "number" required>

                            <input type="submit" name = "update" value = "Редактировать">
                            <input type="submit" name = "drop" value = "Удалить">

                        </td>
                    </form>
                </tr>
                <tr>
                    <form action = "erase.php" method = "POST">
                        <td colspan="3" id="c30">

                            <input type="submit" name = "erase" value = "Удалить все">

                        </td>
                    </form>
                </tr>
        </table>
        

    </div>
    <div id = "info">
            <?php


                if (count(file(FNAME)) > 1) {
                    echo "<table>";
                        $f_strs = file(FNAME);
                        foreach($f_strs as $i => $str) {

                            $values = explode($delimeter,$str);
                            
                            echo "<tr>";

                                if ($i == 0){
                                    $tag = "th";
                                } else {
                                    $tag = "td";
                                };
                                
                                foreach($values as $j => $value) {
                                    echo "<$tag>$value</$tag>";
                                };

                            echo "</tr>";

                        };
                    echo "</table>";
                };
            ?>
        </div>
</body>
</html>