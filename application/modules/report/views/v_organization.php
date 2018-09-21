<!-- page content -->
<div class="right_col page-masterlist" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="x_panel">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <table class="cell-border compact hover width-full" id="dt_brgyorganization" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="min-width: 80px">BARANGAY</th>
                  <th>ORGANIZATION</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="col-sm-12 col-xs-12">
            <hr>
          </div>
            <form id="frm_orgmember" name="frm_orgmember">
              <input type="hidden" id="orgid" name="orgid" placeholder="organization id">
              <input type="hidden" id="brgyid" name="brgyid" placeholder="brgy id">
              <input type="hidden" id="orgmemberid" name="orgmemberid" placeholder="orgmember id">
              <input type="hidden" id="masterid" name="masterid" placeholder="Member ID">
              <input type="hidden" id="name" name="name" placeholder="Name">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label">Name : </label>
                  <input type="text" class="form-control input-sm" id="membername" name="membername">
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label">Fernandino # :</label>
                  <input type="text" class="form-control input-sm"  id="idno" name="idno">
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label">Designation:</label>
                  <select class="form-control input-sm" id="designation" name="designation">
                    <option value=""> - - - </option>
                    <option value="PRESIDENT">PRESIDENT</option>
                    <option value="VICE-PRESIDENT">VICE-PRESIDENT</option>
                    <option value="SECRETARY">SECRETARY</option>
                    <option value="TREASURER">TREASURER</option>
                    <option value="AUDITOR">AUDITOR</option>
                    <option value="PUROK LEADER">PUROK LEADER</option>
                    <option value="COMMITTEES">COMMITTEES</option>
                    <option value="MEMBERS">MEMBERS</option>
                  </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label">SECTOR:</label>
                  <select class="form-control input-sm" id="sector" name="sector">
                    <option value=""> - - - </option>
                    <option value="EDUCATION">EDUCATION</option>
                    <option value="LIVELIHOOD">LIVELIHOOD</option>
                    <option value="SOCIAL SERVICES">SOCIAL SERVICES</option>
                    <option value="FINANCE">FINANCE</option>
                  </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label">SEA-K:</label>
                  <select class="form-control input-sm" id="seak" name="seak">
                    <option value=""> - - - </option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label">S. Trainings:</label>
                  <select class="form-control input-sm" id="strainings" name="strainings">
                    <option value=""> - - - </option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label">Other Trainings:</label>
                  <select class="form-control input-sm" id="othertrainings" name="othertrainings">
                    <option value=""> - - - </option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-4 col-xs-12">
                  <label class="control-label"><small>(w/ Livelihood)</small> Production:</label>
                  <select class="form-control input-sm" id="production" name="production">
                    <option value=""> - - - </option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label"><small>(w/ Livelihood)</small> Market:</label>
                  <select class="form-control input-sm" id="marketing" name="marketing">
                    <option value=""> - - - </option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label">Retire date:</label>
                  <input type="text" class="form-control input-sm fdate" id="upto" name="upto">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <br/>
                  <button type="button" class="btn btn-success col-lg-5  col-md-5 col-sm-5 col-xs-12 input-sm" id="btn_saveorgmember"><i class="fa fa-save"></i> Save</button>
                  <button type="button" class="btn btn-warning col-lg-5  col-md-5 col-sm-5 col-xs-12 input-sm" id="btn_delorgmember"><i class="fa fa-trash"></i> Delete</button>
                </div>
              </div>
            </form>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <br/>
              <table class="cell-border compact hover width-full" id="dt_orgmembers" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th style="min-width: 230px">NAME</th>
                    <th style="min-width: 180px">DESIGNATION</th>
                    <th style="min-width: 180px">SECTOR</th>
                    <th style="min-width: 80px">SEA-K</th>
                    <th>TRAININGS</th>
                    <th style="min-width: 130px">OTHER TRAININGS</th>
                    <th>PRODUCTION</th>
                    <th>MARKETING</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>

        </div>
      </div>
  </div>
</div>
<!-- /page content -->

<div class="modal fade bs-example-modal-sm" id="modal_organization" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel"><center>Barangay Organization</center></h5>
        </div>
        <form id="frm_organization" name="frm_organization">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label"> Barangay Name:</label>
              <select class="form-control input-sm" id="mdl_brgy" name="mdl_brgy">
                  <option value="">- - -</option>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label"> Organization Name:</label>
              <input type="text" class="form-control input-sm" id="mdl_name" name="mdl_name">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label class="control-label"> Date Established:</label>
              <input type="text" class="form-control input-sm" id="mdl_datefound" name="mdl_datefound">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="btn-group">
          <button type="button" class="btn btn-default" id="btn_close"><i class="fa fa-remove"></i> Close</button>
          <button type="button" class="btn btn-default" id="btn_saveorg" ><i class="fa fa-tag"></i> Save</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
