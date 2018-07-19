<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				Penting
			</h3>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php base_url()?>">
						Beranda
					</a>
				</li>
			</ul>
		</div>
		<!-- line1 -->
		<div class="col-xs-12">
			<div class="row">
				<!-- group1 -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="dashboard-stat red-thunderbird bg-1">
						<div class="visual">
							<i class="fa fa-search-plus" style="opacity: 0.3;"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo ($total_data_belum_survey_TR+$total_data_belum_survey_TM+$total_data_belum_survey_KOLEKTIF); ?>
							</div>
							<div class="desc">
								Belum Survey
							</div>
						</div>
						<div>
							<button class="btn btn-sm btn-block more" type="button" onclick="openBelumSurvey()">Menu<i class="fa fa-angle-down rotate"></i></button>
						</div>
						<div class="dasbord-collapse collapse" id="collapseExample1">
							<a class="more" href="<?php base_url()?>pelanggan_TR/belumSurvey/">Pelanggan TR
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_survey_TR ?></span>
							</a>
							<a class="more" href="<?php base_url()?>kolektif/belumSurvey/">Pelanggan Kolektif
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_survey_KOLEKTIF ?></span>
							</a>
							<a class="more" href="<?php base_url()?>pelanggan_TM/belumSurvey/">Pelanggan TM
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_survey_TM ?></span>
							</a>
						</div>
					</div>
				</div>
				<!-- end of group -->
				<!-- group2 -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="dashboard-stat yellow-gold bg-2">
						<div class="visual">
							<i class="fa fa-money" style="opacity: 0.3;"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo ($total_data_belum_bayar_TR+$total_data_belum_bayar_TM+$total_data_belum_bayar_KOLEKTIF); ?>
							</div>
							<div class="desc">
								Belum Bayar
							</div>
						</div>
						<div>
							<button class="btn btn-sm btn-block more" type="button" onclick="openBelumBayar()">Menu<i class="fa fa-angle-down"></i></button>
						</div>
						<div class="dasbord-collapse collapse" id="collapseExample2">
							<a class="purple-studio more" href="<?php base_url()?>pelanggan_TR/belumBayar/">Pelanggan TR
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_bayar_TR ?></span>
							</a>
							<a class="more" href="<?php base_url()?>kolektif/belumBayar/">Pelanggan Kolektif
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_bayar_KOLEKTIF ?></span>
							</a>
							<a class="more" href="<?php base_url()?>pelanggan_TM/belumBayar/">Pelanggan TM
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_bayar_TM ?></span>
							</a>
						</div>
					</div>
				</div>
				<!-- end of group -->
				<!-- group3 -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="dashboard-stat yellow-crusta bg-3">
						<div class="visual">
							<i class="fa fa-gavel" style="opacity: 0.3;"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo ($total_data_belum_rab_TR+$total_data_belum_rab_TM+$total_data_belum_rab_KOLEKTIF); ?>
							</div>
							<div class="desc">
								Belum RAB & WO TIANG
							</div>
						</div>
						<div>
							<button class="btn btn-sm btn-block more" type="button" onclick="openBelumRAB()">Menu<i class="fa fa-angle-down"></i></button>
						</div>
						<div class="dasbord-collapse collapse" id="collapseExample3">
							<a class="more" href="<?php base_url()?>pelanggan_TR/belumRAB/">Pelanggan TR
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_rab_TR ?></span>
							</a>
							<a class="more" href="<?php base_url()?>kolektif/belumRAB/">Pelanggan Kolektif
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_rab_KOLEKTIF ?></span>
							</a>
							<a class="more" href="<?php base_url()?>pelanggan_TM/belumRAB/">Pelanggan TM
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_rab_TM ?></span>
							</a>
						</div>
					</div>
				</div>
				<!-- end of group -->
			</div>
		</div>
		<div class="col-xs-12">
			<div class="row">
				<!-- group4 -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-soft bg-4">
						<div class="visual">
							<i class="fa fa-wrench" style="opacity: 0.3;"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo ($total_data_belum_pelaksanaan_TR+$total_data_belum_pelaksanaan_TM+$total_data_belum_pelaksanaan_KOLEKTIF); ?>
							</div>
							<div class="desc">
								Belum Pelaksanaan
							</div>
						</div>
						<div>
							<button class="btn btn-sm btn-block more" type="button" onclick="openBelumPelaksanaan()">Menu<i class="fa fa-angle-down"></i></button>
						</div>
						<div class="dasbord-collapse collapse" id="collapseExample4">
							<a class="more" href="<?php base_url()?>pelanggan_TR/belumPelaksanaan/">Pelanggan TR
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_pelaksanaan_TR ?></span>
							</a>
							<a class="more" href="<?php base_url()?>kolektif/belumPelaksanaan/">Pelanggan Kolektif
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_pelaksanaan_KOLEKTIF ?></span>
							</a>
							<a class="more" href="<?php base_url()?>pelanggan_TM/belumPelaksanaan/">Pelanggan TM
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_pelaksanaan_TM ?></span>
							</a>
						</div>
					</div>
				</div>
				<!-- end of group -->
				<!-- group5 -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-jungle bg-5">
						<div class="visual">
							<i class="fa fa-plug" style="opacity: 0.3;"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo ($total_data_belum_nyala_TR+$total_data_belum_nyala_TM+$total_data_belum_nyala_KOLEKTIF); ?>
							</div>
							<div class="desc">
								Belum Nyala
							</div>
						</div>
						<div>
							<button class="btn btn-sm btn-block more" type="button" onclick="openBelumNyala()">Menu<i class="fa fa-angle-down"></i></button>
						</div>
						<div class="dasbord-collapse collapse" id="collapseExample5">
							<a class="more" href="<?php base_url()?>pelanggan_TR/belumNyala/">Pelanggan TR
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_nyala_TR ?></span>
							</a>
							<a class="more" href="<?php base_url()?>kolektif/belumNyala/">Pelanggan Kolektif
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_nyala_KOLEKTIF ?></span>
							</a>
							<a class="more" href="<?php base_url()?>pelanggan_TM/belumNyala/">Pelanggan TM
								<span class="badge badge-danger pull-right"><?php echo $total_data_belum_nyala_TM ?></span>
							</a>
						</div>
					</div>
				</div>
				<!-- end of group -->
			</div>
		</div>
		<!-- line3 -->
		<div class="col-xs-12">
			<div class="clearfix margin-top-10">
				<span class="label label-danger">NOTE! </span>
				<span>&nbsp; Guna mengoptimalkan kinerja aplikasi mohon gunakan browser terbaru Mozilla Firefox , Chrome , Opera , Safari atau Internet Explorer 10 </span>
			</div>
			<br>
			<!-- BEGIN PORTLET-->
			<div class="portlet paddingless" id="grafik">
				<div class="portlet-title line">
					<div class="caption">
						<i class="fa fa-bar-chart"></i>Tampilan Grafik
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
						<a href="javascript:;" class="reload" id="reload"></a>
						<a href="javascript:;" class="fullscreen"></a>
						<a href="" class="remove"></a>
					</div>
				</div>
				<div class="portlet-body" id="HPL_Grafik">
					<div id="container"></div>
				</div>
			</div>
			<!-- END PORTLET-->
			<!-- BEGIN PORTLET-->
			<div class="portlet paddingless">
				<div class="portlet-title line">
					<div class="caption">
						<i class="fa fa-bell-o"></i>Alur Pelanggan
					</div>
					<div class="tools">
						<a href="javascript:;" class="expand">
						</a>
						<a href="javascript:;" class="fullscreen">
						</a>
						<a href="" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body" style="display: none">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Pelanggan TR </a>
							</li>
							<li>
								<a href="#tab_1_2" data-toggle="tab">
								Kolektif </a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
								Pelanggan TM </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<img src="<?php base_url()?>assets/img/dashboard/2015-05-21_145310.png">
							</div>
							<div class="tab-pane" id="tab_1_2">
								<img src="<?php base_url()?>assets/img/dashboard/2015-05-21_145413.png">
							</div>
							<div class="tab-pane" id="tab_1_3">
								<img src="<?php base_url()?>assets/img/dashboard/2015-05-21_145435.png">
							</div>
						</div>
					</div>
					<!--END TABS-->
				</div>
				<!-- END PORTLET-->	     
			</div>
		</div>
	</div>
</div>
<!--start of js diagram-->
<script src="<?php echo base_url()?>assets/diagram_js/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/diagram_js/highcharts-more.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/diagram_js/exporting.js" type="text/javascript"></script>
<script type="text/javascript">
	$("#reload").on('click',function(){
		show_dgram();
	});
	$(document).ready(function(){
		show_dgram();
	});
	function show_dgram(){
		downloadDataExcel = function () {
			location.href = '<?php echo base_url()?>home/exporttoexcel';
		};
		var buttons = Highcharts.getOptions().exporting.buttons.contextButton.menuItems;
		buttons.push({
			text: "Download Data File to Excel",
			onclick: downloadDataExcel
		});
		var categoryLinks = {
			'LAWANG'		: '<?php base_url()?>pelanggan_TR/HPL/51301',
			'BULULAWANG'	: '<?php base_url()?>pelanggan_TR/HPL/51302',
			'BATU'			: '<?php base_url()?>pelanggan_TR/HPL/51303',
			'SINGOSARI'		: '<?php base_url()?>pelanggan_TR/HPL/51304',
			'KEPANJEN'		: '<?php base_url()?>pelanggan_TR/HPL/51305',
			'TUMPANG'		: '<?php base_url()?>pelanggan_TR/HPL/51306',
			'GONDANGLEGI'	: '<?php base_url()?>pelanggan_TR/HPL/51307',
			'DAMPIT'		: '<?php base_url()?>pelanggan_TR/HPL/51308',
			'NGANTANG'		: '<?php base_url()?>pelanggan_TR/HPL/51309',
			'SUMBER PUCUNG'	: '<?php base_url()?>pelanggan_TR/HPL/51310',
			'DINOYO'		: '<?php base_url()?>pelanggan_TR/HPL/51311',
			'BLIMBING'		: '<?php base_url()?>pelanggan_TR/HPL/51312',
			'MALANG KOTA'	: '<?php base_url()?>pelanggan_TR/HPL/51313',
			'KEBON AGUNG'	: '<?php base_url()?>pelanggan_TR/HPL/51314'
		};
		var chart = Highcharts.chart('container', {
			chart: {
				type: 'column'
			},

			title: {
				text: 'Grafik HPL'
			},

			subtitle: {
				text: ''
			},

			legend: {
				align: 'right',
				verticalAlign: 'middle',
				layout: 'vertical'
			},

			xAxis: {
				categories: ['LAWANG', 'BULULAWANG', 'BATU', 'SINGOSARI', 'KEPANJEN', 'TUMPANG', 'GONDANGLEGI', 'DAMPIT', 'NGANTANG', 'SUMBER PUCUNG', 'DINOYO', 'BLIMBING', 'MALANG KOTA', 'KEBON AGUNG'],
				labels: {
					formatter: function () {
						return '<a href="' + categoryLinks[this.value] + '">' + this.value + '</a>';
					}
				},
				title: {
					enabled: true,
					text: 'RAYON',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			exporting: {
				buttons: {
					contextButton: {
						menuItems: buttons
					}
				}
			},
			yAxis: {
				allowDecimals: false,
				title: {
					text: 'HARI'
				}
			},
			series: [{
				name: 'TR',
				data: <?php echo $HPL_TR; ?>
			}, {
				name: 'TM',
				data: <?php echo $HPL_TM; ?>
			}, {
				name: 'KOLEKTIF',
				data: <?php echo $HPL_KOLEKTIF; ?>
			}],
			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						legend: {
							align: 'center',
							verticalAlign: 'bottom',
							layout: 'horizontal'
						},
						yAxis: {
							labels: {
								align: 'left',
								x: 0,
								y: -5
							},
							title: {
								text: null
							}
						},
						subtitle: {
							text: null
						},
						credits: {
							enabled: false
						}
					}
				}]
			}
		});
	}
</script>
<!--end of js diagram-->