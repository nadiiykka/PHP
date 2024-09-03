<form action="omalahetys.php" method="post">
    <p>Nimi: <br>
        <input type="text" name="nimi" required>
    </p>
    <p>Palaute: <br>
        <textarea name="viesti" required></textarea>
    </p>
    Miksi kävit tällä sivustolla?:
    <select name="miksi">
        <option value="Tein tämän sivuston">Tein tämän sivuston</option>
        <option value="Olen opettaja ja tarkistan tehtävän" selected>Olen opettaja ja tarkistan tehtävän</option>
        <option value="Enkö voi?">Enkö voi?</option>
        <option value="En tiedä">En tiiä</option>
    </select>

    <p>Lempivärisi: <br>
        <input type="radio" name="color" value="pinkki"> pinkki <br>
        <input type="radio" name="color" value="vihreä"> vihreä <br>
        <input type="radio" name="color" value="punainen"> punainen <br>
        <input type="radio" name="color" value="sininen"> sininen <br>
        <input type="radio" name="color" value="eri"> muu <br>
    </p>
    <p>Jos muu, niin mikä väri?: <br>
        <input type="text" name="custom_color">
    </p>

    <p><input type="checkbox" name="vahvistus" value="Kyllä" checked>
    Pidän tästä sivustosta.</p>

    <p><input type="submit" value="Lähetä"></p>
</form>
