<h1>Kép galéria</h2>

<div class="album py-5 bg-light">
    <div class="container">
      <?php if(isset($_SESSION['login'])) { ?>
        <div class="row">
                <form action="?oldal=galeria" method="post" enctype="multipart/form-data">
                    Válassz egy képet:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input class="searchbutton" type="submit" name="kepfeltoltes" value="Feltöltés">
                </form>
        </div>
      <?php } ?>

      <div class="row">
          <?php foreach ($listDirectory as $image) { ?>
            <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="<?php echo $targetDir . $image; ?>" width="100%" height="225" />
            </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="#modal<?php echo $image; ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>