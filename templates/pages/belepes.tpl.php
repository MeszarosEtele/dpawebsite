    <form action="?oldal=belepes" method="post">
      <fieldset>
        <legend>Bejelentkezés</legend>
        <br>
        <input type="text" name="felhasznalo" placeholder="felhasználónév" required><br><br>
        <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
        <input type="submit" name="belepes" value="Belépés">
        <br>&nbsp;
      </fieldset>
    </form>
    <h3>Regisztrálja magát, ha még nem felhasználó!</h2>
    <main role="main">
  <div class="row g-5">
    <div class="col-md-12">
      <article class="blog-post">
        <h4 class="mb-3">Regisztráció</h4>
        <form method="post" class="needs-validation" action="?oldal=belepes">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="vezeteknev">Vezetéknév</label>
              <input type="text" class="form-control" id="vezeteknev" name="vezeteknev" placeholder="" value="<?php echo $_POST ? $_POST['vezeteknev'] : '';?>" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="keresztnev">Keresztnév</label>
              <input type="text" class="form-control" id="keresztnev" name="keresztnev" placeholder="" value="<?php echo $_POST ? $_POST['keresztnev'] : '';?>" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="felhasznalonev">Felhasználónév </label>
            <input type="text" class="form-control" id="felhasznalonev" name="felhasznalonev" value="<?php echo $_POST ? $_POST['felhasznalonev'] : '';?>">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo $_POST ? $_POST['email'] : '';?>" required="">
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="jelszo">Jelszó</label>
            <input type="password" class="form-control" id="jelszo" name="jelszo" required="">
          </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" name="regisztral" type="submit">Regisztráció</button>
        </form>
      </div>
    </article>
    </div>
  </div>
</main>
