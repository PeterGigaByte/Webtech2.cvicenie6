<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Cvičenie 5</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.14/dist/jBox.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.14/dist/jBox.all.min.css" rel="stylesheet">
    <script src="js/javascript.js"></script>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="icon" href="images/icon.png">

</head>
<body class="container">
<header>
    <span class="welcome-header">Dátumy, Rest api</span>
</header>
<div class="container border">
    <main>
        <div class="row">
            <div class="input-group mb-3">
                    <div class="input-group input-group-lg">
                    <select class="form-select" id="inputGroupSelect02">
                        <option selected>Vyber si čo chceš vykonať...</option>
                        <option value="whoHasName">Chcem zistiť kto má meniny.</option>
                        <option value="whenHasName">Chcem zistiť kedy má osoba meniny.</option>
                        <option value="holidaysSK">Chcem získať zoznam sviatkov na Slovensku.</option>
                        <option value="holidaysCZ">Chcem získať zoznam sviatkov v Českej republike.</option>
                        <option value="memorableDaysSK">Chcem získať zoznam pamätných dní na Slovensku.</option>
                        <option value="insertNewNameSKd">Chcem vložiť nové meno do kalendára.</option>
                    </select>
                    <label class="input-group-text" for="inputGroupSelect02">Akcia</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <?php include_once "forms/holidaysCZ.php"?>
            </div>
            <div class="input-group mb-3">

            </div>
        </div>
    </main>

</div>

<footer class="footer">
    ©PeterRigoDevelopment
</footer>
<div id="loading" class="center-screen"><img class="loading-img" alt="ha"  src="images/loading.gif"></div>
<div id="overlay" class="overlay"></div>

</body>

</html>
