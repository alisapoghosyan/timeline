<!doctype html>
<html lang="en">
<head>
  @include('head')
</head>
<body>
      <div class="modalDiv editModal">
          <div class="form">
              <i class="fas fa-times editClose"></i>
                  <div class="title">Welcome</div>
                  <div class="subtitle">Let's edit users!</div>
                  <div class="input-container ic1">
                      <input id="updateFirstname" required name="updateFirstname"  class="input" type="text"/>
                      <div class="cut"></div>
                      <label for="updateFirstname" class="placeholder">First name</label>

                  </div>
                  <div class="input-container ic2">
                      <input required id="updateLastname"  required name="updateLastname"  class="input" type="text" />
                      <div class="cut"></div>
                      <label for="updateLastname" class="placeholder">Lastname</label>
                  </div>
                  <div class="input-container ic2 selectdiv">
                      <label for="updateStartTime">Start :</label>
                      <select value="9" id="updateStartTime" name="updateStartTime">
                          <?php for($i = 1; $i <= 24; $i++): ?>
                          <option value="<?= $i; ?>"><?=$i?>:00</option>
                          <?php endfor ?>
                      </select>
                      <label for="updateEndTime">End :</label>
                      <select id="updateEndTime" name="updateEndTime">
                          <?php for($i = 1; $i <= 24; $i++): ?>
                          <option value="<?= $i; ?>"><?=$i?>:00</option>
                          <?php endfor ?>
                      </select>
                  </div>
                  <div class="input-container ic2">
                  <span class="btn  btn-file">
                     <input id="updateImg" class = 'photos' required name="img" class="input" type="file"  />
                     Choose img...
                  </span>
                  </div>
                  <button type="submit" class="editSubmit submit">submit</button>
      </div>
      </div>
</body>
</html>
