<style>
#scrolchat {
	max-height:360px;
	overflow-y:auto;
}

#scrolchat > ul > li {
	padding:3px;
	clear:both;
	padding:4px;
	margin:10px 0px 5px 0px;
	overflow:auto;
}

#chat-box {
	position: fixed;
    bottom : 0;
    margin-left: 10px; 
}

</style>

     	 <div id="chat-box" class="col-md-12">
     	 	<div class="col-md-9 col-sm-6">
     	 		
     	 	</div>

			<div class="col-md-3 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title line">
							<div class="caption">
								<i class="fa fa-comments"></i>Kotak Obrolan
							</div>
							<div class="tools">
								<a href=""  class="collapse" >
								</a>
								<a href=""></a>
								<a href="" class="">
								</a>
							</div>
						</div>
						<div class="portlet-body" id="chats">
							<div id="isiw" >
								
							</div>
							<br>							
							<div id="scrolchat">
								<ul class="chats" id="isi">
								
								</ul>
							</div>
							<div style="margin-top: 0px;" class="chat-form">
									<div class="input-cont">
										<input type="text" class="form-control" name="product[meta_title]" maxlength="350" autocomplete="off" id="pesan" type="text" onkeydown="if (event.keyCode == 13) document.getElementById('btn').click()" placeholder="Ketik Pesan Disini(max 350 karakter)...">
									</div>
									<div class="btn-cont">
										<span class="arrow">
										</span>
										<button class="btn blue icn-only" id="btn" onclick="insertData()">
										<span id="loader"><img width="16px" src="<?php echo base_url(); ?>/assets/img/ajax-loading.gif" />&nbsp;</span>
										<i class="fa fa-send icon-white"></i>
										</button>
									</div>
							</div>	
						</div>
					</div>
					<!-- END PORTLET-->
				</div>

<script type="text/javascript">

			function insertData(){
				if ($("#pesan").val()==''){
					$("#isiw").html('Lengkapi..');
				}else{
					var datainput = {'pesan':$("#pesan").val()};
					$.ajax({
						type:'POST',
						data:datainput,
						url:'<?php echo base_url();?>chat/insert_pesan',
						beforeSend:function(){
							$("#loader").show();
							$("#btn").addClass("disabled");
						},
						success:function(html){
							$("#isiw").html(html);
							$("#loader").hide();
							$("#btn").removeClass("disabled");
						},
						error:function(){
							$("#loader").hide();
							$("#btn").removeClass("disabled");
						}
					});
				}
				document.getElementById("pesan").value="";
			}
		$(document).ready(function(){

			$("#loader").hide();
			
			function tampilPesan(){    	
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>chat/tampil_pesan',
					cache: false,
					success:function(html){
						$("#isi").html(html);
						// var c = document.getElementById("scrolchat");
						// c.scrollTop = c.scrollHeight;
					},
				});
			}

			setInterval(function(){
				tampilPesan();
				$('#isiw').empty();
								
			},250);			
		});
		// $("#scrolchat2").scrollTop($("#scrolchat2")[0].scrollHeight);
		function Ajax(){

}
</script>