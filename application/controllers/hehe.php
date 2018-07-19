	  <script src="<?php echo base_url('asset/admin/assets/js/jquery-latest.js');?>"></script> 
		<script>
			var refreshId = setInterval(function()
			{
				$('#container').load('<?php echo site_url('c_admin/show_realtime_grafik_wisata') ?>');
			}, 10000);
		</script>
	  	<div class="col-xs-12">
					<!-- BEGIN PORTLET-->
			<div class="portlet paddingless">
				<div class="portlet-title line">
					<div class="caption">
						<i class="fa fa-bell-o"></i>Feeds
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
						<a href="javascript:;" class="fullscreen"></a>
						<a href="" class="remove"></a>
					</div>
				</div>
					<div class="portlet-body">
							<!--BEGIN TABS-->
						<div >
							<div id="container"></div>
							<button id="plain">Plain</button>
							<button id="inverted">Inverted</button>
							<button id="polar">Polar</button>
						</div>
								<!--END TABS-->
					</div>
					<!-- END PORTLET-->	     
	    	 </div>
	  </div>

	<script src="<?php echo base_url('asset/admin/assets/js/vendor/jquery-2.1.4.min.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url('asset/admin/assets/js/plugins.js');?>"></script>
    <script src="<?php echo base_url('asset/admin/assets/js/main.js');?>"></script>


    <script src="<?php echo base_url('asset/admin/assets/js/lib/chart-js/Chart.bundle.js');?>"></script>
    <script src="<?php echo base_url('asset/admin/assets/js/dashboard.js');?>"></script>
    <script src="<?php echo base_url('asset/admin/assets/js/widgets.js');?>"></script>
    <script src="<?php echo base_url('asset/admin/assets/js/lib/vector-map/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('asset/admin/assets/js/lib/vector-map/jquery.vmap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js');?>"></script>
    <script src="<?php echo base_url('asset/admin/assets/js/lib/vector-map/country/jquery.vmap.world.js');?>"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script type="text/javascript">
		
		
		var chart = Highcharts.chart('container', {

			title: {
				text: 'Chart.update'
			},

			subtitle: {
				text: 'Plain'
			},

			xAxis: {
				categories: <?php echo $category; ?>
			},

			series: [{
				type: 'column',
				colorByPoint: true,
				data: <?php echo $htm; ?>,
				showInLegend: false
			}]

		});


		$('#plain').click(function () {
			chart.update({
				chart: {
					inverted: false,
					polar: false
				},
				subtitle: {
					text: 'Plain'
				}
			});
		});

		$('#inverted').click(function () {
			chart.update({
				chart: {
					inverted: true,
					polar: false
				},
				subtitle: {
					text: 'Inverted'
				}
			});
		});

		$('#polar').click(function () {
			chart.update({
				chart: {
					inverted: false,
					polar: true
				},
				subtitle: {
					text: 'Polar'
				}
			});
		});
	</script>
