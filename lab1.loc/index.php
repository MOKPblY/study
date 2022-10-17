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
        <form method="POST" action="/">
            <table>
                <tr>
                    <?php 

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            define('P',TRUE);
                            
                        } else {
                            define('P',FALSE);
                        }

                    ?>

                    <td rowspan="2" id = "c11">

                        <?php

                            $names = ['surname','name','patro'];
                            $labels = ['Фамилия','Имя','Отчество'];

                            foreach($names as $i => $name) {
                                echo "<label for = $name>$labels[$i]:</label>
                                <input type=\"text\" name = $name 
                                pattern = \"[А-Я][a-я]{1,16}\" 
                                maxlength = \"17\" ";
                                if (P) {
                                    $key = $names[$i];
                                    echo "value = $_POST[$key] ";
                                };
                                echo "required><br>";
                            };
                        
                        ?>

                    </td>

                    <td  id = "c121">
                        <label for="grad_date">Дата окончания школы:</h3>
                        <input type="date" name = "grad_date" value = "<?php if (P): echo $_POST['grad_date']; 
                        elseif ($_SERVER['REQUEST_METHOD'] == 'GET'): echo "2021-07-31"; endif; ?>" max = "19.09.2022" required><br>
                        <label for="tel">Телефон:</label>
                        <input type="tel" name="tel" placeholder = "+7-XXX-XXX-XXXX" pattern="\+7(-)?(49|92)\d(-)?\d{3}(-)?\d{4}" maxlength = "15" value = "<?php if (P) { echo $_POST['tel']; };?>" required><br>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" placeholder = "vasyapupkin@dom.ru" pattern="[a-z][0-9a-z_]{2,14}@[a-z]{2,10}\.[a-z]{2,3}" maxlength = "30" value = "<?php if (P) { echo $_POST['email']; }; ?>" required>
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

                                if (P) { 

                                    foreach($lables as $i => $lable) {
                                        echo "<span>$lable</span>
                                        <input type=\"radio\" name = \"prog\" id= $names[$i] value = $lable";
                                        if ($_POST['prog'] == $lable) {
                                            echo " checked ";
                                        };
                                        echo "><br>";
                                    };

                                } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

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
                        <input type="range" name="score" min="1" max="400" value = "<?php if (P) { echo $_POST['score']; }; ?>">
                        <span>400</span>
                    </td>


                <tr>
                    <td rowspan="2" id = "c21">
                        <label for="file">Загрузить аттестат:<br></label>
                        <label id="flabel">Выберите файл<input type="file" name = "file" required></label>
                        
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
                                        if (P and $_POST['univer'] == $value){
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
                                    if (P and $_POST[$name]) {
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
                        <input type="checkbox" name="dorm" value="Да" <?php if (P and $_POST['dorm']) { echo "checked";}; ?>>
                    </td>
                <tr>
                    <td colspan="3" id="c30">
                        <input type="submit">
                        <input type="reset">
                    </td>
                </tr>
            </table>
        </form>
        <div>
            <?php
                if(P) {
                    
                    $names = [
                        'Фамилия',
                        'Имя',
                        'Отчество',
                        'Дата окончания школы', 
                        'Телефон',
                        'E-mail', 
                        'Программа', 
                        'Количество баллов', 
                        'Файл', 
                        'Университет',
                        'Наличие красного диплома', 
                        'Прошел ГТО', 
                        'Призер олимпиады', 
                        'Необходимо общежитие'
                    ];

                    $values = array_values($_POST);

                    foreach($values as $key=>$value) {
                        echo "<p>$names[$key] = ";
                        if (!$value):
                            $value = 'Нет';
                        endif;

                        echo "$value</p>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>