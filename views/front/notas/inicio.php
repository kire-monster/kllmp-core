
<!----------------------------------->
    <div class="container">
      <div class="row my-4">
        <div class="col-lg-12">

        </div>
      </div>

      <div class="row">

<?php if(isset($notas)): ?>
  <?php if($notas->Fetch()): ?>
    <?php do{ ?>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?php echo $notas->Registro['titulo'] ?></h4>
              <p class="card-text">
                <?php echo $notas->Registro['contenido'] ?>
              </p>
            </div>
            <div class="card-footer">

              <p class="card-text">
                publicado: <?php echo $notas->Registro['fecha'] ?><br>
                autor: <?php echo $notas->Registro['nombre'] ?><br><br>
                <a class="btn btn-success" href="<?php echo "/index.php/notas/editar/{$notas->Registro['idNota']}" ?>">editar</a>
              </p>



            </div>
          </div>
        </div>

    <?php }while($notas->Fetch()); ?>
  <?php else: ?>
      <h5>sin notas</h5>
  <?php endif; ?>
<?php endif; ?>


      </div>

    </div>
