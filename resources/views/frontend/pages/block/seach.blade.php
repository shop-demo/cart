
 <div class="modal" id="myModal">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                 <button type="button" class="close" data-bs-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i></button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                 <div class="row">
                     <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
                        <div class="navbar-search seach-nav">
                              <input placeholder="Search" name="seach_name"  value="" class="form-control iput-seach" data-url="{{route('home.seach')}}?key=">
                          <!-- list seach -->
                          <div class="list-group list dataList">
                          </div> 
                          <!-- end list seach -->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end Modal body -->
             </div>
           </div>
 </div> 
 
