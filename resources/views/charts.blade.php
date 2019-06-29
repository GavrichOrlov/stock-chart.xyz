<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="無料の見やすい株チャートリアルタイム分析サイト。これから何倍にも上がる可能性がある銘柄が見つかります。今仕込んでおけば、短期間で10、20倍も！" />        
        <meta name="keywords" content="株ガイド,株チャート,チャート,無料,分析,リアルタイム,サイト,上がる,銘柄" />
        <meta name="google-site-verification" content="2FzN1gTUMgOjOke9un6nla5jmmxvT2wpWOYzSLzE5OQ" />
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-1180922696254780",
          enable_page_level_ads: true
     });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134624289-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-134624289-1');
</script>
<title>【株ガイド】| 株チャート無料リアルタイム分析サイト</title>
<link rel="icon" href="{!! asset('http://stock-chart.xyz/public/logo.png') !!}"/>
        <!-- Fonts -->
@extends('welcome')
<link href="http://stock-chart.xyz/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="https://d3js.org/d3.v5.min.js"></script>
<script src="http://stock-chart.xyz/public/js/jquery.min.js"></script>
<script src="http://stock-chart.xyz/public/js/bootstrap.min.js"></script>
</head>
@section('content')
<body>
<div  class="container-fluid" style="margin-top:20px;">
    <div class="col-md-12 col-sm-12">
    	<div class="col-md-12 col-sm-12" style="float: left;">
    	    <a href="http://stock-chart.xyz" target="_top">
    		<img src="http://stock-chart.xyz/public/logo.png" style="border-radius: 20px;">
    		</a>
    	</div>
    </div>
</div>
<div class="col-md-12 col-sm-12" style="text-align: center;">
	<h2>無料の見やすい株チャートリアルタイム分析サイト。</h2>
これから何倍にも上がる可能性がある銘柄が見つかります。今仕込んでおけば、短期間で10、20倍も！
<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- stock-chart 728×90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-1180922696254780"
     data-ad-slot="6739739729"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="grid" class="row">
				<?php foreach ($chartids as $id) {
				?>
				<div class="mix col-sm-6 page1 page4 margin0" style="margin-bottom: 20px; margin-top: 20px;text-align:center;">
					<label style="font-size: 20px"><?php echo substr($id, 0, 4) ?></label>
					
					<div class="item-img-wrap "> 
						<img src="https://chart.yahoo.co.jp/?code={{$id}}.T&tm=2y&type=c&log=off&size=m&over=m65,m130,s,m'<?php echo($cur_move) ?>'&add=v&comp=" class="img-responsive" alt="workimg">
						<div class="item-img-overlay"> 
							<a href="#" class="show-image"> 
								<span></span> 
							</a>
						</div>
					</div>
				</div>
				<?php 
				} 
				?>
			</div>
		</div>
		<div style="text-align: center;margin: 20px;">
		<div>
		<br>

 <br></div>
		     <label style = "font-size:14px;">※このサイトは、Yahooファイナンスの画像データを使用しています。画像の著作権は、Yahoo!Japanにあります。<br>
		    画像引用：<a href="https://stocks.finance.yahoo.co.jp/" target="_blank">Yahooファイナンス</a></label>
		<div class="row gallery-bottom">
			<div class="col-md-12 col-sm-6">
				<ul class="pagination">
					<?php if ($cur_page == 1) {
					?>
						<li><a class="btn-disabled" disabled="disabled" href="/pagination/<?php echo($cur_page) ?>/<?php echo($cur_move) ?>/<?php echo($total_count) ?>" aria-label="Previous" onclick="return false;"> 
							<span aria-hidden="true">«</span> </a>
						</li>
					<?php
					} else {
					?>
						<li><a href="/pagination/<?php echo($cur_page-1) ?>/<?php echo($cur_move) ?>/<?php echo($total_count) ?>" aria-label="Previous"> 
							<span aria-hidden="true">«</span> </a>
						</li>
					<?php
					} 
					?>
					<?php 
						for($i = 1; $i <= $pagination; $i++){
							if($i == $cur_page)
								echo ('<li class="Active"><a href="/pagination/'.$i.'/'.$cur_move.'/'.$total_count.'">'.$i.'</a></li>');
							else
								echo ('<li><a href="/pagination/'.$i.'/'.$cur_move.'/'.$total_count.'">'.$i.'</a></li>');

						}
						if($cur_page > $pagination)
							echo ('<li class="Active"><a href="/pagination/'.$cur_page.'/'.$cur_move.'/'.$total_count.'">'.$cur_page.'</a></li>');
					?>
					<?php if ($cur_page == $pagination) {
					?>
						<li><a class="btn-disabled" disabled="disabled" href="/pagination/<?php echo($cur_page) ?>/<?php echo($cur_move) ?>/<?php echo($total_count) ?>" aria-label="Next" onclick="return false;"> 
							<span aria-hidden="true">»</span> </a>
						</li>
					<?php
					} else {
					?>
						<li><a href="/pagination/<?php echo($cur_page+ 1) ?>/<?php echo($cur_move) ?>/<?php echo($total_count) ?>" aria-label="Next"> 
							<span aria-hidden="true">»</span> </a>
						</li>
					<?php
					} 
					?>
				</ul>
			</div>
			<div class="col-sm-6 text-right"> 
				<!-- <em>Displaying 1 to <?php $pagination ?> (of 30 posts)</em> -->
			</div>
		</div>
	</div>
	<div style="text-align: center;margin: 20px;">Copyright 2019 株ガイド All Rights Reserved.</div>
		   
</div></body>
</html>
<script>
<?php 
	exit;
 ?>
// 2. Use the margin convention practice 
var margin = {top: 50, right: 50, bottom: 50, left: 50}
  , width = (window.innerWidth - margin.left - margin.right)/3 // Use the window's width 
  , height = 200; // Use the window's height

// The number of datapoints
var n = 21;

// 5. X scale will use the index of our data
var xScale = d3.scaleLinear()
    .domain([0, n-1]) // input
    .range([0, width]); // output

// 6. Y scale will use the randomly generate number 
var yScale = d3.scaleLinear()
    .domain([0, 1]) // input 
    .range([height, 0]); // output 

// 7. d3's line generator
var line = d3.line()
    .x(function(d, i) { return xScale(i); }) // set the x values for the line generator
    .y(function(d) { return yScale(d.y); }) // set the y values for the line generator 
    .curve(d3.curveMonotoneX) // apply smoothing to the line
// 8. An array of objects of length N. Each object has key -> value pair, the key being "y" and the value is a random number
// 1. Add the SVG to the page and employ #2
var svg = [];
for (var i = 0; i <= 40; i++) {
	var dataset = d3.range(n).map(function(d) { return {"y": d3.randomUniform(1)() } })
	svg[i] = d3.select(".content").append("svg")
	    .attr("width", width + margin.left + margin.right)
	    .attr("height", height + margin.top + margin.bottom)
	  .append("g")
	    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
	// 3. Call the x axis in a group tag
	svg[i].append("g")
	    .attr("class", "x axis")
	    .attr("transform", "translate(0," + height + ")")
	    .call(d3.axisBottom(xScale)); // Create an axis component with d3.axisBottom

	// 4. Call the y axis in a group tag
	svg[i].append("g")
	    .attr("class", "y axis")
	    .call(d3.axisLeft(yScale)); // Create an axis component with d3.axisLeft

	// 9. Append the path, bind the data, and call the line generator 
	svg[i].append("path")
	    .datum(dataset) // 10. Binds data to the line 
	    .attr("class", "line") // Assign a class for styling 
	    .attr("d", line); // 11. Calls the line generator 

	// 12. Appends a circle for each datapoint 
	svg[i].selectAll(".dot")
	    .data(dataset)
	  .enter().append("circle") // Uses the enter().append() method
	    .attr("class", "dot") // Assign a class for styling
	    .attr("cx", function(d, i) { return xScale(i) })
	    .attr("cy", function(d) { return yScale(d.y) })
	    .attr("r", 2)
	      .on("mouseover", function(a, b, c) {
	        this.attr('class', 'focus')
			})
	      .on("mouseout", function() {  })
}
//       .on("mousemove", mousemove);

//   var focus = svg.append("g")
//       .attr("class", "focus")
//       .style("display", "none");

//   focus.append("circle")
//       .attr("r", 4.5);

//   focus.append("text")
//       .attr("x", 9)
//       .attr("dy", ".35em");

//   svg.append("rect")
//       .attr("class", "overlay")
//       .attr("width", width)
//       .attr("height", height)
//       .on("mouseover", function() { focus.style("display", null); })
//       .on("mouseout", function() { focus.style("display", "none"); })
//       .on("mousemove", mousemove);
  
//   function mousemove() {
//     var x0 = x.invert(d3.mouse(this)[0]),
//         i = bisectDate(data, x0, 1),
//         d0 = data[i - 1],
//         d1 = data[i],
//         d = x0 - d0.date > d1.date - x0 ? d1 : d0;
//     focus.attr("transform", "translate(" + x(d.date) + "," + y(d.close) + ")");
//     focus.select("text").text(d);
//   }
</script>

@endsection