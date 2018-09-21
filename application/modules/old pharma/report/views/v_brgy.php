        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reports - B a r a n g a y</h2>
                    <div class="clearfix"></div>
                  </div>
                  <form id="frm-brgyreport" autocomplete="off" method="post" class="fv-form fv-form-bootstrap">

                   <div class="row">
                     <div class="form-group col-md-3 col-sm-4 col-xs-6" <?php if ($this->session->userdata('profile') == 'user') { echo "style='display:none'"; } ?>>
                       <label class="control-label">Source</label>
                       <select class="form-control input-sm" id="tr_location" name="tr_location" disabled="">
                         <option value="">loading...</option>
                       </select>
                     </div>
                     <div class="form-group col-md-2 col-sm-2 col-xs-6">
                      <label class="control-label">Fund</label>
                      <select class="form-control input-sm" id="tr_funding" name="tr_funding" disabled="">
                        <option value="">loading...</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-2 col-xs-6">
                      <label class="control-label">Program</label>
                      <select class="form-control input-sm" id="tr_program" name="tr_program" disabled="">
                        <option value="">loading...</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-xs-6">
                     <label class="control-label">Form - To</label>
                     <div class="input-daterange" id="datepicker" >
                       <input id="start" type="text" class="form-control1 input-sm col-md-5 col-sm-5 col-xs-5" name="start"/>
                       <span class="add-on col-md-2 col-sm-2 col-xs-2" style="vertical-align: top;height:20px">to</span>
                       <input id="end" type="text" class="form-control1 input-sm col-md-5 col-sm-5 col-xs-5" name="end" />
                     </div>
                   </div>
                 </div>

                 <div class="actionBar">
                  <button type="button" id="btn_ecancel" class="buttonFinish btn btn-default">Cancel</button>
                  <button type="submit" id="btn_search" class="btn btn-success">Search</button>
                </div>

              </form>

              <button onclick="print_Content('print-report')" type="button" class="hidden btn btn-primary _print">Print</button>
              <div id="print-report" class="hidden">

                <div class="heading">
                  <img class="img-logo" src="<?php echo base_url('build/images/logo.png'); ?>" width="55"/>

                  <center>
                    <strong><font size="3" face="Sans-serif">CITY OF SAN FERNANDO, PAMPANGA</font></strong><br>
                    City Health Office<br>
                    <strong class="title"><font size="3" face="Serif">Barangay Allocation</font></strong>
                  </center>
                  <div class="p_risno">
                    <font color="darkgray" size="1" face="Sans-serif"><?php echo "PHARMAv".VERSION."-".$this->session->userdata('accountId'); ?></font>
                  </div>

                  <p><strong>LOCATION: </strong><span></span></p>
                  <p><strong>FUND: </strong><span></span></p>
                  <p><strong>PROGRAM: </strong><span></span></p>
                  <p><strong>FROM: </strong><span></span> - <strong>TO: </strong><span></span></p><br/>
                </div>

                <style type="text/css">
                  thead th {
                    position: relative;
                  }
                  .rotate90 {
                    position: absolute;
                    left: -80px;
                    top: 35px;
                    width: 200px;
                    -webkit-transform: rotateZ(-90deg);
                    transform: rotateZ(-90deg);
                  }
                  table tbody td {
                    text-align: center;
                  }

                  table tbody td:nth-of-type(1) {
                    text-align: left;
                  }
                  .dataTables_scrollBody thead th div {
                    display: none;
                  }
                  tbody tr.odd td:nth-of-type(1) {
                    min-width:250px;
                  }
                </style>
                <table class="cell-border compact hover width-full" id="dt_brgyreport" cellspacing="0" width="100%">

                  <thead bgcolor="#darkgray">
                    <tr>
                      <th style="min-width:200px; height: 150px;">MEDICINE</th>
                      <th style="min-width:15px;"><div class="rotate90">ALASAS</div></th>
                      <th style="min-width:15px;"><div class="rotate90">BALITI</div></th>
                      <th style="min-width:15px;"><div class="rotate90">BULAON</div></th>
                      <th style="min-width:15px;"><div class="rotate90">CALULUT</div></th>
                      <th style="min-width:15px;"><div class="rotate90">DELA PAZ NORTE</div></th>
                      <th style="min-width:15px;"><div class="rotate90">DELA PAZ SUR</div></th>
                      <th style="min-width:15px;"><div class="rotate90">DEL CARMEN</div></th>
                      <th style="min-width:15px;"><div class="rotate90">DEL PILAR</div></th>
                      <th style="min-width:15px;"><div class="rotate90">DEL ROSARIO</div></th>
                      <th style="min-width:15px;"><div class="rotate90">DOLORES</div></th>
                      <th style="min-width:15px;"><div class="rotate90">JULIANA</div></th>
                      <th style="min-width:15px;"><div class="rotate90">LARA</div></th>
                      <th style="min-width:15px;"><div class="rotate90">LOURDES</div></th>
                      <th style="min-width:15px;"><div class="rotate90">MAIMPIS</div></th>
                      <th style="min-width:15px;"><div class="rotate90">MAGLIMAN</div></th>
                      <th style="min-width:15px;"><div class="rotate90">MALINO</div></th>
                      <th style="min-width:15px;"><div class="rotate90">MALPITIC</div></th>
                      <th style="min-width:15px;"><div class="rotate90">PANDARAS</div></th>
                      <th style="min-width:15px;"><div class="rotate90">PANIPUAN</div></th>
                      <th style="min-width:15px;"><div class="rotate90">PULONG BULO</div></th>
                      <th style="min-width:15px;"><div class="rotate90">QUEBIAWAN</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SAGUIN</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SAN AGUSTIN</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SAN FELIPE</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SAN ISIDRO</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SAN JOSE</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SAN JUAN</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SAN NICOLAS</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SAN PEDRO CUTUD</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SANTA LUCIA</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SANTA TERESITA</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SANTO NINO</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SANTO ROSARIO</div></th>
                      <th style="min-width:15px;"><div class="rotate90">SINDALAN</div></th>
                      <th style="min-width:15px;"><div class="rotate90">TELABASTAGAN</div></th>
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
