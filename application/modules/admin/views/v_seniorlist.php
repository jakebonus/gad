<!-- page content -->
<div class="right_col page-masterlist" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <center><h2>SENIOR CITIZEN LIST</h2></center>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="frm_filter_senior" name="frm_filter_senior">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label"> Gender</label>
                  <select class="form-control input-sm" id="ftr_gender" name="ftr_gender">
                    <option value="ALL">- ALL -</option>
                    <option value="1">MALE</option>
                    <option value="2">FEMALE</option>
                  </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label"> Barangay</label>
                  <select class="form-control input-sm" id="ftr_brgy" name="ftr_brgy">
                      <option value="ALL">- ALL -</option>
                      <option value="1">Sto Rosario</option>
                      <option value="2">Alasas</option>
                      <option value="3">Baliti</option>
                      <option value="4">Bulaon</option>
                      <option value="5">Calulut</option>
                      <option value="6">Dela Paz Norte</option>
                      <option value="7">Dela Paz Sur</option>
                      <option value="8">Del Carmen</option>
                      <option value="9">Del Pilar</option>
                      <option value="10">Del Rosario</option>
                      <option value="11">Dolores</option>
                      <option value="12">Juliana</option>
                      <option value="13">Lara</option>
                      <option value="14">Lourdes</option>
                      <option value="15">Magliman</option>
                      <option value="16">Maimpis</option>
                      <option value="17">Malino</option>
                      <option value="18">Malpitic</option>
                      <option value="19">Pandaras</option>
                      <option value="20">Panipuan</option>
                      <option value="21">Pulungbulu</option>
                      <option value="22">Quebiawan</option>
                      <option value="23">Saguin</option>
                      <option value="24">San Agustin</option>
                      <option value="25">San Felipe</option>
                      <option value="26">San Isidro</option>
                      <option value="27">San Jose</option>
                      <option value="28">San Juan</option>
                      <option value="29">San Nicolas</option>
                      <option value="30">San Pedro</option>
                      <option value="31">Sta. Lucia</option>
                      <option value="32">Sta. Teresita</option>
                      <option value="33">Sto. Niño</option>
                      <option value="34">Sindalan</option>
                      <option value="35">Telabastagan</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                  <label class="control-label"> Age <small>(from)</small></label>
                  <input type="text" class="form-control input-sm" id="ftr_agefrom" name="ftr_agefrom">
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                  <label class="control-label"> Age <small>(to)</small></label>
                  <input type="text" class="form-control input-sm" id="ftr_ageto" name="ftr_ageto">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <label class="control-label"> Senior  # </label>
                  <input type="text" class="form-control input-sm" id="ftr_seniorid" name="ftr_seniorid">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                  <!-- <div class="actionBar"> -->
                    <!-- <button type="button" id="btn_reset" class="buttonFinish btn btn-round btn-default"><i class="fa fa-refresh"></i> Reset</button> -->
                    <label class="control-label"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;</label>
                    <button type="button" class="buttonNext btn btn-success input-sm col-lg-12 col-md-12 col-sm-12 col-xs-12" id="btn_seniorsearch"><i class="fa fa-filter"></i> Filter</button>
                  <!-- </div> -->
                  <!-- <label class="control-label"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label> -->
                </div>
              </form>
              </div>

            <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <hr>
              <table class="cell-border compact hover width-full" id="dt_seniorlist" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th style="min-width: 200px">FULL NAME</th>
                    <th>Gender</th>
                    <th>AGE</th>
                    <th>LOT/BLK</th>
                    <th>STREET</th>
                    <th>SUBDIVISION</th>
                    <th>PUROK</th>
                    <th>BARANGAY</th>
                  </tr>
                </thead>
              </table>
            </div>
            </div>
          </div>

        </div>
      </div>
    <!-- </div> end of masterlist -->
    <!-- <div class="row"> -->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

        <div class="x_panel">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form id="frm_seniorservices" name="frm_seniorservices">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <label class="control-label"> Name 
                  <input type="hidden" id="masterid" name="masterid" ></label>
                   <input type="hidden" id="servicesector" name="servicesector" value="SC">
              <input type="text" class="form-control input-sm" id="fullname" name="fullname" readonly>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <label class="control-label"> Fernandino # </label>
              <input type="text" class="form-control input-sm" id="idno" name="idno" readonly>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
              <label class="control-label">Age </label>
              <input type="text" class="form-control input-sm" id="age" name="age" readonly>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <label class="control-label"> Services </label>
              <select class="form-control input-sm" id="serviceid" name="serviceid" required>
                <option value=""> - - - </option>
              </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <label class="control-label"> Date Availed </label>
                <input type="text" class="form-control input-sm fdate" id="dateavailed" name="dateavailed" required>
            </div>

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label"> Remarks </label>
                <input type="text" class="form-control input-sm" id="remarks" name="remarks" required>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
              <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <button type="button" class="btn btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-12 input-sm" id="btn_tagseniorservice"><i class="fa fa-tag"></i> Mark</button>
            </div>
          </form>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <hr>
            <table class="cell-border compact hover width-full" id="dt_serviceavailed" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>FULL NAME</th>
                  <th>SECTOR</th>
                  <th style="min-width: 200px">SERVICE</th>
                  <th>DATE AVAILED</th>
                </tr>
              </thead>
            </table>
          </div>
        </div><!-- end of masterlist -->
      </div><!-- end of masterlist -->
    </div><!-- end of masterlist -->
  </div>
</div>
<!-- /page content -->
