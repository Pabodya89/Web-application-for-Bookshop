<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/temp.css">
    <title>Ajax practice</title>
</head>

<body>
    <div class="container">
        <?php
            if(isset($data))
            {
                show($data['fname']);
            }
        ?>
    </div>
</body>