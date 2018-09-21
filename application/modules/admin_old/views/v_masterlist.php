<!-- page content -->
<div class="right_col page-masterlist" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="x_panel">
          <form id="frm_search" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
            <div class="row">
              <div class="form-group col-xs-6">
                <label class="control-label">Search</label>
                <input type="text" class="form-control input-sm" id="txt_search" name="txt_search" autofocus>
              </div>
              <div class="form-group col-xs-6">
                <label class="control-label">In
               </label>
                <select class="form-control input-sm" id="txt_in" name="txt_in">
                  <option value="">- - -</option>
                  <option value="id">Access ID No</option>
                  <option value="lastname">Lastname</option>
                  <option value="firstname">Firstname</option>
                  <option value="middlename">Middlename</option>
              </select>
              </div>
              <div class="form-group col-xs-6">
                <label class="control-label">Barangay</label>

              <select class="form-control input-sm" id="txt_brgy" name="txt_brgy">
                  <option value="">- - -</option>
                  <option value="1">Poblacion</option>
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
                  <option value="36">null</option></select>
              </div>
              <div class="form-group col-xs-6">
                <label class="control-label">Gender</label>
                <select class="form-control input-sm" id="gender" name="gender">
                  <option value="">- - -</option>
                  <option value="1">MALE</option>
                  <option value="2">FEMALE</option>
                </select>
              </div>
              <div class="form-group col-xs-6">
                <label class="control-label">Sector</label>
                <select class="form-control input-sm" id="sector" name="sector">
                  <option value="">- - -</option>
                  <option value="SENIOR CITIZEN">SENIOR CITIZEN</option>
                  <option value="SOLO PARENT">SOLO PARENT</option>
                  <option value="PWD">PWD</option>
                </select>
              </div>
              <div class="col-xs-12">
                <div class="actionBar">
                  <button type="button" id="btn_reset" class="buttonFinish btn btn-round btn-default"><i class="fa fa-refresh"></i> Reset</button>
                  <button type="button" id="btn_search" class="buttonNext btn btn-round btn-success"><i class="fa fa-filter"></i> Search</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="x_panel">
          <table class="cell-border compact hover width-full" id="dt_masterlist" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="min-width: 80px">ACCESS ID</th>
                <th>LASTNAME</th>
                <th>FIRSTNAME</th>
                <th>MIDDLENAME</th>
                <th>BIRTHDATE</th>
                <th>AGE</th>
                <th>BARANGAY</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <form id="frm_info"  autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
                <div class="form-group col-xs-7">
                  <label class="control-label">Full Name<input type="hidden" id="masterid" name="masterid"></label>
                  <input type="text" class="form-control input-sm" id="fullname" name="fullname">
                </div>
                <div class="form-group col-xs-3">
                  <label class="control-label">Fernandino Number</label>
                  <input type="text" class="form-control input-sm" id="idNo" name="idNo">
                </div>
                <div class="form-group col-xs-2">
                  <label class="control-label">Age</label>
                  <input type="text" class="form-control input-sm" id="age" name="age">
                </div>
                <div class="form-group col-xs-7">
                  <label class="control-label">Sector</label>
                  <input type="text" class="form-control input-sm"  id="sel_sector" name="sel_sector" >
                </div>
                <div class="form-group col-xs-5">
                  <label class="control-label">Sector Services</label>
                  <select class="form-control input-sm" id="sector" name="sector" >
                   <option value="">- - -</option>
                   <option value="SENIOR CITIZEN">SENIOR CITIZEN</option>
                   <option value="SOLO PARENT">SOLO PARENT</option>
                   <option value="PWD">PWD</option>
                 </select>
                </div>
            </form>
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <table id="" class="cell-border compact hover width-full">
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- END OF NEW ROW -->
  </div>
</div>
<!-- /page content -->
