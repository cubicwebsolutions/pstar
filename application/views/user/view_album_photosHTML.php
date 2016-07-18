<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
<script type="text/javascript">
 $(document).ready(function () {
	 
		$("#r .stars").click(function () {

			var label = $("label[for='" + $(this).attr('id') + "']");
			 $.ajax({
					url: "<?php echo base_url();?>" + 'user/rating/<?php echo $user_profile->ID; ?>',
					type:'POST',										
					data: "rating="+$(this).val(),
					success:function(response){
						if(response.exists == "1") 
						{
							$("#feedback").html(response.message);
							//$(this).attr("checked");
							//$('#resultdiv').html(data);
						}
						else
						{
							$(".class").val(response.rating);
							for (var i=0; i<response.rating.length; i++) {
								//alert(response.rating[i]);
								$(this).attr("checked");
								}//$(this).attr("checked");
						}
					}
				});   
			//$("#feedback").text('Thanks For Rating');
			//$(this).attr("checked");
		});
		$("#phrat .pstar").click(function () {
			var label = $("label[for='" + $(this).attr('id') + "']");
			 $.ajax({
					url: "<?php echo base_url();?>" + 'user/photo_rating/<?php echo $user_profile->ID; ?>',
					type:'POST',										
					data: "rating="+$(this).val(),
					success:function(response){
						if(response.exists == "1") 
						{
							$("#feedback").html(response.message);
							//$(this).attr("checked");
							//$('#resultdiv').html(data);
						}
						else
						{
							$(".class").val(response.rating);
							for (var i=0; i<response.rating.length; i++) {
								//alert(response.rating[i]);
								$(this).attr("checked");
								}//$(this).attr("checked");
						}
					}
				});   
			//$("#feedback").text('Thanks For Rating');
			//$(this).attr("checked");
		});
	});
</script>				


<?php $this->load->view('common/header'); ?>
<div class="container" >
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
               <a href="#">Home >></a><a href="#">User-Profile</a>			   
			</div>
		</div>
	</div>
    
    <div class="container">
		<div class="row user-profile">
			<div class="col-sm-2 img-section">
                <a href="#">
				<?php if($user_profile->profile_pic!=''){ ?>
								<img src="<?php echo HTTP_UPLOADS_PATH.$user_profile->profile_pic; ?>" class="img-responsive" alt="">
							<?php } else{ ?>
								<img src="<?php echo base_url();  ?>assets/images/user.jpg" class="img-responsive" alt="...">
							<?php } ?>
				</a> 
				<a href="<?php echo base_url().'user/request_mail/'.$user_profile->user_id; ?>"><span class="send-email"><span class="glyphicon glyphicon-envelope"></span>Send an email</span></a></br>

					<?php $r=$rating->rating; $rating=round($r); ?>
				<span>Rate This User</span>
                 <fieldset id='r' class="rating">
                        <input class="stars" type="radio" id="star53" name="rating" <?php if($rating=='5'){ ?> checked="checked" <?php } ?> value="5" />
                        <label class = "full" for="star53" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4half3" name="rating" <?php if($rating=='4.5'){ ?> checked="checked" <?php } ?> value="4.5" />
                        <label class="half" for="star4half3" title="Pretty good - 4.5 stars"></label>
                        <input class="stars" type="radio" id="star43" name="rating" <?php if($rating=='4'){ ?> checked="checked" <?php } ?> value="4" />
                        <label class = "full" for="star43" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3half3" name="rating" <?php if($rating=='3.5'){ ?> checked="checked" <?php } ?> value="3.5" />
                        <label class="half" for="star3half3" title="Meh - 3.5 stars"></label>
                        <input class="stars" type="radio" id="star33" name="rating" <?php if($rating=='3'){ ?> checked="checked" <?php } ?> value="3" />
                        <label class = "full" for="star33" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2half3" name="rating" <?php if($rating=='2.5'){ ?> checked="checked" <?php } ?> value="2.5" />
                        <label class="half" for="star2half3" title="Kinda bad - 2.5 stars"></label>
                        <input class="stars" type="radio" id="star23" name="rating" <?php if($rating=='2'){ ?> checked="checked" <?php } ?> value="2" />
                        <label class = "full" for="star23" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1half3" name="rating" <?php if($rating=='1.5'){ ?> checked="checked" <?php } ?> value="1.5" />
                        <label class="half" for="star1half3" title="Meh - 1.5 stars"></label>
                        <input class="stars" type="radio" id="star13" name="rating" <?php if($rating=='1'){ ?> checked="checked" <?php } ?> value="1" />
                        <label class = "full" for="star13" title="Sucks big time - 1 star"></label>
                        <input class="stars" type="radio" id="starhalf3" name="rating" <?php if($rating=='.5'){ ?> checked="checked" <?php } ?> value="0.5" />
                        <label class="half" for="starhalf3" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                     <div id='feedback'></div>
                
				<p>&nbsp;</p>				

								<script>
					$(document).ready(function () {
						$('#txt').hide();
							$('#reason').click(function(){
							$('#txt').toggle();
						});
						$('#spam').click(function(){
							if($('#txtrsn').val()==''||$('#txtrsn').val()==null)
							{
								alert('This Field Should Not Be Blank');
								$('txtrsn').first().focus();
								return false;
							}
							$.ajax({
							url: "<?php echo base_url();?>" + 'user/spamuser/<?php echo $user_profile->ID; ?>',
							type:'POST',
							dataType: "json",						
							data: "reason="+$('#txtrsn').val(),//+"blocked_id="+'<?php echo $user_profile->ID; ?>',
							success:function(response){
								if(response.exists == '1') 
								{
									$("#msg").text(response.message);
									location.reload();
								}
								else
								{
									$("#msg").html(response.message);
								}
							}
						});
					});
					});
				</script>
			<?php if($spamuserdata=='') { ?>				
				<input type="button" id="reason" value="Report Spam"/>				
				<div  id="txt">
					<span class="spam-user">Reason for Spam</span>
					<textarea  id="txtrsn" rows="3" cols="10"></textarea>
					<input type="submit" name="spam" id="spam" value="Send" />			
				</div>
			<div id="msg"></div>
			<?php }else { ?>
				<div>
					<span class="spam-user">You Spam to This User</span>
				</div>				
			<?php } ?>
				<p>&nbsp;</p>
				<p><strong>About me:</strong></p>
				<p><?php echo $user_profile->introduction;?></p>
            
			</div>
			
			<div class="col-sm-10 post-section">
				<h2><?php echo $user_profile->first_name .' '.$user_profile->last_name; ?></h2>
				<!--<p>Senior Web Developer at Cubic web solutions</p>-->
				<div>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
			
					<li role="presentation"><a href="<?php echo base_url().'user/user_detail/'.$user_profile->ID; ?>">Posts</a></li>
					<li role="presentation"><a href="<?php echo base_url().'user/about_user/'.$user_profile->ID; ?>">About</a></li>
					<li role="presentation" class="active"><a href="<?php echo base_url().'user/user_photos/'.$user_profile->ID; ?>">Photos</a></li>
					<li role="presentation"><a href="<?php echo base_url().'user/user_videos/'.$user_profile->ID; ?>">Videos</a></li>

				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					
					<div role="tabpanel" class="tab-pane active" id="photos">
                    
                 
                           </div> 
                    <p><strong><?php echo $this->session->flashdata('msg'); ?></strong></p>
                           	<strong>Album Name :</strong><?php echo $album_id->album_title; ?><br />
                            <strong> Description :</strong><?php echo $album_id->album_desc; ?><br />
						<div class="row">

                          
                          
                                               
						 <?php //print_r($album_detail);die; 
						 foreach ($album_detail as $row): ?>
							<div class="col-sm-4">
								<div class="thumbnail">
									<img  style="height:150px;" src="<?php echo HTTP_IMAGES_PATH.$row['img_path']; ?>" class="img-responsive" alt="">    
                                   <p align="center"> Rate This Photo</p>                                 
								</div>
                                
                                     <?php $ratt=$row['rating'];  $rating=round($ratt); ?>
                                    <fieldset id='phrat' class="rating" style="margin-left:70px;">
                                        <input class="pstar" type="radio" id="star53.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='5'){ ?> checked="checked" <?php } ?> value="5,<?php echo $row['id']; ?>" />
                                        <label class = "full" for="star53.5<?php echo $row['id']; ?>" title="Awesome - 5 stars"></label>
                        
                                        <input class="pstar" type="radio" id="star4half3.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='4.5'){ ?> checked="checked" <?php } ?> value="4.5,<?php echo $row['id']; ?>" />
                                        <label class="half" for="star4half3.5<?php echo $row['id']; ?>" title="Pretty good - 4.5 stars"></label>
										
										<input class="pstar" type="radio" id="star43.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='4'){ ?> checked="checked" <?php } ?> value="4,<?php echo $row['id']; ?>" />
                                        <label class = "full" for="star43.5<?php echo $row['id']; ?>" title="Pretty good - 4 stars"></label>
						
						                <input class="pstar" type="radio" id="star3half3.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='3.5'){ ?> checked="checked" <?php } ?> value="3.5,<?php echo $row['id']; ?>" />
                                        <label class="half" for="star3half3.5<?php echo $row['id']; ?>" title="Meh - 3.5 stars"></label>
						
                                        <input class="pstar" type="radio" id="star33.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='3'){ ?> checked="checked" <?php } ?> value="3,<?php echo $row['id']; ?>" />
                                        <label class = "full" for="star33.5<?php echo $row['id']; ?>" title="Meh - 3 stars"></label>
                        
						                <input class="pstar" type="radio" id="star2half3.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='2.5'){ ?> checked="checked" <?php } ?> value="2.5,<?php echo $row['id']; ?>" />
                                        <label class="half" for="star2half3.5<?php echo $row['id']; ?>" title="Kinda bad - 2.5 stars"></label>
                        
						                <input class="pstar" type="radio" id="star23.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='2'){ ?> checked="checked" <?php } ?> value="2,<?php echo $row['id']; ?>" />
                                        <label class = "full" for="star23.5<?php echo $row['id']; ?>" title="Kinda bad - 2 stars"></label>
                        
						                <input class="pstar" type="radio" id="star1half3.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='1.5'){ ?> checked="checked" <?php } ?> value="1.5,<?php echo $row['id']; ?>" />
                                        <label class="half" for="star1half3.5<?php echo $row['id']; ?>" title="Meh - 1.5 stars"></label>
                        
						                <input class="pstar" type="radio" id="star13.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='1'){ ?> checked="checked" <?php } ?> value="1,<?php echo $row['id']; ?>" />
                                        <label class = "full" for="star13.5<?php echo $row['id']; ?>" title="Sucks big time - 1 star"></label>
                        
						                <input class="pstar" type="radio" id="starhalf3.5<?php echo $row['id']; ?>" name="rating<?php echo $row['id']; ?>" <?php if($rating=='.5'){ ?> checked="checked" <?php } ?> value="0.5,<?php echo $row['id']; ?>" />
                                        <label class="half" for="starhalf3.5<?php echo $row['id']; ?>" title="Sucks big time - 0.5 stars"></label>
										
                    </fieldset>
                     <div id='feedback'></div> 
                                
      <script>
			function doconfirm()
					{
    					job=confirm("Are you sure to delete this photo?");
   			 if(job!=true)
   				 {
       					 return false;
   			 }
		}
      </script>
                            </div>
                            
                       
                            
							<?php endforeach; ?>
						</div>
						
					<p align="center"> <?php echo $links; ?> </p>						
					</div>
                    
				
                                       </div> 
                                       
                                       
                                       
									</div>
		
								</div>
                                
							</div> 
                               
						</div>
					
					</div>
				</div>

				</div>
				
			</div>
		
		
		</div>


      
	</div>
    
         <div class="container">
		<?php $this->load->view('common/footer'); ?>
    </div>