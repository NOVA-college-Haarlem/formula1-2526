<form action="search_process.php" method="get">
    <label for="zoekveld">Zoeken</label>
    <input type="search" name="zoekveld" id="zoekveld">
    
    <select name="sorteer" id="sorteer">
        <option value="voornaam">Sorteer op voornaam</option>
        <option value="achternaam">Sorteer op achternaam</option>
        <option value="nationaliteit">Sorteer op nationaliteit</option>
    </select>
    
    <button type="submit">Zoek!</button>
</form>