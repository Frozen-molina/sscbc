<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
if(!$_SESSION['ADMIN_ROLE']=='Administrator'){
  redirect(web_root."admin/index.php");
}
 
?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add New Capstone Projects and Thesis Titles</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Title">Title:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="Title" name="Title" placeholder=
                            "Title" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Author">Author:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="Author" name="Author" placeholder=
                            "Author" type="text" value="">
                      </div>
                    </div>
                  </div>   

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Course">Course:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="Course" id="Course">
                          <option value="None">Select Course</option>
                          <option value="BSIT">BSIT</option>
                          <option value="BSCS">BSCS</option>
                          <option value="BSBA">BSBA</option>
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Members">Members:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="Members" name="Members" placeholder=
                            "Members" type="text" value="">
                      </div>
                    </div>
                  </div>   
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Adviser">Adviser:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="Adviser" name="Adviser" placeholder=
                            "Adviser" type="text" value="">
                      </div>
                    </div>
                  </div>   
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Grammarian">Grammarian:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="Grammarian" name="Grammarian" placeholder=
                            "Grammarian" type="text" value="">
                      </div>
                    </div>
                  </div>   
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Abstract">Abstract:</label>

                      <div class="col-md-8">
                            <textarea class="form-control input-sm" id="Abstract" name="Abstract" placeholder=
                            "Abstract" rows="10"></textarea> 
                      </div>
                    </div>
                  </div>   
                 
                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PublisedYear">Publised Year:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="PublisedYear" name="PublisedYear" placeholder=
                            "Publised Year" type="text" value="">
                      </div>
                    </div>
                  </div>   
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "UploadedBy">Uploaded By:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="UploadedBy" name="UploadedBy" placeholder=
                            "Uploaded By" type="text" value="">
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "fileupload">File to be Upload:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="fileupload" name="fileupload" placeholder=
                            "fileupload" type="file" value="">
                      </div>
                    </div>
                  </div>   
                 


             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      </div>
                    </div>
                  </div>

               
        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

       