    <div class="input-container ic1">
        <input id="firstname" required name="firstname"  class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">First name</label>

    </div>
    <div class="input-container ic2">
        <input id="lastname"  required name="lastname"  class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Lastname</label>
    </div>
    <div class="input-container ic2 selectdiv">
        <label for="end">Start :</label>
        <select value="9" id="starttime" name="starttime">
            <?php for($i = 1; $i <= 24; $i++): ?>
            <option <?php if($i == '9'){echo("selected");}?>  value="<?= $i; ?>"><?=$i?>:00</option>
            <?php endfor ?>
        </select>
        <label for="end">End :</label>
        <select id="endtime" name="endtime">
            <?php for($i = 1; $i <= 24; $i++): ?>
            <option <?php if($i == '18'){echo("selected");}?>  value="<?= $i; ?>"><?=$i?>:00</option>
            <?php endfor ?>
        </select>
    </div>
    <div class="input-container ic2">
              <span class="btn  btn-file">
                 <input id="img" class='photos' required name="img" class="input" type="file"  />
                 Choose img...
              </span>
    </div>

