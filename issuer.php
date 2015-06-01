<div id="corps">
  <h1>Issuer</h1>

  <p>
        Formulaire
  </p>
    <form action="layout.php?page=receiver.php" method="POST" enctype="multipart/form-data">
        <p>
            <label> Fist Name:
                <input type="text" name="first_name" />
            </label>
        </p>
        <p>
            <label> Do you like chicken:
                <input type="checkbox" name="chicken" />
            </label>
        </p>
        <p>
            <select name="choix">

                <option value="choix1">Choix 1</option>

                <option value="choix2">Choix 2</option>

                <option value="choix3">Choix 3</option>

                <option value="choix4">Choix 4</option>

            </select>
        </p>
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <input type="file" name="sendFile"/>
        </p>
        <p>
            <label> Submit
                <input type="submit" />
            </label>
        </p>
    </form>
</div>