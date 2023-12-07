<div id="navbar" class="row">
				<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
				  <div class="container-fluid">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
							@foreach($allCategories as $category)
						<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{url("front/$category->id/category")}}">{{$category->name}}</a>
						</li>
						@endforeach
						<li class="nav-item" style="padding-left: 700px">
							<a class="nav-link" aria-current="page" href="{{url("logout")}}">Logout</a>
							</li>
					  </ul>
					</div>
				  </div>
				</nav>
			</div>
			