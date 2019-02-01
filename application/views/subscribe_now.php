<style>
.input-group {
    margin: 20px auto;
    width: 100%;
}
input.btn.btn-sm,
input.btn.btn-sm:focus {
    outline: none;
    width: 100%;
    height: 40px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.promise {
    color: #000000;
}

input.btn.btn-sm, input.btn.btn-sm:focus { 
text-align: left;
text-transform: lowercase;
background-color: #ffffff;
 }

 .btn-info { background-color: #841212; border-color: #841212; }
 .search-tbtm { padding: 0px; background: #002147; box-shadow: 0 4px 15px 0 rgba(0, 0, 0, 0.32); }

</style>

<section>
    <!-- TOP SEARCH BOX -->
    <div class="search-tbtm">
   
                    <div class="subscribe-form">
                    	<form method="post" class="am-subscribe-form" action="<?php echo site_url('home/subscribe');?>">
              <div class="input-group">
                 <input class="btn btn-sm" name="email" id="email" type="email" placeholder="Enter Your Email Address" required>
                 <button class="btn btn-info btn-sm" type="submit">SUBSCRIBE NOW</button>
              </div>
             </form>
                    
                    
                    
                    	
                        
                    </div>
               
    </div>
    <!-- END TOP SEARCH BOX -->
</section>