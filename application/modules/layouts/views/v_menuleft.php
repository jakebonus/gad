        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('/'); ?>" class="site_title"><i class="fa fa-venus-mars"></i> <span>GAD</span>
                <sup><?php echo 'v'.VERSION; ?></sup>
              </a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-users"></i> <small>FERNANDINOs </small><span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('admin'); ?>">Masterlist</a></li>
                    </ul>
                  </li>
                  
                  <!-- PWD -->
                   <?php if($this->session->userdata('location') == 'CSWD-PWD' || $this->session->userdata('location') == 'MITD') { ?>                        
                    <li><a><i class="fa fa-home"></i> PWDs <span class="fa fa-chevron-down"></span></a>
                         <ul class="nav child_menu">
                             <li><a href="<?php echo base_url('admin/pwdlist'); ?>">List</a></li>
                             <li><a href="<?php echo base_url('admin/pwdreport'); ?>">Master List</a></li>
                             <li><a href="<?php echo base_url('admin/pwdsummary'); ?>">Summary</a></li>
                        </ul>
                    </li>
                   <?php } ?>
                   <!-- END PWD -->
                   
                   <!-- SOLO PARENT -->
                   <?php if($this->session->userdata('location') == 'CSWD-SP' || $this->session->userdata('location') == 'MITD') { ?>                    
                    <li><a><i class="fa fa-home"></i> SOLO PARENT <span class="fa fa-chevron-down"></span></a>
                         <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/soloparentlist'); ?>">Solo Parent</a></li>
                            <li><a href="<?php echo base_url('admin/soloparentreports'); ?>">Reports</a></li>
                        </ul>
                    </li>
                   <?php } ?>
                   <!-- END SOLO PARENT-->
                   
                   <!-- SENIORS -->
                   <?php if($this->session->userdata('location') == 'CSWD-SC' || $this->session->userdata('location') == 'MITD') { ?>                
                    <li><a><i class="fa fa-home"></i> SENIOR CITIZENs<span class="fa fa-chevron-down"></span></a>
                         <ul class="nav child_menu">
                             <li><a href="<?php echo base_url('admin/seniorlist'); ?>">Senior Citizen</a></li>
                            <li><a href="<?php echo base_url('admin/seniorcitizenreports'); ?>">Reports</a></li>
                        </ul>
                    </li>
                   <?php } ?>
                   <!-- END SENIORS-->
                   
                  <?php if($this->session->userdata('location') == 'OSCA' || $this->session->userdata('location') == 'MITD') { ?>
                  <li><a><i class="fa fa-home"></i> OSCA <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('osca/masterlist'); ?>">Senior Citizen List</a></li>
                      <li><a href="<?php echo base_url('osca/'); ?>">Senior Citizen Summary</a></li>
                    </ul>
                  </li>
                    <?php } ?>
                      <?php if($this->session->userdata('location') == 'CADMINO' || $this->session->userdata('location') == 'MITD') { ?>
                      <li><a><i class="fa fa-home"></i> GAD <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo base_url('report/index'); ?>">Masterlist</a></li>
                          <li><a href="<?php echo base_url('report/brgy_organization'); ?>">Barangay Organization</a></li>
                        </ul>
                      </li>
                  <?php } ?>
                      <li><a><i class="fa fa-gears"></i> <small>MAINTENANCE</small> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($this->session->userdata('location') == 'CSWD-PWD' || $this->session->userdata('location') == 'CSWD-SC' || $this->session->userdata('location') == 'CSWD-SP' || $this->session->userdata('location') == 'MITD') { ?>
                      <li><a href="<?php echo base_url('maintenance/cswd'); ?>">CSWD Services</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                </ul>
              </div>
             </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url('build/images/logo.png'); ?>" alt=""><?php echo $this->session->userdata('name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li class="btn-profile"><a href="<?php echo base_url('account/profile'); ?>"> Profile</a></li>
                    <li><a href="<?php echo base_url('account/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown dropdown-notify hidden">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-red"></span>
                  </a>
                  <ul id="menu1" class="menu-notify dropdown-menu list-unstyled msg_list scrollbar" role="menu">
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
