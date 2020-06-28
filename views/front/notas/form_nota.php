<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 my-5">
      <form action="<?php echo isset($ruta)?$ruta:'/index.php/error' ?>" method="post">

<?php if(isset($nota)){$nota->Fetch();} ?>

        <div class="form-group row">
          <label class="form-label col-md-1">Titulo:</label>
          <div class="col-md-8">
            <input type="text" name="titulo" value="<?php echo isset($nota->Registro['titulo'])?$nota->Registro['titulo']:null ?>" class="form-control" placeholder="Titulo" required>
          </div>
          <label class="form-label col-md-1">Visible: </label>
          <div class="col-md-2">
            <select class="form-control" name="visible">
              <option value="0">Privado</option>
              <option value="1" selected>Publico</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <textarea name="contenido" id="editor" class="form-control" maxlength="500" required><?php echo isset($nota->Registro['contenido'])?$nota->Registro['contenido']:null ?></textarea>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>

      </form>
    </div>
  </div>
</div>


<link rel="stylesheet" href="/assets/trumbowyg/dist/ui/trumbowyg.min.css">
<script src="/assets/trumbowyg/dist/trumbowyg.min.js" charset="utf-8"></script>
<script src="/assets/trumbowyg/dist/langs/es.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $('#editor').trumbowyg({
    lang: 'es'
  });
</script>
