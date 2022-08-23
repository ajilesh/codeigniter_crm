<!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <form class="form-horizontal" id="customer">
                  <div class="card-body">
                    <h4 class="card-title">Customer Info</h4>
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >First Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="fname" name="fname"
                          placeholder="First Name Here"
                        />
                      </div>
                      <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Last Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="lname" name="lname"
                          placeholder="Last Name Here"
                        />
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Password</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="password"
                          class="form-control"
                          id="lname"
                          placeholder="Password Here"
                        />
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <label
                        for="email1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Company</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="company" name="company"
                          placeholder="Company Name Here"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="cono1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Contact No</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="contact" name="contact"
                          placeholder="Contact No Here"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="cono1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Message</label
                      >
                      <div class="col-sm-9">
                        <textarea class="form-control" id="message" name="message"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                        <input type="submit" name="csubmit" value="SUBMIT" style="background-color:#27a9e3;color:white;border-color: #27a9e3;">
                      <!-- <button type="submit" class="btn btn-primary">
                        Submit
                      </button> -->
                    </div>
                  </div>
                </form>
              </div>
             
              
            </div>
            
          
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <?php echo include_once "common/footer.php";?>
        <script>
           $(document).ready(function () 
           {

                $('#customer').validate({ // initialize the plugin
                    rules: {
                        fname: {
                            required: true,
                            //email: true
                        },
                        lname:{
                            required:true,
                        },
                        company:{
                            required:true,
                        },
                        contact:{
                            required:true,
                        },
                        message:{
                            required:true,
                        }
                        
                    },
                    submitHandler:function(){
                        var csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
                        var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                        var fname = $('#fname').val();
                        var lname = $('#lname').val();
                        var company = $('#company').val();
                        var contact = $('#contact').val();
                        var message = $('#message').val();
                        $.ajax({
                            url:'<?php echo base_url();?>customerInsert',
                            data:{firstname: fname,contact:contact,lastname: lname,company : company,message:message,[csrfName]: csrfHash },
                            type:'post',
                            success:function(data){
                                console.log(data);
                            }
                        });
                    }
                });

            });
        </script>