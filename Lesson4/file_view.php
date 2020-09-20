<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File view</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">
</head>

<body>
    <div class="view center">
        <?php
            $files = scandir(".\img");
            foreach ($files as $file){
                if(in_array(pathinfo($file, PATHINFO_EXTENSION),['jpg','jpeg','svg']))
                    echo "<img class=\"image\" src=\"img/$file\"/>";
            }
        ?>
    </div>

    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <img id="modal_img" src="" alt="">
        </div>
        <button class="modal-close is-large" aria-label="close" onclick="dlg.classList.remove('is-active')"></button>
    </div>
    <script>
        let dlg = document.querySelector('.modal');
        let dlgImg = document.querySelector('#modal_img');
        document.querySelector('.view').addEventListener('click',
            function (event)
            {
                let img = event.target.getAttribute('src');
                dlg.classList.add('is-active');
                dlgImg.setAttribute("src",img);
            });
    </script>

</body>
</html>

