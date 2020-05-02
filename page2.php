
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<title>CESSI COVID-19 &mdash; Data Analytics</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="shortcut icon" href="images/logo_1.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="A CESSI IISER KOLKATA OUTREACH INITIATIVE ON COVID19" />
	<meta name="keywords" content="CESSI,2020, free html5, free template, html5, css3, mobile first, responsive" />
	<meta name="author" content="CESSI" />
	<meta property="og:image" content="http://www.cessi.in/coronavirus/images/logo_1.png">

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="CESSI COVID-19 Dashboard"/>

	<meta property="og:image" itemprop="image" content="http://www.cessi.in/coronavirus/images/logo_1.png"/>
	<meta property="og:url" content="http://www.cessi.in/coronavirus/index.html"/>
	<meta property="og:type" content="article"/>
	<meta property="og:site_name" content="CESSI COVID-19 Dashboard"/>
	<meta property="og:description" content="A CESSI IISER KOLKATA OUTREACH INITIATIVE ON COVID19."/>

	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="CESSI COVID-19 Dashboard">
	<meta name="twitter:site" content="http://www.cessi.in/coronavirus/index.html">
	<meta name="twitter:creator" content="@cessi_iiserkol">
	<meta name="twitter:image" content="http://www.cessi.in/coronavirus/images/logo_1.png">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!--Plotly Script -->
	<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<!-- chart-tot plot -->
	<script>

	
		$.get("getData.php", function(response) {

			var size = Object.keys(response.cases_time_series).length;
			var i;
			data = response.cases_time_series;
			var dd = [];
			var cgr = [];
			var dgr = [];
			var rgr = [];
			var cfr = [];
			var cn = [];
			
			for (i = 0; i < size; i++)
				{
					cn.push(data[i].totalconfirmed);					
					dd.push(data[i].date);
					cgr.push(data[i].dailyconfirmed*100/data[i].totalconfirmed);
					dgr.push(data[i].dailydeceased*100/data[i].totaldeceased);
					rgr.push(data[i].dailyrecovered*100/data[i].totalrecovered);
					cfr.push(data[i].totaldeceased*100/data[i].totalconfirmed);
				}

			// Doubling Rate
			var ten_deaths;
			for (i=0; i < cn.length; i++)
			{
				if (cn[i]>=10)
				{
					ten_deaths = i;
					break;
				}
			}
			var double_time = [];
			var date_double_time = [];
			for (i=ten_deaths; i < cn.length; i++)
			{
				for (j=i+1; j < cn.length; j++)
					{
						
						if (cn[j]>=cn[i]*2)
						{
							date_double_time.push(dd[i]);
							double_time.push(j-i-((cn[j]-2*cn[i])/(cn[j]-cn[j-1])));
							break;
						}
					}
			}

			
			var plotdoub = {
				x: date_double_time,
				y: double_time,
				line: {shape: 'spline' ,color:'red'},
			}
			var plotconf = {
				x: dd,
				y: cgr,
				name: 'Growth Rate of Confirmed Cases',
			    line: {shape: 'spline', color:'black'},
			}
			var plotreco = {
				x: dd,
				y: rgr,
				name: 'Growth Rate of Recovery',
			    line: {shape: 'spline' ,color:'green'},
			}
			var plotdead = {
				x: dd,
				y: dgr,
				name: 'Growth Rate of Deaths',
			    line: {shape: 'spline',color:'red'},
			}

			var locktrace = {
			  x: ['25 March ',data[size-1].date],
			  y: [0,100],
			  text: ['Lockdown'],
			  mode: 'text',
			  name: 'Lockdown'
			};

			var plotcfr = {
				x: dd,
				y: cfr,
			    line: {shape: 'spline',color:'red'},
			}
			var layout1 = {
				title: 'Percentage Growth Rates as of '+dd[size-1]+'<br>www.cessi.in/coronavirus',
				showlegend: true,
				legend: {
				x: 0.5,
				xanchor: 'left',
				y: 1
				},
				shapes: [
		        // 1st highlight during Feb 4 - Feb 6
		        {
		            type: 'rect',
		            // x-reference is assigned to the x-values
		            xref: 'x',
		            // y-reference is assigned to the plot paper [0,1]
		            yref: 'paper',
		            x0: '25 March ',
		            y0: 0,
		            x1: data[size-1].date,
		            y1: 1,
		            fillcolor: '#d3d3d3',
		            opacity: 0.3,
		            line: {
		                width: 0
		            }
			        	}]
			}
			var layout2 = {
				title: 'Case Fatality Rate (Percentage) as of '+dd[size-1]+'<br>www.cessi.in/coronavirus',
				shapes: [
		        // 1st highlight during Feb 4 - Feb 6
		        {
		            type: 'line',
		            yref: 'paper',
		            x0: '25 March ',
		            y0: 0,
		            x1: data[size-1].date,
		            y1: 1,
		            fillcolor: '#d3d3d3',
		            opacity: 0.3,
		            line: {
		                width: 0
		            }
			        	}]
			}
			var layout3 = {
				title: 'Doubling Time as of '+dd[size-1]+'<br>www.cessi.in/coronavirus',
				shapes: [
		        // 1st highlight during Feb 4 - Feb 6
		        {
		            type: 'rect',
		            
		            yref: 'paper',
		            x0: '25 March ',
		            y0: 0,
		            x1: '25 March ',
		            y1: 1,
		            line: {
		                width: 2,
		                color: 'grey'
		            }
			        	}],
			    yaxis: {
			    	title: 'Number of Days'
			    }
			}
			var config = {responsive: true}
			var plot1 = [plotconf, plotdead, plotreco, locktrace]
			var plot2 = [plotcfr]
			var plot3 = [plotdoub]


			Plotly.newPlot('chart_gr', plot1, layout1, config);
			Plotly.newPlot('chart_cfr', plot2, layout2, config);
			Plotly.newPlot('chart_doub', plot3, layout3, config);

		}, "json");

	</script>

	<!-- death by state plot -->
	<script>

	
		$.get("getData_states.php", function(response) {

			var size = Object.keys(response.states_daily).length;
			var i;
			data = response.states_daily;
			var an = 0;
			var ap = 0;
			var ar = 0;
			var as = 0;
			var br = 0;
			var ch = 0;
			var ct = 0;
			var dl = 0;
			var ga = 0;
			var gj = 0;
			var hp = 0;
			var hr = 0;
			var jh = 0;
			var jk = 0;
			var ka = 0;
			var kl = 0;
			var la = 0;
			var mh = 0;
			var ml = 0;
			var mp = 0;
			var mz = 0;
			var or = 0;
			var pb = 0;
			var py = 0;
			var rj = 0;
			var tg = 0;
			var tn = 0;
			var tr = 0;
			var up = 0;
			var wb = 0;
			var mh_ar = [];
			var dl_ar = [];
			var kl_ar = [];
			var or_ar = [];
			var wb_ar = [];
			var date = [];
			for (i = 0; i < size; i++)
				{
					if (data[i].status === "Deceased")
					{	
						date.push(data[i].date);
						mh_ar.push(mh);
						dl_ar.push(dl);
						kl_ar.push(kl);
						or_ar.push(or);
						wb_ar.push(wb);
						an = 	an+parseInt(data[i].an);
						ap =    ap+parseInt(data[i].ap);
						ar =    ar+parseInt(data[i].ar);
						as =    as+parseInt(data[i].as);
						br =    br+parseInt(data[i].br);
						ch =    ch+parseInt(data[i].ch);
						ct =    ct+parseInt(data[i].ct);
						dl =    dl+parseInt(data[i].dl);
						ga =    ga+parseInt(data[i].ga);
						gj =    gj+parseInt(data[i].gj);
						hp =    hp+parseInt(data[i].hp);
						hr =    hr+parseInt(data[i].hr);
						jh =    jh+parseInt(data[i].jh);
						jk =    jk+parseInt(data[i].jk);
						ka =    ka+parseInt(data[i].ka);
						kl =    kl+parseInt(data[i].kl);
						la =    la+parseInt(data[i].la);
						mh =    mh+parseInt(data[i].mh);
						ml =    ml+parseInt(data[i].ml);
						mp =    mp+parseInt(data[i].mp);
						mz =    mz+parseInt(data[i].mz);
						or =    or+parseInt(data[i].or);
						pb =    pb+parseInt(data[i].pb);
						py =    py+parseInt(data[i].py);
						rj =    rj+parseInt(data[i].rj);
						tg =    tg+parseInt(data[i].tg);
						tn =    tn+parseInt(data[i].tn);
						tr =    tr+parseInt(data[i].tr);
						up =    up+parseInt(data[i].up);
						wb =    wb+parseInt(data[i].wb);
					}
				}
			var x = ["AN Islands","An P","Ar P","Assam","Bihar","Chandigarh","Chhattisgarh","Delhi","Goa","Gujarat","HP","Haryana","Jharkhand","JK","Karnataka","Kerala","Ladakh","Maharashtra","Meghalaya","MP","Mizoram","Odisha","Punjab","Puducherry","Rajasthan", "Telangana","TN","Tripura","UP","WB"];
			
			var y = [an,ap,ar,as,br,ch,ct,dl,ga,gj,hp,hr,jh,jk,ka,kl,la,mh,ml,mp,mz,or,pb,py,rj,tg,tn,tr,up,wb];

			var last_date = data[size-1].date;

			var layout1 = {
				title: 'State Wise COVID-19 Deaths in India as of '+last_date+'<br>www.cessi.in/coronavirus',
				xaxis: {
				    tickangle: -90
				  },
			}
			var config = {responsive: true}
			var plot1 = [
			{
				x: x,
				y: y,
				type: 'bar',
			}];

			var plmh = {
				x: date,
				y: mh_ar,
				name: 'Maharashtra',
			    line: {shape: 'spline', color:'red', width:2},
			}
			var pldl = {
				x: date,
				y: dl_ar,
				name: 'Delhi',
			    line: {shape: 'spline', color:'blue', width:2},
			}
			var plkl = {
				x: date,
				y: kl_ar,
				name: 'Kerala',
			    line: {shape: 'spline', color:'green', width:2},
			}
			var plor = {
				x: date,
				y: or_ar,
				name: 'Odisha',
			    line: {shape: 'spline', color:'violet', width:2},
			}
			var plwb = {
				x: date,
				y: wb_ar,
				name: 'West Bengal',
			    line: {shape: 'spline', color:'black', width:2},
			}
			var layout2 = {
				title: 'Comparison of West Bengal deaths to other States as of '+last_date+'<br>www.cessi.in/coronavirus',
				
			}
			var plot2 = [plmh,pldl,plkl,plor,plwb]
			Plotly.newPlot('chart_comp', plot2, layout2, config)
			Plotly.newPlot('chart_dead', plot1, layout1, config);

		}, "json");

	</script>


	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="top-menu">
				<div class="row">
					<div class="col-sm-1">
						<div id="fh5co-logo">     
							<div class="image-item animate-box">
						
								<a href="http://www.cessi.in/"><img src="images/CESSI.png" width="100%"alt=""></a>
							
							</div>
						</div>
					</div>
					<div class="col-sm-10 text-right menu-1">
						<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="page1.php">Model and Predictions</a></li>
								<li class="active"><a href="page2.php">Data Analytics</a></li>
								<li><a href="page3.php">Public Outreach</a></li>
								<li><a href="page4.php">Resources</a></li>
								
								<!--<li><a href="contact.html">Contact</a></li>-->
							</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
	<div class="container">
		<div id="fh5co-intro">
			<h2 style="text-align: center;">Data Analytics</h2>
			<h3>Statewise COVID-19 Deaths in India</h3>
			<div class="row" style="text-align: center;">
				<br>
				<div id="chart_dead" class="img-responsive"></div>
				<br><br>
				<div class="detail" >
					<div class="animate-box">
							
						<p style="text-align:justify;"><font color="#333333" size="3">The above chart shows the statewise distribution of deaths due to COVID-19 in India.</font></p>
							
					</div>
				</div>
				<br>
				<div id="chart_comp" class="img-responsive"></div>
				<br><br>
				<div class="detail" >
					<div class="animate-box">
							
						<p style="text-align:justify;"><font color="#333333" size="3">The above plot compare the number of deaths in West Bengal with four other states in India.</font></p>
							
					</div>
				</div>
				<h3 style="text-align:  left;">Relationship between Total Testing and Postive Test Numbers</h3>
				<div class="image-content  img-responsive" style="display: inline-block;" >
					<div class="image-item  animate-box " >
						<div>
						    <a href="https://plotly.com/~riobanerjee/102/?share_key=DCdpdxkUcztB49UI5cizvU" target="_blank" title="Plot 102" style="display: block; text-align: center;"><img src="https://plotly.com/~riobanerjee/102.png?share_key=DCdpdxkUcztB49UI5cizvU" alt="Plot 102" onerror="this.onerror=null;this.src='https://plotly.com/404.png';" /></a>
						    <script data-plotly="riobanerjee:102" sharekey-plotly="DCdpdxkUcztB49UI5cizvU" src="https://plotly.com/embed.js" async></script>
						</div>


					</div>
				</div>
				<div class="detail" >
					<div class="animate-box">
							
						<p ><font color="#333333" size="3">The Number of people tested positive is directly proportional to the total number of people tested. The plot above shows the linear relationship between these quantities for India. This indicates that in order to uncover more potential positive cases, more tests would have to be done.</font></p>
							
					</div>
				</div>
			</div> <!-- end row -->
			<br><br><br>
			
			<h3>Percentage Growth Rate of Confirmed Cases and Deaths</h3>
			<div class="row" style="text-align: center;">

				<br>
				<div id="chart_gr" class="img-responsive"></div>
				<br><br>

				<div class="detail" >
					<div class="animate-box">
							
						<p style="text-align:justify;"><font color="#333333" size="3">
								The plot above shows the growth rate of deaths and confirmed cases from March 1st, 2020.
								Growth rate of confirmed cases has been calculated as the ratio of the number of new cases on a day to the total number of cases on that day. Growth rate of deaths has been calculated as the ratio of the number of new deaths on a day to the total number of deaths on that day. It can be seen that all three growth rates are stabilizing after the lockdown.
								<br><br>
							</font></p>
							
					</div>
				</div>
				<br>
				<div id="chart_cfr" class="img-responsive"></div>
				<br><br>
						
					
					<div class="detail" >
					<div class="animate-box">
							
						<p style="text-align:justify;"><font color="#333333" size="3">
						The plot above shows the variation of the case fatality rate of COVID-19 with time in India. The case fatality rate is defined as the ratio of the number of total deaths on a day to the number of total cases on that day. A very high case fatality rate would mean that either the disease has become deadlier, or the healthcare system is failing, or both.</font> </p>
				</div>
			</div>

			</div> <!-- end row -->
			<h3>Doubling Rate in India</h3>
			<div class="row" style="text-align: center;">

				<br>
				<div id="chart_doub" class="img-responsive"></div>
				<br><br>

				<div class="detail" >
					<div class="animate-box">
							
						<p style="text-align:justify;"><font color="#333333" size="3">
								Doubling time is defined as the number of days required for the number of cases to double. The plot above shows the how the doubling time is chaning with time in India (after the first 10 cases). The date of lockdown (25 March, 2020) is marked with a grey line. A higher doubling is desirable since this would mean that the spread of the disease is slowing down. It is apparent from the plot that the doubling time has been increasing since the lockdown was implemented.
								<br><br>
							</font></p>
							
					</div>
				</div>
			</div> <!--end row-->
			<br>
			
			
			
			<h2 style="text-align: center;">World Data</h2>
			<h3>Distribution of Cases by Country</h3>
			<div class="row" style="text-align: center;">
				<div class="detail" >
					<div class="animate-box">
						
						
						<p style="text-align:justify;"><font color="#333333" size="3">
								The plot below compares the number of confirmed cases in India to the number of confirmed cases in other countries. Although it looks like the rate of increase is decreasing with time, this is an effect of the graph being plotted in log scale.
								<br>
							</font></p>	
					</div>
				<br>
				<iframe class="img-responsive" src="https://ourworldindata.org/grapher/covid-confirmed-cases-since-100th-case?country=IND" style="width: 100%; height: 600px; border: 0px none;"></iframe>
				<br><br>
				<div class="detail" >
					<div class="animate-box">
						
						<br>
						<p style="text-align:justify;"><font color="#333333" size="3">
								The plot below show the distribution of total deaths globally by country and continent.
								<br><br>
							</font></p>	
					</div>
				</div>
				<div class="flourish-embed flourish-chart img-responsive" data-src="story/230085"><script src="https://public.flourish.studio/resources/embed.js"></script></div>
				<div class="detail" >
					<div class="animate-box">
						
						<br>
						<p style="text-align:justify;"><font color="#333333" size="3">
								The plot below shows the worldwide distribution of cases in a map view. The time series for individual countries can be obtained by clicking on said country in the map.
								<br><br>
							</font></p>	
					</div>
				</div>
				<iframe class="img-responsive" src="https://ourworldindata.org/grapher/total-cases-covid-19?tab=map" style="width: 100%; height: 600px; border: 0px none;"></iframe>
			</div> <!--end row-->
			<br><br>
			<div class="row">
				<h3 style="text-align:justify;">References</h3>
				<ol style="text-align:justify;">
				<li><a href="https://api.covid19india.org/">COVID19-India API</a></li>
				<li><a href="https://ourworldindata.org/coronavirus-source-data"> Coronavirus Source Data</a></li>
				</ol>
			</div><!--end row-->
		</div>
		
	</div><!-- END container -->

	<div class="container">
		<footer id="fh5co-footer" role="contentinfo">

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2020 CESSI. All Rights Reserved.</small> 
						
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="https://twitter.com/cessi_iiserkol?lang=en"><i class="icon-twitter"></i></a></li>
							<li><a href="https://www.facebook.com/centerofexcellenceinspacesciencesindia/"><i class="icon-facebook"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</footer>
	</div>   <!-- END container -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script src="js/sticky-kit.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

