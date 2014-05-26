<?php
	echo $this->element('login/header');
	echo $this->element('login/content');
?>
    <!-- Extra Info-->
    <section class="extra">
        <div class="container">
            
            <div class="row-fluid">
                
                <div class="span4">
                    <h3>Video ESEN</h3>
                        <div class="video">
                    		<!--<iframe src="http://www.youtube.com/embed/Eou0b97nPDE" allowfullscreen></iframe>-->
                    	</div>                    
                        <p> Euismod dolor felis eu ante. Proin vulputate orci non mi aliquet aliquam. Aliquam tincidunt arcu eu sem tempus facilisis bibendum tellus vulputa velit consequat sagittis. Integer justo metus, volutpat in cursus id, sagittis vitae ipsum.</p>
                </div>
                <?php 
                /*echo "<pre>";
                print_r($nt); 
                echo "</pre>";*/
                ?>
                <div class="span4">
                    <h3>&Uacute;ltimas noticias</h3>
                    <div class="carousel">
	                    <ul class="testimonials">
	                    	<?php
	                    	for ($i=0; $i < count($nt); $i++) { 
	                    	?>
								<li>
		                           <?php
	                            	echo $this->Html->image('login/blue/logo.png', array('alt' => 'ESEN'));
	                            	?>
		                           <h5><?php echo utf8_encode($nt[$i]['jos_content']['title']); ?></h5>
		                        </li>
	                    	<?php
	                    	}
	                    	?> 
	                    </ul>
                    </div>
                    <a href="#" class="navi-right next"></a>
                    <a href="#" class="navi-left prev"></a>

                    
                </div>
               
                <div class="span4">
                    <h3>Scholarships</h3>
                    <?php
                          echo $this->Html->image('login/shcolarship.jpg', array('alt' => 'ESEN', "class"=>"scholarships"));
                   	?>
                    <p>Entesque congue, nibh in hend go to rerit dignissim, dolor urna tincidunt felis, bibendum euismod. </p>
                    <p>Proin vulputate orci non mi aliquet aliquam. Aliquam tincidunt arcu eu sem tempus and  facilisis bibendum tellus vtate... <a href="#">Read more</a> </p>
               
                </div>
            </div>
        
        </div>
    </section>
    <!-- End Extra Info-->
    
    
    
    
    
    <!--Newsletter-->
    <section class="newsletter">
    	<div class="container">
        	<div class="row-fluid">
            	<h2>Newsletter Suscription</h2>
                <h3>Suscribe to University newsletter list  and ibh in hendrerit and dignisdolor urna. All fields with an * are required.</h3>
            	<div id="loadingNews" style="display: none" class='alert'>
	  				<a class='close' data-dismiss='alert'>×</a>
	  				Loading
				</div>	
            	<div id="responseNews"></div>
            	 
            	<form id="newsletter" method="post" action="#">
                   <input type="text"  placeholder=" * Name" name="Name" />
                   <input type="email"  placeholder=" * Email" name="Email" />
                   <input type="submit" class="button" value="Send Email">
                </form>
            </div>
        
        </div>
    </section>
    <!--End Newsletter-->