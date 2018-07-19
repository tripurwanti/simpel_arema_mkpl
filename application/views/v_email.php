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
</style>
<div class="page-content">
	<div class="row">
		<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					E-Mail
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-envelope"></i>
							<a href="<?php base_url()?>chat">
								E-Mail
							</a>
						</li>
					</ul>
		</div>
     	 <div class="col-xs-12">
     	 <div class="col-md-1 col-sm-6">
     	 </div>
			<div class="col-md-12 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title line">
							<div class="caption">
								<i class="fa fa-send"></i>Kirim Pesan
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="" class="fullscreen">
								</a>
							</div>
						</div>
						<div class="portlet-body" id="chats">

							<div class="chat-form">
									<div class="input-cont">
										<input type="text" class="form-control" name="kepada" id="kepada" type="text" placeholder="Kepada">
									</div>
              </div>
							<div class="chat-form">
									<div class="input-cont">
										<input type="text" class="form-control" name="subjek" id="subjek" type="text" placeholder="Subjek">
									</div>
              </div>
							<div class="chat-form">
									<div class="input-cont">
                    <textarea name="pesan" class="form-control" id="pesan" rows="10" ></textarea>
									</div>
              </div>
              <div class="chat-form">
                  <div class="input-cont">
                    <input type="button" class="btn btn-success" name="btnKirim" id="btnKirim" value="Kirim" onclick="insertData()">
                  </div>
              </div>

							<div id="isiw"></div>
							<br>
							<div id="scrolchat">

  							<div class="chat-form">
  									<div class="input-cont">
  										<input type="text" class="form-control" name="cari" id="cari" placeholder="Cari...">
  									</div>
                </div>
                <br>
								<ul class="chats" id="isi">

								</ul>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				 <div class="col-md-1 col-sm-6">
     	 		</div>

	</div>
</div>
</div>
<script type="text/javascript">
			function insertData(){
				if ($("#kepada").val()=='' || $("#subjek").val()=='' || $("#pesan").val()==''){
					$("#isiw").html('Lengkapi..');
				}else{
					var datainput = {
                            'kepada':$("#kepada").val(),
                            'subjek':$("#subjek").val(),
                            'pesan':$("#pesan").val(),
                          };
					$.ajax({
						type:'POST',
						data:datainput,
						url:'<?php echo base_url();?>email/insert_pesan',
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
              $("#isiw").html("Terjadi Kesalahan");
							$("#loader").hide();
							$("#btn").removeClass("disabled");
						}
					});
				}
				document.getElementById("kepada").value="";
				document.getElementById("subjek").value="";
				document.getElementById("pesan").value="";
			}
		$(document).ready(function(){
			$("#loader").hide();

      $.ajax({
					type:'POST',
					url:'<?php echo base_url();?>email/tampil_pesan',
					cache: false,
					success:function(html){
						$("#isi").html(html);
					},
				});

        $("#cari").keyup(function(){
          var a = $(this).val();
                $.ajax({
          					type:'POST',
          					url:'<?php echo base_url();?>email/tampil_pesan/'+a,
          					cache: false,
          					success:function(html){
          						$("#isi").html(html);
          					},
          				});
        });

			setInterval(function(){
				$('#isiw').empty();
        //tampilPesan();
			},4500);
		});

		function Ajax(){

}

  function tampil_detail_pesan(i) {
    $("#psn-"+i).toggle();
    return false;
  }
</script>
