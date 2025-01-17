<form>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputmodule">module</label>
            <select name="module" class="form-control" id="exampleInputmodule">
                <option value="module1">module 1</option>
                <option value="module2">module 2</option>
                <option value="module3">module 3</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="compétence 1">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Date de début</label>
            <input name="startDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="2023-01-01">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Date de fin</label>
            <input name="endDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="2023-12-31">
        </div>
        
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea name="moduleDescription" class="form-control" rows="7" id="inputDescription" placeholder="Entrez la description">Description de CNMH</textarea>
        </div>

    </div>

    <div class="card-footer">
        <a href="./index.php" class="btn btn-default">Annuler</a>
        <button type="submit" class="btn btn-info">Soumettre</button>
    </div>
</form>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill editor
    var quill = new Quill('#inputDescription', {
      theme: 'snow'  // 'snow' is the built-in theme, you can customize this
    });
  </script>