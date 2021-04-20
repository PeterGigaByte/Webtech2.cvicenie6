<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Cvičenie 6</title>
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

            <div id="result" class="input-group mb-3">

            </div>
            <div id="resultTwo" class="input-group mb-3">

            </div>

        </div>
    </main>
    <h1>Popis REST api</h1>
    <div class="container bold">
        <div class="row">
            <div class="col">
                <ul class="list-unstyled">
                    <li>Modely
                        <ul>
                            <li>Country.php</li>
                            <li>Day.php</li>
                            <li>Holiday.php</li>
                            <li>Memorable_day.php</li>
                            <li>Name.php</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col">
                <ul class="list-unstyled">
                    <li>Služby
                        <ul>
                            <li>holidays
                                <ul>
                                    <li>[GET] findAll.php</li>
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li>memorable_days
                                <ul>
                                    <li>[GET] findAll.php</li>
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li>names
                                <ul>
                                    <li>[GET] findByDateAndCountry.php</li>
                                    <li>[GET] findByName.php</li>
                                    <li>[POST] insertNew.php</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container bold">
        <h2>Popis jednotlivých častí</h2>
        <h3>Nájdi všetky sviatky</h3>
        https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/holidays/findAll.php?country=
        <p>Vyhľadá sviatky, vstupný parameter musí byť zadaný krajina, ktorej sviatky chceme</p>
        <h3>Nájdi všetky pamätné dni</h3>
        https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/memorable_days/findAll.php?country=
        <p>Vyhľadá všetky pamätné dni, vstupný parameter musí byť zadaný krajina, ktorej pamätné dni chceme</p>
        <h3>Nájdi meniny podľa dátumu a krajine</h3>
        https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/names/findByDateAndCountry.php?day=&month=&country=
        <p>Vyhľadá kto má meniny, ktorý deň a v akej krajine, vstupom je deň, mesiac, a krajina</p>
        <h3>Nájdi kedy má osoba meniny</h3>
        http://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/names/findByName.php?name=&country=
        <p>Vyhľadá podľa mena a krajiny kedy má dané meno meniny v danej krajine</p>
        <h3>Vloží meno do kalendára</h3>
        https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/names/insertNew.php
        <p>Vstupné parametre meno, dátum, krajina, do ktorej chceme meno vložiť</p>
        <h2>Príklad</h2>

        <a href="https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/holidays/findAll.php?country=SK">https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/holidays/findAll.php?country=SK</a>
        <a href="https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/memorable_days/findAll.php?country=SK">https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/memorable_days/findAll.php?country=SK</a>
        <a href="https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/names/findByDateAndCountry.php?day=29&month=6&country=SK">https://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/names/findByDateAndCountry.php?day=29&month=6&country=SK</a>
        <a href="http://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/names/findByName.php?name=Peter&country=SK">http://wt130.fei.stuba.sk/cvicenia/cvicenie6/service/names/findByName.php?name=Peter&country=SK</a>

    </div>



</div>
<div style="height: 50px">
<footer class="footer">
    ©PeterRigoDevelopment
</footer>
<div id="loading" class="center-screen"><img class="loading-img" alt="ha"  src="images/loading.gif"></div>
<div id="overlay" class="overlay"></div>

</body>

</html>
