<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>videOpera - <?php echo $title; ?></title>

    <script>
    WebFontConfig = {
        custom: {
            families: ["Montserrat", "Hind"],
            urls: ["style.css"]
        }
    };

    (function(d) {
        var wf = d.createElement("script"),
            s = d.scripts[0];
        wf.src =
            "https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
    </script>


    <?php echo $css;?>
</head>

<body>
    <header class="site-header container">
        <nav>
        </nav>
    </header>
    <?php echo $content; ?>
    <?php echo $js; ?>
</body>

</html>
