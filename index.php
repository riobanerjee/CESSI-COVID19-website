<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<title>CESSI COVID-19 Dashboard</title>
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
	
	
	<!--Plotly Script -->
	<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	
	

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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script>

	
		$.get("getData.php", function(response) {

			var size = Object.keys(response.cases_time_series).length;
			var i, start_date;
			data = response.cases_time_series;
			var dda = [];
			var cna = [];
			var dna = [];
			var rna = [];
			var dailya = [];

			for (i = 0; i < size; i++)
				{
					if (data[i].date==='01 March ')
					{
						start_date = i;
					}
					dda.push(data[i].date);
					cna.push(data[i].totalconfirmed);
					dna.push(data[i].totaldeceased);
					rna.push(data[i].totalrecovered);
					dailya.push(data[i].dailyconfirmed - data[i].dailyrecovered - data[i].dailydeceased);
				}

			var dd = dda.slice(start_date);
			var cn = cna.slice(start_date);
			var dn = dna.slice(start_date);
			var rn = rna.slice(start_date);
			var an = [];
			for (i = 0; i < dd.length; i++)
			{
				an.push(cn[i]-dn[i]-rn[i])
			}
			
			var daily = dailya.slice(start_date);

			var plotconf = {
				x: dda,
				y: cna,
				name: 'Total Confirmed',
			    line: {shape: 'spline', color:'black'},
			};
			var plotdead = {
				x: dda,
				y: dna,
				name: 'Total Deceased',
			    line: {shape: 'spline', color:'red'},
			};
			var plotreco = {
				x: dda,
				y: rna,
				name: 'Total Recovered',
			    line: {shape: 'spline', color:'green'},
			};
			var layout = {
				title: 'COVID-19 Cases in India as of '+dda[size-1]+'<br>www.cessi.in/coronavirus',
				showlegend: true,
				legend: {
				x: 0.5,
				xanchor: 'left',
				y: 1
				},
				yaxis: {zeroline:true, zerolinecolor: 'black', zerolinewidth: 2,
						tickformat: 'f'},
				shapes: [{
						  yref: 'paper',
					      type: 'line',
					      x0: '30 January ',
					      y0: 0,
					      x1: '30 January ',
					      y1: 1,
					      line: {
					        color: 'black',
					        width: 2
					      }}],
			};
			var config = {responsive: true};
			var plot1 = [plotconf, plotreco, plotdead];


			var plotconfq1 = {
				x: dd,
				y: an,
				name: 'Total Active',
			    line: {shape: 'spline', color:'black'},
			};

			var plotconfqend = {
				x: dd,
				y: an,
				name: 'Total Active',
			    line: {shape: 'spline', color:'black'},
			};
			var plotdeadq1 = {
				x: dd,
				y: dn,
				name: 'Total Deceased',
			    line: {shape: 'spline', color:'red'},
			};
			var plotdeadqend = {
				x: dd,
				y: dn,
				name: 'Total Deceased',
			    line: {shape: 'spline', color:'red'},
			};
			var plotrecoq1 = {
				x: dd,
				y: rn,
				name: 'Total Recovered',
			    line: {shape: 'spline', color:'green'},
			};
			var plotdailyq = {
				x: dd,
				y: daily,
				name: 'Daily Active',
			    line: {shape: 'spline', color:'blue'},

			}
			var layoutq1 = {
				title: 'COVID-19 Cases in India from March 1st as of '+dda[size-1]+'<br>www.cessi.in/coronavirus',
				showlegend: true,
				yaxis: {zeroline:true, zerolinecolor: 'black', zerolinewidth: 2,
						tickformat: 'f'},
				legend: {
				x: 0.5,
				xanchor: 'left',
				y: 1
				},
				shapes: [{
						  yref: 'paper',
					      type: 'line',
					      x0: '01 March ',
					      y0: 0,
					      x1: '01 March ',
					      y1: 1,
					      line: {
					        color: 'black',
					        width: 2
					      }
					  	},
					      {
						  yref: 'paper',
					      type: 'line',
					      x0: '25 March ',
					      y0: 0,
					      x1: '25 March ',
					      y1: 1,
					      line: {
					        color: 'grey',
					        width: 3
					      }
					    },
					    {
					      yref: 'paper',
					      type: 'line',
					      x0: '14 April ',
					      y0: 0,
					      x1: '14 April ',
					      y1: 1,
					      line: {
					        color: 'grey',
					        width: 3
					      }
					    }
						]
			};
			var layoutqend = {
				title: 'COVID-19 Cases in India from 01 March as of '+dda[size-1]+'<br>www.cessi.in/coronavirus',
				showlegend: true,
				legend: {
				x: 0.5,
				xanchor: 'left',
				y: 1
				},
				shapes: [{
						  yref: 'paper',
					      type: 'line',
					      x0: '01 March ',
					      y0: 0,
					      x1: '01 March ',
					      y1: 1,
					      line: {
					        color: 'black',
					        width: 2
					      }
					  	},
					      {
						  yref: 'paper',
					      type: 'line',
					      x0: '25 March ',
					      y0: 0,
					      x1: '25 March ',
					      y1: 1,
					      line: {
					        color: 'grey',
					        width: 3
					      }
					    },
					    {
					      yref: 'paper',
					      type: 'line',
					      x0: '14 April ',
					      y0: 0,
					      x1: '14 April ',
					      y1: 1,
					      line: {
					        color: 'grey',
					        width: 3
					      }
					    }
						],
				yaxis: {
					zeroline:true, zerolinecolor: 'black', zerolinewidth: 2,
						tickformat: 'f',
				    type: 'log',
				    autorange: true
				  }
			};
			
			var plotq1 = [plotconfq1, plotrecoq1, plotdeadq1];
			var plotqend = [plotconfqend,plotdailyq, plotdeadqend]
			Plotly.newPlot('chart_tot', plot1, layout, config);
			// Plotly.newPlot('chart_q1',plotq1, layoutq1, config);
			Plotly.newPlot('chart_qend',plotqend, layoutqend, config);

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
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="page1.php">Model and Predictions</a></li>
								<li><a href="page2.php">Data Analytics</a></li>
								<li><a href="page3.php">Public Outreach</a></li>
								
								<li><a href="page4.php">Resources</a></li>
							</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
	
	

	<div class="container"> 
		<h1 style="text-align:center;">CESSI IISER KOLKATA OUTREACH INITIATIVE ON COVID19</h1>
		<div id="fh5co-intro">
			<div class="row">
			
				<p style="text-align:justify;"><font color="black" size="4">The coronavirus pandemic is unparalleled in modern human history. Its impact has spread
far and wide across the world and through all sections of the society. India has not been
spared and our daily numbers of CoViD19 infections are still rising. Our country is the midst
of an unprecedented lockdown which has had disproportionate consequences on people
with varied economic backgrounds. New information, myths, hoaxes and claims bombard
our collective consciousness every day. In these challenging times, research geared towards
understanding different aspects of the novel coronavirus virus SARS-CoV-2, creation of
scientific awareness about the disease, and effective science communication that may
inform public behaviour and guide policy, are crucial towards mitigating the adverse impacts
of this pandemic.</font></p>

				

				<p style="text-align:justify;"><font color="black" size="4">The Center of Excellence in Space Sciences India (CESSI), IISER Kolkata have utilized their
in-house modelling and data analytics capabilities to create resources intended for
spreading scientific awareness about the pandemic among the general public and guide
future policy. The resources available here are based on the CESSI-nCoV-SEIRD model which
has been optimized for the Indian context at IISER Kolkata, data analysis of India specific and
some global data on the progress of the pandemic, and informational graphics and social
media messages created by the Indian Scientists’ Response to CoViD19 (ISRC) group – to
which IISER Kolata scientists have contributed.</font></p>

				<p style="text-align:justify;"><font color="black" size="4">Further details on the epidemiology model developed at CESSI and model predictions can be
found in the model section. India specific information on disease progression and critical
parameters characterizing the progression of the pandemic can be found in the data
analytics section. Socio-scientific awareness materials can be found in the public outreach
section.</font></p>
				
				<p style="text-align:justify;"><font color="black" size="4">Important Note: All model outputs depend on certain starting assumption and governing
parameters that have to be reasonably constrained by observations. For the coronavirus
pandemic these are still early days and most observational data are under sampled. Our
simulation set-up, modeling assumptions and governing parameters would be updated as
and when more reliable constraints and better physical understanding is achieved.
Therefore we advice that any policy actions based on our research should lay more
emphasis on the qualitative trends implied in our simulations rather than actual numbers.</font></p>
				

				
				<br>
				<h2 style="text-align:center;">Spotlight India</h2>
				<br>
				<p style="text-align:justify;"><font color="black" size="4">In this section we highlight some issues that are very relevant to the coronavirus pandemic in the Indian context. We tackle some outstanding questions and provide model-based solutions that can guide public policy and catalyze socio-scientific awareness. These answers are backed by our model predictions and data analysis of the observed trends in India.</font></p>
				<br>
				<div class="col-md-12 image-content">
					<div class="image-item  animate-box">
						<div id="chart_tot" class="img-responsive">
						</div>
						
					</div>
				</div>
				
				
				
		<p style="text-align:justify;"><font color="black" size="4">
			<strong>1. Is the Indian national lockdown necessary; what would have happened if there were no lockdown?</strong>
<br>
				<br>
				<div class="col-md-4 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/noLD_infected.png" target="_blank"><img src="images/model_output/noLD_infected.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-4 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/noLD_recovered.png" target="_blank"><img src="images/model_output/noLD_recovered.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-4 image-content">
					<div class="image-item  animate-box">
<a href="images/model_output/noLD_deceased.png" target="_blank"><img src="images/model_output/noLD_deceased.png" class="img-responsive"></a>
					</div>
				</div>

<br>
			The above simulation based on our epidemiological model shows the progression of the coronavirus pandemic in India under a scenario where no lockdown is imposed. The results of this simulation indicates that the number of infected and deceased individuals would have risen rapidly and could have been unacceptably large had there been no lockdown. Eventually, almost all the individuals susceptible to the disease (in our simulation assumed
to be the population of India) could have become infected. Note that we do not include
herd immunity in our model; however, even if herd immunity were included, the number of
infected individuals would likely have been 60% of the whole Indian population! We could
have had the highest number of coronavirus deaths in the world. Our health care
infrastructure and hospitals would not have been able to deal with this free-flowing
pandemic in the no-lockdown scenario. A lockdown slows the growth rate of the disease
leading to more recoveries and less deaths the long run. A lockdown also flattens the curve
of infection implying a lower number of infected individuals at any point in time; this allows
our healthcare facilities to cope with the pandemic and buys crucial time for formulating
strategic plans to deal with the disease. This simulation clearly demonstrates the adverse
doomsday scenario that the Indian national lockdown aims to avoid.
				</font></p>
				<p style="text-align:justify;"><font color="black" size="4">
				<strong>2. How efficient is the Indian national lockdown?</strong>
				<br>
				
				<br>
				
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/ideal_ldfun.png" target="_blank"><img src="images/model_output/ideal_ldfun.png" class="img-responsive"></a>
					</div>
				</div>
				
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/ideal_infected.png" target="_blank"><img src="images/model_output/ideal_infected.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/ideal_recovered.png" target="_blank"><img src="images/model_output/ideal_recovered.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
<a href="images/model_output/ideal_deceased.png" target="_blank"><img src="images/model_output/ideal_deceased.png" class="img-responsive"></a>
					</div>
				</div>
				<br>
				
While the lockdown has been undoubtedly effective in lowering the growth rate, it has not
been ideal. In the above simulation we implement a close to ideal lockdown with the
epidemic growth rate reduced to 10% of the originally assumed unrestrained growth rate.
For this ideal lockdown scenario, the simulation indicates that the active infected individuals
would have been between 5000-15000 with the pandemic peaking in late March. However
this does not agree with the observed active infections which has already surpassed this
ideal lock down scenario by a significant margin and is still increasing. The total number ofdeaths in an ideal lock down scenario would be anywhere between 1500 and 5500 taking
reasonable uncertainties into account. Nonetheless, the rapidly increasing mismatch
between the observed and simulated active infections indicates that the Indian national
lockdown is not absolutely perfect. An imperfect lockdown is to be expected when one
takes into account human behavioural traits and random events which disproportionately
contribute to “super-spreading” the disease.
				</font></p>

				<p style="text-align:justify;"><font color="black" size="4">
				<strong>3. What is the simulated most-likely-scenario of novel coronavirus progression in India;
what does this India-specific simulation tell us about the national lockdown efficiency and
eventual numbers of affected individuals?</strong>
<br>
				
				<br>
				
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_ldfun.png" target="_blank"><img src="images/model_output/standard_ldfun.png" class="img-responsive"></a>
					</div>
				</div>
				
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_infected.png" target="_blank"><img src="images/model_output/standard_infected.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_recovered.png" target="_blank"><img src="images/model_output/standard_recovered.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
<a href="images/model_output/standard_deceased.png" target="_blank"><img src="images/model_output/standard_deceased.png" class="img-responsive"></a>
					</div>
				</div>
				<br>
	
				Over and beyond the intrinsic growth rates and reproductive numbers, the efficiency of the
national lockdown and human behavior controls the growth rate of this pandemic. Based on
model fits to the observed growth of the pandemic, our simulation indicates that an
increasingly efficient lockdown (which is implemented via a declining step function across
different phases of the Indian lockdown) is able to reasonably match the available
observations. This most-likely-scenario is our standard simulation for India which predicts
about 60,000 active infections (with a possible upper limit of less than 1,35,000) peaking in
early second week of May. The number of likely deaths is predicted to be close to 15,000
with an upper limit (incorporating reasonable uncertainties in the model) of about 35,000.
Note that as on 1 May 2020, our most-likely-scenario simulation predicts numbers slightly
higher than the observed. However, given the assumptions and many uncertainties in model
parameters, and the very high possibility that the observations are under-sampled, it is
more appropriate to take both modeled and observed numbers as indicative than exact
representations of reality.
			</font></p>

				<p style="text-align:justify;"><font color="black" size="4">
				<strong>4. What would happen if people do not respect the Indian lockdown?</strong>
<br>
<br>
<center>
<div class="col-md-0 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_infected.png" target="_blank"><img src="images/model_output/standard_infected.png" width="40%"class="img-responsive"></a>
					</div>
				</div>
				</center>
<br>
				Our most-likely-scenario simulation of the novel coronavirus pandemic in India taking into
account a relatively more inefficient lockdown indicates that the human behavioral impulse
to increasingly violate the lockdown as time goes by would only increase the number of
infected and the number of deaths. Thus lockdown measures must be respected to the
extent possible and essential duties which necessitates human interactions must be
performed with proper physical distancing measures in place.
			</font>
			<br>
			(Show two plots. First plot is infected versus time with our standard lock down and another
curve with a slightly more loose lockdown (1-0.7-0.1.). Second plot is deaths versus time
following the same format as above.)
			</p>

				<p style="text-align:justify;"><font color="black" size="4">		
				<strong>5. When do I expect to see a decline in the peak of active infections in India?</strong>				
<br>
				<br>
<center>
<div class="col-md-0 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_infected.png" target="_blank"><img src="images/model_output/standard_infected.png" width="40%"class="img-responsive"></a>
					</div>
				</div>
				</center>
<br>
				
				
				Our most-likely-scenario simulation based on our epidemiological model indicates that we
can expect to see a decline in the active infections in India sometime around the second
week of May, i.e., before the end of the third phase of national lockdown on 17 May. If the
active infections start decreasing earlier this would imply a more efficient lockdown than
modeled and fewer number of total infections and deaths. If the active infections continue
to increase beyond the second week of May this would imply a more inefficient lockdown
than modeled and a larger number of infected and deceased individuals than predicted by
the model.

			</font></p>

				<p style="text-align:justify;"><font color="black" size="4">
				<strong>6. What would have happened if the Indian national lockdown was completely lifted on 3​ <sup>rd</sup>
May 2020?</strong>
<br>

<br>
				
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_lifted_ldfun.png" target="_blank"><img src="images/model_output/standard_lifted_ldfun.png" class="img-responsive"></a>
					</div>
				</div>
				
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_lifted_infected.png" target="_blank"><img src="images/model_output/standard_lifted_infected.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_lifted_recovered.png" target="_blank"><img src="images/model_output/standard_lifted_recovered.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
<a href="images/model_output/standard_lifted_deceased.png" target="_blank"><img src="images/model_output/standard_lifted_deceased.png" class="img-responsive"></a>
					</div>
				</div>
				<br>
				If the current national lockdown, which seems to be limiting the growth of the pandemic, is
completely lifted on 3 May then the epidemiological model simulation indicates that there
would have been a tremendous surge in the number of new infections resulting in very high
numbers of total infected and deceased individuals peaking after August 2020. This could
have completely reversed the gains of the lockdown in India. This resurgence would have
been driven by the sudden rise in social interactions that would be seeded or powered by a
large number of active infections that would remain in the susceptible population as on 3
May 2020, as indicated in the simulation above. Therefore, purely from the epidemiological
perspective, it is desirable to continue with the national lockdown in India to keep the
effective growth rate of the pandemic within a low range.
			</font></p>

				<p style="text-align:justify;"><font color="black" size="4">
				<strong>7. What is the point of a lock down if the disease was not completely eradicated within
the first phase of national lockdown in India?</strong>
<br>
				From the epidemiological perspective, a lockdown that lasts for a small amount of time does
not decrease the effective growth rate of the novel coronavirus pandemic enough to bring
down the number of active infections quickly. This in turn fails to reduce the effective
reproduction number below the necessary threshold to stop the spread of the pandemic.
Only model simulations indicate that only a sufficiently long lockdown spanning over 2-3
months may achieve this. A long lockdown also flattens the curve of infected individuals,
implying that at any given time, the number of infected or hospitalized individuals remain
manageable with our limited healthcare resources.

<br>
(Provide 3 curves in the same plot with different lengths of tight lockdown which show how
the curve flattens with extended lockdown periods).
			</font></p>

				<p style="text-align:justify;"><font color="black" size="4">
				<strong>8. Would it have been better if India imposed a complete national lockdown even earlier
in February 2020?</strong>
<br>
				(Do some runs with lower E(0) and I(0) with a similar lock down that was imposed early on
15 February. Check if overall numbers would have been lower or would they have
eventually reached same levels with a similar lockdown function as our standard run?).</p>
				
				<p style="text-align:justify;"><font color="black" size="4">
				<strong>9. What could have motivated the extension of the Indian national lockdown to 17 May
2020?</strong>
<br>
				(RKN provides his plot and brief summary of what function was used to fit the currently
available data. Note assumption that the progression of the pandemic can be explained by a
function whose parameters are estimated based on the available observations. Also
alongside this provide the best-case scenario model plot. By comparing both we shall
provide an answer to this question.)</p>
				
				<p style="text-align:justify;"><font color="black" size="4">
				<strong>10. Based on models is it possible to precisely predict the total number of infections,
number of recovered and number of deceased individuals from the coronavirus pandemic
in India?</strong>
<br>
				<div id="chart_qend" class="img-responsive">
						</div> 
				
				Epidemiological model simulations and predicted numbers of infected, recovered and
deceased individuals depend critically on model parameters which are poorly constrained in
the early phase of a pandemic, especially when observations are under-sampled. These
model equations are also based on various assumptions which are an approximation of
reality. A combination of these factors introduce uncertainties in model-based predictions.
This can be reasonably accounted for by providing a range of predictions based on a set of
plausible parameter space explorations. As can be seen in our model simulation, reasonable
variations in model parameters can give rise to significant variations in predictions at later
times. Therefore, it is advisable to take these model results as indicative of reality, rather
than an exact quantitative representation of reality. Nevertheless, such models are our only
available tool to provide a reasonable scientific assessment of the future progression of the
novel coronavirus pandemic.

<br>
(Answer: Present the plot with our most-likely-scenario simulation with the uncertainties in
beta. Present another plot with a slightly lower and slight higher E0 but with the same beta
as our standard prediction).

</p>

<p style="text-align:justify;"><font color="black" size="4">		
				<strong>11. What is the best strategy for continuing a national lockdown or isolated regional
lockdowns in various parts of India?</strong>				
<br>
				<br>
				
			<!--	<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_lifted_ldfun.png" target="_blank"><img src="images/model_output/standard_lifted_ldfun.png" class="img-responsive"></a>
					</div>
				</div>
				
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_lifted_infected.png" target="_blank"><img src="images/model_output/standard_lifted_infected.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
			<a href="images/model_output/standard_lifted_recovered.png" target="_blank"><img src="images/model_output/standard_lifted_recovered.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-3 image-content">
					<div class="image-item  animate-box">
<a href="images/model_output/standard_lifted_deceased.png" target="_blank"><img src="images/model_output/standard_lifted_deceased.png" class="img-responsive"></a>
					</div>
				</div> -->
				
				We are currently performing research with our epidemiological model - optimized for India -
to figure out a desirable lockdown strategy that can inform public policy. While we are
exploring various strategies through predictive modeling, our early experience is that there
is no one magic solution. This also indicates the difficulties that confront public policy
makers at central and state levels who must rely on such scientific inputs. As and when we
are able to identify some plausible strategic interventions we shall make them available to
the nation.
			</font></p>



			</div>
		</div>
	</div>


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
