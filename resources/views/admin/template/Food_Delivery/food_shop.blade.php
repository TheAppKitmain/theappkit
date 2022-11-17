@include('admin.template.partials.head')
@include('admin.template.partials.header')
@include('admin.template.Food_Delivery.partials.sidemenu')
<div class="main-home">
      <div class="main-wrapper maininnerallpagescontainer">
      <div class="main-wrapper ">
        <div class="main-container-inner card">
        	<div class="card-main card">
            	<div class="container-fluid no-padding ">
               		<div class="">
                  		<div class="col-md-12">
                     		<nav>
                        		<ol class="breadcrumb page-title-top">
                           			<li class="breadcrumb-item active">Shop</li>
                        		</ol>
                     		</nav>
                  		</div>
               		</div>
            	</div>
            	<div class="container-fluid">
            		@if(Session::get('alert'))
					<div class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
					  <p>{{Session::get('message')}} </p>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					@endif

               		<div class="">
               			<form role="form" data-toggle="validator" action="{{route('theme.shops')}}" method="post" enctype="multipart/form-data">
               			@csrf
               			
			   			<div class="row">
                           <div class="form-group">
						   @if(Auth::user()->parent_id == 0)  
								<input type="hidden" class="inputtemp form-control inputtemp" id="user_id" name="user_id" value="{{ Auth::user()->id}}">
								@else
								<input type="hidden" class="inputtemp form-control inputtemp" id="user_id" name="user_id" value="{{ Auth::user()->parent_id}}">     
								@endif                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control inputtemp" name="template_id" value="{{$themetemplate->id}}">
                            </div>
							<div class="col-lg-6">
								<div class="form-group f-g-o">
						  			<label class="labeltemp" for="usr">Shop Name</label>
						  			<input type="text" class="form-control inputtemp" placeholder="Enter Shop Name" name="shop_name" required value="{{ old('shop_name',$shop->shop_name ?? '') }}" data-error="This field is required.">
						  			<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group f-g-o">
						  			<label class="labeltemp" for="usr">Shop Location</label>
						  			<input type="text" class="form-control inputtemp" placeholder="Enter Shop Location" name="shop_location" required value="{{ old('shop_location',$shop->shop_location ?? '') }}" data-error="This field is required.">
						  			<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group f-g-o">
						  			<label class="labeltemp" for="usr">Shop Description</label>
						  			<textarea class="form-control inputtemp" placeholder="Add Description" name="shop_descrption" required data-error="This field is required.">{{ old('shop_descrption',$shop->shop_descrption ?? '') }}</textarea>
						  			<div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group f-g-o">
						  			<label class="labeltemp" for="usr">Shop Latitude</label>
						  			<input type="text" class="form-control inputtemp" placeholder="Enter Shop Latitude" name="shop_lat" required value="{{ old('shop_lat',$shop->shop_lat ?? '') }}" data-error="This field is required.">
						  			<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group f-g-o">
						  			<label class="labeltemp" for="usr">Shop Longitude</label>
						  			<input type="text" class="form-control inputtemp" placeholder="Enter Shop Longitude" name="shop_long" required value="{{ old('shop_long',$shop->shop_long ?? '') }}" data-error="This field is required.">
						  			<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group f-g-o">
						  			<label class="labeltemp" for="usr">Currency Code</label>
						  			<input type="text" class="form-control inputtemp" placeholder="Enter Currency" name="currency" required value="{{ old('currency',$shop->currency ?? '') }}" data-error="This field is required.">
						  			<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group f-g-o">
						  			<label class="labeltemp" for="usr">Currency Symbol</label>
						  			<input type="text" class="form-control inputtemp" placeholder="Enter Currency Symbol" name="currency_symbol" required value="{{ old('currency_symbol',$shop->currency_symbol ?? '') }}" data-error="This field is required.">
						  			<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group f-g-o">
						  			<label class="labeltemp" for="usr">Delivery Charges</label>
						  			<input type="text" class="form-control inputtemp" placeholder="Enter Delivery Charges" name="delivery_charges" required value="{{ old('delivery_charges',$shop->delivery_charges ?? '') }}" data-error="This field is required.">
						  			<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group f-g-o">
							  		<label class="labeltemp" for="usr">Shop Image</label>
							  		<input type="file" class="form-control inputtemp" placeholder="Enter Shop Name" name="shop_image" {{$shop->shop_image ?? "required"}} value="{{ old('shop_image',$shop->shop_image ?? '') }}" accept="image/*">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group f-g-o">
							  		<label class="labeltemp" for="usr">Shop Image</label>
								  	<img class="form-control"
								  	style="width:150px;height:150px" src="{{$shop->shop_image ?? ''}}">
								</div>
							</div>

							<div class="col-lg-12">
							  	<h4>Shop Owner Details :-</h4><br>
							  	<input class="inputtemp" type="hidden" name="user_id" value="1">
							</div>

							<div class="col-lg-6">
								<div class="form-group f-g-o">
							  		<label class="labeltemp" for="usr">Owner Name</label>
							  		<input type="text" name="name" class=" form-control inputtemp" placeholder="Enter Owner Name" required value="{{ old('name',$shop->user->name ?? '') }}" data-error="This field is required.">
							  		<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group f-g-o">
							  		<label class="labeltemp" for="usr">Owner Email</label>
							  		<input type="email" name="email" class="inputtemp form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Owner Email" required value="{{ old('email',$shop->user->email ?? '') }}" data-error="This field is required.">
							  		@if ($errors->has('email'))
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $errors->first('email') }}</strong>
		                            </span>
		                            @endif
		                            <div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group f-g-o">
							  		<label class="labeltemp" for="usr">Owner Mobile No</label>
							  		<input type="text" name="mobile" class="inputtemp form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="Enter Owner Mobile No" required value="{{ old('mobile',$shop->user->mobile ?? '') }}" data-error="This field is required.">
							  		@if ($errors->has('mobile'))
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $errors->first('mobile') }}</strong>
		                            </span>
		                            @endif
		                            <div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6 col-xl-4 col-md-6">
								<div class="form-group f-g-o shopac-dcf-g">
						  			<label class="labeltemp" for="usr">Status </label>
						  			<div class="d-flex">
						  				<div class="w3-half">
											<div class="custom-control custom-radio mt-3">
							  					<input type="radio" id="customRadio1" name="status" class="custom-control-input">
							  					<label class="custom-control-label" for="customRadio1">Active</label>
											</div>
						  				</div>
						  				<div class="w3-half">
											<div class="custom-control custom-radio mt-3">
							  					<input type="radio" id="customRadio2" name="status" class="custom-control-input">
							  					<label class="custom-control-label" for="customRadio2">Deactive</label>
											</div>
						  				</div>
						  			</div>
								</div>
							</div>
					
							<div class="col-lg-12 col-xl-12 col-md-12 catgory-btn-save">
								<div class="form-group"><button type="submit" class="btn-style btn-color">Save</button></div>
							</div>

			   			</div>
			   			</form>
			   		</div>
            	</div>
         	</div>
        </div>
    </div>
            
	  </div>
      </div>
@include('admin.template.Food_Delivery.partials.footer')

