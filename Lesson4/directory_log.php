<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
<?php
    function writeDir($dir = '.'){
        foreach (scandir($dir) as $file){
            if(in_array($file,['.','..']))
                continue;
            echo '<li>' . $file;
            if(is_dir($file)){
                echo '<ul>';
                echo writeDir($file);
                echo '</ul>';
            }
            echo '</li>';
        }
    }
    writeDir();
?>
    </ul>
</body>
</html>

<?php
    function notEmpty($item){
        return trim($item) != "";
    }
    function getNum($item){
        if (substr($item, 0, 3) != 'log')
            return 0;
        return (int)substr($item, 3);
    }
    function logTxt()
    {
        $logFileName = "log/log.txt";
        $logDir = pathinfo($logFileName, PATHINFO_DIRNAME) . '/';
        $maxRows = 2;
        if (file_exists($logFileName)) {
            $log = file_get_contents($logFileName);
            //Переименовывание log.txt в logN.txt
            if (count(array_filter(explode(PHP_EOL, $log), "notEmpty")) >= $maxRows) {
                $max = max(array_map('getNum',scandir($logDir)));
                rename($logFileName, $logDir . pathinfo($logFileName, PATHINFO_FILENAME) . ($max + 1) . '.' . pathinfo($logFileName, PATHINFO_EXTENSION));
            }
        }
        file_put_contents($logFileName, date('d.m.yy H:i:s') . PHP_EOL, FILE_APPEND);
    }

    logTxt();
?>