@extends('landing.layout') 

@section('title')
{{ $company->name }} | FAQ
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="FAQ" current_page="Faq"/>
<!-- ====================== Page Title ================= -->
		
<!-- =========== Start All Hotel In Grid View =================== -->
<section class="gray-bg">
	<div class="container">
		<div class="row">
			<div class="simple-tab-style">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#User" aria-controls="home" role="tab" data-toggle="tab"><i class="ti-user"></i>User</a></li>
					<li role="presentation"><a href="#Author" aria-controls="author" role="tab" data-toggle="tab"><i class="ti-star"></i>Author</a></li>
					<li role="presentation"><a href="#Employee" aria-controls="employee" role="tab" data-toggle="tab"><i class="ti-user"></i>Employee</a></li>
					<li role="presentation"><a href="#Support" aria-controls="support" role="tab" data-toggle="tab"><i class="ti-help"></i>Support</a></li>
					<li role="presentation"><a href="#Suggestion" aria-controls="Suggestion" role="tab" data-toggle="tab"><i class="ti-face-sad"></i>Suggestion</a></li>
				</ul>
		
				<!-- Tab panes -->
				<div class="tab-content">
				
					<!-- user -->
					<div role="tabpanel" class="tab-pane fade in active" id="User">
						<div class="simple-accordion">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="title1">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#col1" aria-expanded="true" aria-controls="col1">
												Why Travelizm Services?
											</a>
										</h4>
									</div>
									<div id="col1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="title1">
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										</div>
									</div>
								</div>
								
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="title2">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#col2" aria-expanded="false" aria-controls="col2">
												Benifits of Travelizm Services
											</a>
										</h4>
									</div>
									<div id="col2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title2">
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										</div>
									</div>
								</div>
								
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="title3">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#col3" aria-expanded="false" aria-controls="col3">
												What is Travelizm?
											</a>
										</h4>
									</div>
									<div id="col3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title3">
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										</div>
									</div>
								</div>
								
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="title4">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#col4" aria-expanded="false" aria-controls="col4">
												What People Syaing About travelizm
											</a>
										</h4>
									</div>
									<div id="col4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title4">
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
					<!-- Author -->
					<div role="tabpanel" class="tab-pane fade" id="Author">
						<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
						
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title21">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion1" href="#col21" aria-expanded="true" aria-controls="col21">
											Why Travelizm Services?
										</a>
									</h4>
								</div>
								<div id="col21" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="title21">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title22">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#col22" aria-expanded="false" aria-controls="col22">
											Benifits of Travelizm Services
										</a>
									</h4>
								</div>
								<div id="col22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title22">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title23">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#col23" aria-expanded="false" aria-controls="col23">
											What is Travelizm?
										</a>
									</h4>
								</div>
								<div id="col23" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title23">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title24">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#col24" aria-expanded="false" aria-controls="col24">
											What People Syaing About travelizm
										</a>
									</h4>
								</div>
								<div id="col24" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title24">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Author -->
					
					<!-- Employee -->
					<div role="tabpanel" class="tab-pane fade" id="Employee">
						<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
						
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title31">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion2" href="#col31" aria-expanded="true" aria-controls="col31">
											Why Travelizm Services?
										</a>
									</h4>
								</div>
								<div id="col31" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="title31">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title32">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#col32" aria-expanded="false" aria-controls="col32">
											Benifits of Travelizm Services
										</a>
									</h4>
								</div>
								<div id="col32" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title32">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title33">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#col33" aria-expanded="false" aria-controls="col33">
											What is Travelizm?
										</a>
									</h4>
								</div>
								<div id="col33" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title33">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title34">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#col34" aria-expanded="false" aria-controls="col34">
											What People Syaing About travelizm
										</a>
									</h4>
								</div>
								<div id="col34" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title34">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Employee -->
					
					<!-- Support-->
					<div role="tabpanel" class="tab-pane fade" id="Support">
						<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
						
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title41">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion3" href="#col41" aria-expanded="true" aria-controls="col41">
											Why Travelizm Services?
										</a>
									</h4>
								</div>
								<div id="col41" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="title41">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title42">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#col42" aria-expanded="false" aria-controls="col42">
											Benifits of Travelizm Services
										</a>
									</h4>
								</div>
								<div id="col42" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title42">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title43">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#col43" aria-expanded="false" aria-controls="col43">
											What is Travelizm?
										</a>
									</h4>
								</div>
								<div id="col43" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title43">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title44">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#col44" aria-expanded="false" aria-controls="col44">
											What People Syaing About travelizm
										</a>
									</h4>
								</div>
								<div id="col44" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title44">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Support -->
					
					<!-- Suggestion -->
					<div role="tabpanel" class="tab-pane fade" id="Suggestion">
						<div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
					
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title51">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion4" href="#col51" aria-expanded="true" aria-controls="col51">
											Why Travelizm Services?
										</a>
									</h4>
								</div>
								<div id="col51" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="title1">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title52">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#col52" aria-expanded="false" aria-controls="col52">
											Benifits of Travelizm Services
										</a>
									</h4>
								</div>
								<div id="col52" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title52">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title53">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#col53" aria-expanded="false" aria-controls="col53">
											What is Travelizm?
										</a>
									</h4>
								</div>
								<div id="col53" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title53">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="title54">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#col54" aria-expanded="false" aria-controls="col54">
											What People Syaing About travelizm
										</a>
									</h4>
								</div>
								<div id="col54" class="panel-collapse collapse" role="tabpanel" aria-labelledby="title54">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Suggestion -->
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =========== End All Hotel In Grid View =================== -->
	
<!-- ============== Before Footer ====================== -->
<section class="before-footer bt-1 bb-1">
	<div class="container-fluid padd-0 full-width">
	
		<div class=" col-md-2 col-sm-2 br-1 mbb-1">
			<div class="data-flex">
				<h4>Contact Us!</h4>
			</div>
		</div>
		
		<div class="col-md-3 col-sm-3 br-1 mbb-1">
			<div class="data-flex text-center">
			53 Boulevard Victor Hugo 44200 Nantes, France
			</div>
		</div>
		
		<div class="col-md-3 col-sm-3 br-1 mbb-1">
			<div class="data-flex text-center">
				<span class="d-block mrg-bot-0">06 52 52 20 30</span>
				<a href="#" class="theme-cl"><strong>hello@gmail.com</strong></a>
			</div>
		</div>
		
		<div class="col-md-4 col-sm-4 padd-0">
			<div class="data-flex padd-0">
				<ul class="social-share">
					<li><a href="#"><i class="fa fa-facebook theme-cl"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus theme-cl"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter theme-cl"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin theme-cl"></i></a></li>
				</ul>
			</div>
		</div>
		
	</div>
</section>
<!-- =================== Before Footer ====================== -->
@endsection