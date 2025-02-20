<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $data=$_POST['data'];
                $list = array(
                    "naruto", "enigma", "wafer", "iiitn", "college",
                    "mystic", "phoenix", "galaxy", "quantum", "zenith",
                    "matrix", "element", "aurora", "neutron", "oracle",
                    "voyager", "nebula", "echo", "gravity", "cosmos",
                    "raven", "spectra", "infinity", "novatron", "horizon",
                    "cypher", "nexus", "zephyr", "vertex", "eclipse",
                    "legacy", "radiance", "vortex", "spectrum", "lumen",
                    "atlas", "seraph", "empyrean", "tesseract", "odyssey",
                    "solstice", "aphelion", "paradox", "catalyst", "halcyon",
                    "kismet", "rhapsody", "synthesis", "empire", "monolith",
                    "arcane", "drifter", "pinnacle"
                );
                
                
                if(in_array($data, $list)){
                    $index = array_search($data, $list);
                    ?>
                    <form id="secondForm" action="process.php" method="POST">
                        <input type="hidden" name="index" value="<?php echo $index ?>"/>
                    </form>
                    <script>
                        document.getElementById("secondForm").submit();
                    </script>
                    <?php
                } else {
                    echo "Are you looking for a cookie.. Hmmm. <br> It is Not a vlaid cookie.<br> try again";
                }
            } else {
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="text" id="data" name="data" placeholder="enigma"/>
                    <button>Submit</button>
                </form>
                <?php
            }
        ?>
</body>
</html>