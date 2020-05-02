<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<title>CESSI COVID-19 &mdash; Model and Predictions</title>
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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script type="text/javascript" id="MathJax-script" async
  		src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/mml-chtml.js">
	</script>


	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

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
								<li ><a href="index.php">Home</a></li>
								<li class="active"><a href="page1.php">Model and Predictions</a></li>
								<li><a href="page2.php">Data Analytics</a></li>
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
			<div class="row">
					<div class="detail" >
						<div class="animate-box">
							<h2>CESSI-nCoV-SEIRD model</h2>
							<span></span>
							
						
<!-- <math xmlns="http://www.w3.org/1998/Math/MathML">
  <mi>a</mi><mo>&#x2260;</mo><mn>0</mn>
</math>,
there are two solutions to
<math xmlns="http://www.w3.org/1998/Math/MathML">
  <mi>a</mi><msup><mi>x</mi><mn>2</mn></msup>
  <mo>+</mo> <mi>b</mi><mi>x</mi>
  <mo>+</mo> <mi>c</mi> <mo>=</mo> <mn>0</mn>
</math>
and they are -->
<p style="text-align:justify;">
Dynamics of a rapidly spreading contagious disease can be studied using simple compartmental models utilizing coupled ordinary differential equations. Recent widespread of the SARS-CoV-2 has already claimed a significant number of lives and it still remains highly infectious. India being one of the densely populated countries the risk of a severe outbreak is very much probable unless taken prompt action against controlling the infections. We at CESSI used the SEIRD (Susceptible-Exposed-Infected-Recovered-Dead) model to observe the variation of individuals in different compartments for Indian population and the effect of different intervention strategies on the growth rate of the disease. The transition in between the compartments can be realized from the following blockdiagram. 
</p>

<center>
<div class="image-content">
	<div class="image-item">
		<img src="images/block_doiagram1.png" width="50%" alt="Block diagram">					
	</div>
</div>
</center>

<p style="text-align:justify;">where </p>
<ul>
<li>S: Number of suseptible individuals </li>
<li>E: Number of exposed individuals -- asymptomatic in nature but infectious </li>
<li>I: Number of mildly infected individuals </li>
<li>R: Number of individuals who have recovered from the disease and are immune</li>
<li>D: Number of dead individuals </li>
<li>Total population of the system is constant and is given by N = S+ E + I + R+ D.</li>
</ul>

<p style="text-align:justify;">The rate of infection (&#x03B2;) indicates the probability of transmission of the disease from a susceptible to exposed person. The incubation rate (&#x03c3;) shows the rate of an asymptomatic individual to become infectious. The recovery rate (&#x03B3;) is the average rate at which a person recovers and becomes immune form the disease . Lastly the mortality rate (&#x03BC;) controls the probability of an infected individual to die of the infection. For modelling the dynamics of the COVID19 pandemic we assume, </p>

<ul>
<li>Normal birth rate and mortality during this pandemic period doesnot affect the dynamics.</li>
<li>Individuals who are exposed (E) to the pathogen can infect another suceptible individual (S). </li>
<li>An asymptomatic individual can spread infection even during their incubation period. </li>
<li>Once an individual is recovered they become immune to the disease and will never become susceptible again.</li>
<li>Initially the total population of India is considered to be susceptible.</li>
</ul>

<p style="text-align:justify;">With these assumptions the model equation can be written as, </p>


<p ><font color="#333333" size="3">
<center>
<math xmlns="http://www.w3.org/1998/Math/MathML">
  <mtable columnalign="right left" columnspacing="0.28em" displaystyle="true">
    <mtr>
      <mtd>
        <mfrac><mrow><mi>dS</mi></mrow><mrow><mi>dt</mi></mrow></mfrac>
      </mtd>
      <mtd>
        <mo>=</mo><mo>-</mo><mo>&#x03B2;</mo>
        <mfrac>
      <mrow>
        <mi>IS</mi> 
      </mrow>
      <mi>N</mi>
    </mfrac> <msub><mn>F</mn><mi>LD</mi></msub><mn>(t)</mn>
      </mtd>
    </mtr>
    <mtr>
      <mtd>
        <mfrac><mrow><mi>dE</mi></mrow><mrow><mi>dt</mi></mrow></mfrac>
      </mtd>
      <mtd>
        <mo>=</mo><mo>&#x03B2;</mo>
        <mfrac>
      <mrow>
        <mi>IS</mi>
      </mrow>
      <mi>N</mi>
    </mfrac> <msub><mn>F</mn><mi>LD</mi></msub><mn>(t)</mn>
    <mo>-</mo> <mo>&#x03c3;</mo>
    <mi>E</mi>
      </mtd>
    </mtr>
    
    <mtr>
      <mtd>
        <mfrac><mrow>  
      <mi>dI</mi>  
      </mrow><mrow><mi>dt</mi></mrow></mfrac>
      </mtd>
      <mtd>
        <mo>=</mo><mo>&#x03c3;</mo><mi>E</mi>
        
        <mo>-</mo><mo>&#x03B3;</mo><mi>I</mi>
        <mo>-</mo><mo>&#x03BC;</mo><mi>I</mi>
      </mtd>
    </mtr>
    
    
    
    <mtr>
      <mtd>
        <mfrac><mrow> 
      <mi>dR</mi>
      </mrow><mrow><mi>dt</mi></mrow></mfrac>
      </mtd>
      <mtd>
        <mo>=</mo><mo>&#x03B3;</mo><mi>I</mi>
      </mtd>
    </mtr>
    
    <mtr>
      <mtd>
        <mfrac><mrow> 
      <mi>dD</mi>  
      </mrow><mrow><mi>dt</mi></mrow></mfrac>
      </mtd>
      <mtd>
        <mo>=</mo><mo>&#x03BC;</mo><mi>I</mi><mtext>.</mtext>
      </mtd>
    </mtr>
    
    
  </mtable>

</math>
</center>
</p>

<p style="text-align:justify;">
The model parameters are parameterized to the observed data for India. We have used a lockdown function, F<sub>LD</sub>(t), to mimic the effects of practicing lockdown instructions so that the spread of the disease can be controlled. The implementation of the lockdown is not ideal in India. Keeping that in mind we fix the set parameters to be &#x03B2;= 0.34/day, &#x03c3;= 0.1/day, &#x03B3;= 0.06/day and &#x03BC;= 0.005/day. We also explore the cases where the growth rate of the pandemic varies 20%.  
</p>


<p style="text-align:justify;">References</p>
<ol>
<li>Baker RE, Peña J-M, Jayamohan J and Jérusalem A., 2018, Mechanistic models versus machine learning, a fight worth fighting for the biological community? Biol. Lett.1420170660
http://doi.org/10.1098/rsbl.2017.0660 </li>
<li>Chowell G., Fitting dynamic models to epidemic outbreaks with quantified uncertainty: A primer for parameter uncertainty, identifiability, and forecasts (2017), Infectious Disease Modelling Volume 2, Issue 3, August 2017, Pages 379–398 </li>
<li><a href="https://github.com/silpara/simulators/blob/master/compartmental_models/SEIRD%20Simulator%20with%20Parameter%20Estimation%20in%20Python.ipynb">Simulation & Parameter Estimation of SEIRD Model.</a></li>
</ol>



				
		
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

