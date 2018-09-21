<!-- page content -->
<div class="right_col page-masterlist" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <center><h2>LIST OF PWDs</h2></center>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="frm_filter_pwds" name="frm_filter_pwds">
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
                  <label class="control-label"> Fernandino # </label>
                  <input type="text" class="form-control input-sm" id="ftr_idno" name="ftr_idno">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <label class="control-label"> PWD ID # </label>
                  <input type="text" class="form-control input-sm" id="ftr_pwdnum" name="ftr_pwdnum">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                  <!-- <div class="actionBar"> -->
                    <!-- <button type="button" id="btn_reset" class="buttonFinish btn btn-round btn-default"><i class="fa fa-refresh"></i> Reset</button> -->
                    <label class="control-label"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;</label>
                    <button type="button" class="buttonNext btn btn-success input-sm col-lg-12 col-md-12 col-sm-12 col-xs-12" id="btn_pwdsearch"><i class="fa fa-filter"></i> Filter</button>
                  <!-- </div> -->
                  <!-- <label class="control-label"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label> -->
                </div>
              </form>
              </div>

            <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <hr>
              <table class="cell-border compact hover width-full" id="dt_pwdlist" cellspacing="0" width="100%">
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
            <form id="frm_pwdservices" name="frm_pwdservices">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <label class="control-label"> Name 
               <input type="hidden" id="masterid" name="masterid">
               <input type="hidden" id="servicesector" name="servicesector" value="PWD">
              </label>
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
              <button type="button" class="btn btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-12 input-sm" id="btn_tagpwdservice"><i class="fa fa-tag"></i> Mark</button>
            </div>
          </form>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <hr><!--sbutton onClick="pwdid()"> modal</button-->
            <table class="cell-border compact hover width-full" id="dt_serviceavailed" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>FULL NAME</th>
                  <th>SECTOR</th>
                  <th style="min-width: 200px">SERVICE</th>
                  <th>Remarks</th>
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

<div class="modal fade bs-example-modal-lg" id="modal_printid" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Person with Disability ID</h4>
        </div>
        <div class="modal-body" id="printthis">
            <div  style="position: relative !important;">
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                <!-- <center> -->
                <!-- <div> -->
                  <!-- <div id="page1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                    <img src="<?php echo base_url('build/images/pwdpage1.jpg') ?>" style="max-height: 250px;max-width: 350px">
                  <!-- </div> -->
                  <!-- <div id="page2" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> -->
                    <img src="<?php echo base_url('build/images/pwdpage2.jpg') ?>" style="max-height: 250px;max-width: 350px">
                  <!-- </div> -->
                <!-- </div> -->
                <!-- </center> -->
              <!-- </div> -->
              <div id="mdl_idno" style="display: block !important;
                                        width: 100px !important;
                                        position: absolute !important;
                                        text-align: right !important;
                                        top: 174px !important;
                                        font-size: 8px !important;
                                        color: #989696 !important;
                                        left: 0 !important;
                                        margin-left: 236px  !important;
                                        z-index: 1 !important">idno</div>
              <div id="mdl_pwdnum" style="position: absolute !important;
                                        width: 180px !important;
                                        display: block !important;
                                        text-align: center !important;
                                        top: 63px !important;
                                        left: 45px !important;
                                        font-weight: 700 !important;
                                        font-size: 10px !important;">pwdnum</div>
              <div id="mdl_fullname" style="position: absolute;
                                        width: 210px;
                                        display: block;
                                        text-align: center;
                                        top: 94px;
                                        left: 14px;
                                        font-weight: 700;
                                        font-size: 10px;">fullname</div>
              <div id="mdl_disabilitytype" style="position: absolute;
                                        width: 210px;
                                        display: block;
                                        text-align: center;
                                        top: 131px;
                                        left: 14PX;
                                        font-weight: 700;
                                        font-size: 10px;">disabilitytype</div>
              <div id="mdl_birthdate" style="width: 179px;
                                        display: block;
                                        position: absolute;
                                        top: 32px;
                                        left: 431px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;">birthdate</div>
              <div id="mdl_gender" style="width: 60px;
                                        display: block;
                                        position: absolute;
                                        top: 33px;
                                        left: 632px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;">gender</div>
              <div id="mdl_address" style="width: 276px;
                                        display: block;
                                        position: absolute;
                                        top: 13px;
                                        left: 412px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;">address</div>
              <div id="mdl_bloodtype" style="width: 40px;
                                        display: block;
                                        position: absolute;
                                        top: 51px;
                                        left: 632px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;
                                        ">bloodtype</div>
              <div id="mdl_dateissue" style="
                                        width: 155px;
                                        display: block;
                                        position: absolute;
                                        top: 52px;
                                        left: 424px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;"><?php echo date('d-m-Y'); ?></div>
              <div id="mdl_contactname" style="
                                        width: 246px;
                                        display: block;
                                        position: absolute;
                                        top: 91px;
                                        left: 446px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;">contactname</div>
              <div id="mdl_contactno" style="
                                        width: 246px;
                                        display: block;
                                        position: absolute;
                                        top: 109px;
                                        left: 426px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;
                                    ">contactno</div>
              <div id="mdl_tc_name" style="
                                        width: 260px;
                                        display: block;
                                        position: absolute;
                                        top: 145px;
                                        left: 426px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;
                                    ">tc_name</div>
              <div id="mdl_tc_tin" style="width: 285px;
                                        display: block;
                                        position: absolute;
                                        top: 162px;
                                        left: 407px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;">tc_tin</div>
              <div id="mdl_tc_contactnum" style="width: 262px;
                                        display: block;
                                        position: absolute;
                                        top: 180px;
                                        left: 429px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 10px;">tc_contactnum</div>
              <div id="mdl_mayor" style="width: 178px;
                                        display: block;
                                        position: absolute;
                                        top: 216px;
                                        left: 440px;
                                        text-align: center;
                                        font-weight: 700;
                                        font-size: 14px;">EDWIN D. SANTIAGO</div>
              <img src="" id="mdl_image" style="width: 98px;
                                        height: 98px;
                                        position: absolute;
                                        top: 76px;
                                        left: 0;
                                        margin-left: 236px;" onerror="errorimg()">
              <img src="" id="mdl_signature" style="width: 68px;
                                  position: absolute;
                                  top: 156px;
                                  left: 0;
                                  margin-left: 86px;
                                  display: block;
                                  text-align: center;" onerror="errorsig()">
            </div>
        </div>
        <div class="modal-footer">
          <div class="btn-group">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> -->
            <button type="button" class="btn btn-default" id="btn_pwdclose" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
            <button type="button" class="btn btn-primary" id="btn_pwdpage1" onclick="printDiv(printthis)"><i class="fa fa-print"></i> Print</button>
            <!-- <button type="button" class="btn btn-primary" id="btn_pwdpage2"><i class="fa fa-print"></i> Print Page2</button> -->

          </div>
        </div>
      </div>
    </div>
  </div>
