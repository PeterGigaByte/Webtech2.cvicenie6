<?php
echo '
<h1 class="display-2">Kedy má meniny?</h1>
<div class="input-group mb-3">
    <div class="input-group input-group-lg">
      <label class="input-group-text" for="inputGroupSelect01">Krajiny</label>
      <select class="form-select" id="inputGroupSelect01">
        <option selected>Vyber krajinu...</option>
        <option value="ALL">Všetky dostupné meniny</option>
        <option value="SK">Slovensko</option>
        <option value="SKd">Slovensko doplnené</option>
        <option value="CZ">Česko</option>
        <option value="HU">Maďarsko</option>
        <option value="PL">Poľsko</option>
        <option value="AT">Rakúsko</option>
      </select>
    </div>
</div>
<div class="input-group mb-3">
    <div class="input-group input-group-lg">
      <span class="input-group-text" id="inputGroup-sizing-lg">Meno</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>
</div>
<div class=" mx-auto">
    <div class="input-group input-group-lg ">
    <button type="button" class="btn btn-success">Potvrdiť</button>
    </div>
</div>
';
